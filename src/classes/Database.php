<?php
require_once __DIR__ . '/../config.php';

class Database {
    private PDO $pdo;

    public function __construct() {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8mb4';

        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
    }

    public function getPdo(): PDO {
        return $this->pdo;
    }
}
