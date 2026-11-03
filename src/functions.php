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
