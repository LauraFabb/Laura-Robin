<?php
namespace Questions;

use Database;
use PDO;

// Gère les requêtes SQL liées aux questions du quiz
class QuestionsManager implements QuestionsManagerInterface {
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    // Retourne toutes les questions dans l'ordre (tableau d'objets Question)
    public function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM questions ORDER BY ordre');
        $rows = $stmt->fetchAll();

        $questions = [];
        foreach ($rows as $row) {
            $questions[] = new Question(
                $row['id'],
                $row['id_critere'],
                $row['texte'],
                $row['ordre']
            );
        }
        return $questions;
    }
}
