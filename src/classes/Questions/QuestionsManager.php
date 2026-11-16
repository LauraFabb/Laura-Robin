<?php
namespace Questions;

use Database;
use PDO;

class QuestionsManager implements QuestionsManagerInterface {
    private PDO $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    public function getAll(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM questions ORDER BY ordre');
        $stmt->execute();
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
