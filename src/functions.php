<?php

const ECHELLE_REPONSES = [
    1 => "Pas du tout d'accord",
    2 => "Plutôt pas d'accord",
    3 => 'Neutre',
    4 => "Plutôt d'accord",
    5 => "Tout à fait d'accord",
];


function getAllQuestions(PDO $pdo): array {
    $stmt = $pdo->query(
        'SELECT id, id_critere, texte, ordre
        FROM questions
        ORDER BY ordre'
    );
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getReponsesByUtilisateur(PDO $pdo, int $idUtilisateur): array {
    $stmt = $pdo->prepare(
        'SELECT id_question, valeur
        FROM reponses
        WHERE id_utilisateur = :id'
    );
    $stmt->execute([':id' => $idUtilisateur]);
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}


function validateReponses(array $questions, array $reponses): array {
    $errors = [];

    foreach ($questions as $question) {
        $id = (int) $question['id'];
        $valeur = (int) ($reponses[$id] ?? 0);

        if (!array_key_exists($valeur, ECHELLE_REPONSES)) {
            $errors[] = 'Veuillez répondre à la question ' . (int) $question['ordre'] . '.';
        }
    }

    return $errors;
}

function saveReponses(PDO $pdo, int $idUtilisateur, array $reponses): void {
    $stmt = $pdo->prepare(
        'INSERT INTO reponses (id_utilisateur, id_question, valeur)
        VALUES (:id_utilisateur, :id_question, :valeur)
        ON DUPLICATE KEY UPDATE valeur = VALUES(valeur)'
    );

    $pdo->beginTransaction();
    foreach ($reponses as $idQuestion => $valeur) {
        $stmt->execute([
            ':id_utilisateur' => $idUtilisateur,
            ':id_question'    => (int) $idQuestion,
            ':valeur'         => (int) $valeur,
        ]);
    }
    $pdo->commit();
}

// CATALOGUE


function getAllCategories(PDO $pdo): array {
    $stmt = $pdo->query(
        'SELECT id, nom, description, salaire_min, salaire_max, risque_ia
        FROM categories
        ORDER BY nom'
    );
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getCategorieById(PDO $pdo, int $id): ?array {
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null;
}

function getProfilUtilisateur(PDO $pdo, int $idUtilisateur): array {
    $stmt = $pdo->prepare(
        'SELECT questions.id_critere, AVG(reponses.valeur) AS moyenne
        FROM reponses
        JOIN questions ON questions.id = reponses.id_question
        WHERE reponses.id_utilisateur = :id
        GROUP BY questions.id_critere'
    );
    $stmt->execute([':id' => $idUtilisateur]);
    return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
}

function getValeursCriteres(PDO $pdo): array {
    $stmt = $pdo->query('SELECT id_categorie, id_critere, valeur FROM valeurs_criteres');

    $valeurs = [];
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $valeurs[$row['id_categorie']][$row['id_critere']] = (int) $row['valeur'];
    }
    return $valeurs;
}

function calculerCorrespondance(array $profil, array $valeursCategorie): int {
    $ecartTotal = 0;
    $ecartMax   = 0;

    foreach ($valeursCategorie as $idCritere => $valeur) {
        $moyenne     = (float) ($profil[$idCritere] ?? 3);
        $ecartTotal += abs($moyenne - $valeur);
        $ecartMax   += 4; // écart maximum possible sur une échelle de 1 à 5
    }

    if ($ecartMax === 0) {
        return 0;
    }

    return (int) round((1 - $ecartTotal / $ecartMax) * 100);
}

function getCategoriesClassees(PDO $pdo, int $idUtilisateur): array {
    $profil     = getProfilUtilisateur($pdo, $idUtilisateur);
    $valeurs    = getValeursCriteres($pdo);
    $categories = getAllCategories($pdo);

    foreach ($categories as $index => $categorie) {
        $valeursCategorie = $valeurs[$categorie['id']] ?? [];
        $categories[$index]['score'] = calculerCorrespondance($profil, $valeursCategorie);
    }

    usort($categories, function (array $a, array $b): int {
        return $b['score'] <=> $a['score'];
    });

    return $categories;
}

const LABELS_RISQUE_IA = [
    'faible' => 'Faible',
    'moyen'  => 'Moyen',
    'eleve'  => 'Élevé',
];


function getNiveauRisqueIa(int $risque): string {
    if ($risque <= 2) {
        return 'faible';
    }
    if ($risque === 3) {
        return 'moyen';
    }
    return 'eleve';
}

function formatSalaire(int $montant): string {
    return round($montant / 1000) . 'k';
}

