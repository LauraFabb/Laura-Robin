<?php
namespace Reponses;

use Database;
use PDO;

// Gère les réponses des utilisateurs au quiz (table "reponses")
class ReponsesManager implements ReponsesManagerInterface {
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    // Retourne l'échelle de réponse du quiz : valeur => texte affiché
    public function getEchelle(): array {
        return [
            1 => "Pas du tout d'accord",
            2 => "Plutôt pas d'accord",
            3 => 'Neutre',
            4 => "Plutôt d'accord",
            5 => "Tout à fait d'accord",
        ];
    }

    // Retourne les réponses d'un utilisateur : [id_question => valeur]
    public function getByUtilisateur(int $idUtilisateur): array {
        $stmt = $this->pdo->prepare('SELECT id_question, valeur FROM reponses WHERE id_utilisateur = :id');
        $stmt->execute([':id' => $idUtilisateur]);
        $rows = $stmt->fetchAll();

        $reponses = [];
        foreach ($rows as $row) {
            $reponses[$row['id_question']] = $row['valeur'];
        }
        return $reponses;
    }

    // Retourne le profil d'un utilisateur : la moyenne de ses réponses pour chaque critère
    // [id_critere => moyenne entre 1 et 5]
    public function getProfil(int $idUtilisateur): array {
        $stmt = $this->pdo->prepare(
            'SELECT questions.id_critere, AVG(reponses.valeur) AS moyenne
            FROM reponses
            JOIN questions ON questions.id = reponses.id_question
            WHERE reponses.id_utilisateur = :id
            GROUP BY questions.id_critere'
        );
        $stmt->execute([':id' => $idUtilisateur]);
        $rows = $stmt->fetchAll();

        $profil = [];
        foreach ($rows as $row) {
            $profil[$row['id_critere']] = $row['moyenne'];
        }
        return $profil;
    }

    // Vérifie que chaque question a une réponse entre 1 et 5.
    // Retourne la liste des erreurs (vide si tout est bon)
    public function valider(array $questions, array $reponses): array {
        $errors = [];

        foreach ($questions as $question) {
            $valeur = $reponses[$question->getId()] ?? 0;

            if ($valeur < 1 || $valeur > 5) {
                $errors[] = 'Veuillez répondre à la question ' . $question->getOrdre() . '.';
            }
        }

        return $errors;
    }

    // Enregistre les réponses d'un utilisateur.
    // On supprime d'abord ses anciennes réponses, puis on ajoute les nouvelles.
    public function enregistrer(int $idUtilisateur, array $reponses): void {
        $stmt = $this->pdo->prepare('DELETE FROM reponses WHERE id_utilisateur = :id');
        $stmt->execute([':id' => $idUtilisateur]);

        $stmt = $this->pdo->prepare(
            'INSERT INTO reponses (id_utilisateur, id_question, valeur)
            VALUES (:id_utilisateur, :id_question, :valeur)'
        );

        foreach ($reponses as $idQuestion => $valeur) {
            $stmt->execute([
                ':id_utilisateur' => $idUtilisateur,
                ':id_question' => $idQuestion,
                ':valeur' => $valeur,
            ]);
        }
    }
}
