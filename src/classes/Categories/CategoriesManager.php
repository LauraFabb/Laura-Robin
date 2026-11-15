<?php
namespace Categories;

use Database;
use PDO;

class CategoriesManager implements CategoriesManagerInterface {
    private PDO $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    public function getAll(): array {
        $stmt = $this->pdo->query('SELECT * FROM categories ORDER BY nom');
        $rows = $stmt->fetchAll();

        $categories = [];
        foreach ($rows as $row) {
            $categories[] = new Categorie(
                $row['id'],
                $row['nom'],
                $row['description'],
                $row['salaire_min'],
                $row['salaire_max'],
                $row['risque_ia']
            );
        }
        return $categories;
    }

    public function getAllClassees(array $profil): array {
        $categories = $this->getAll();

        // Calcul du score de chaque catégorie
        $scores = [];
        foreach ($categories as $index => $categorie) {
            $score = $this->calculerScore($categorie->getId(), $profil);
            $categorie->setScore($score);
            $scores[$index] = $score;
        }

        // Tri des scores du plus grand au plus petit (les index sont gardés)
        arsort($scores);

        // On remet les catégories dans l'ordre des scores
        $categoriesClassees = [];
        foreach ($scores as $index => $score) {
            $categoriesClassees[] = $categories[$index];
        }

        return $categoriesClassees;
    }

    // Aide avec l'IA (n°3)
    private function calculerScore(int $idCategorie, array $profil): int {
        $stmt = $this->pdo->prepare('SELECT id_critere, valeur FROM valeurs_criteres WHERE id_categorie = :id');
        $stmt->execute([':id' => $idCategorie]);
        $valeurs = $stmt->fetchAll();

        $ecartTotal = 0;
        $ecartMax = 0;

        foreach ($valeurs as $valeur) {
            $moyenne = $profil[$valeur['id_critere']] ?? 3;
            $ecartTotal = $ecartTotal + abs($moyenne - $valeur['valeur']);
            $ecartMax = $ecartMax + 4;
        }

        if ($ecartMax == 0) {
            return 0;
        }

        return round((1 - $ecartTotal / $ecartMax) * 100);
    }
}
