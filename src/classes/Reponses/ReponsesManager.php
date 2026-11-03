<?php
namespace Reponses;

use Database;
use PDO;

class ReponsesManager implements ReponsesManagerInterface {
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    public function getEchelle(): array {
        return [
            1 => "Pas du tout d'accord",
            2 => "Plutôt pas d'accord",
            3 => 'Neutre',
            4 => "Plutôt d'accord",
            5 => "Tout à fait d'accord",
        ];
    }

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

    // Aide avec l'IA (n°3)
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

    // Aide avec l'IA (n°6)
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
