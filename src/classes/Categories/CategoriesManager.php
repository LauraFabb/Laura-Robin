<?php
namespace Categories;

use Database;
use PDO;

class CategoriesManager implements CategoriesManagerInterface {
    private PDO $pdo;

    public function __construct(Database $database) {
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

        foreach ($categories as $categorie) {
            $score = $this->calculerScore($categorie->getId(), $profil);
            $categorie->setScore($score);
        }

        // Aide avec l'IA (n°5)
        usort($categories, function ($a, $b) {
            return $b->getScore() - $a->getScore();
        });

        return $categories;
    }

    // Aide avec l'IA (n°4)
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
