<?php
namespace Categories;

use Database;
use PDO;

// Gère les requêtes SQL liées aux catégories
class CategoriesManager implements CategoriesManagerInterface {
    private PDO $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    // Retourne toutes les catégories (tableau d'objets Categorie)
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

    // Retourne les catégories avec leur score, de la plus compatible à la moins compatible.
    // $profil = la moyenne des réponses pour chaque critère (id_critere => moyenne)
    public function getAllClassees(array $profil): array {
        $categories = $this->getAll();

        // Calculer le score de chaque catégorie
        foreach ($categories as $categorie) {
            $score = $this->calculerScore($categorie->getId(), $profil);
            $categorie->setScore($score);
        }

        // Trier : le plus grand score en premier
        usort($categories, function ($a, $b) {
            return $b->getScore() - $a->getScore();
        });

        return $categories;
    }

    // Calcule le score (en %) d'une catégorie par rapport au profil.
    // Pour chaque critère, on regarde l'écart entre la réponse moyenne
    // et la valeur de la catégorie : plus l'écart est petit, plus le score est haut.
    private function calculerScore(int $idCategorie, array $profil): int {
        $stmt = $this->pdo->prepare('SELECT id_critere, valeur FROM valeurs_criteres WHERE id_categorie = :id');
        $stmt->execute([':id' => $idCategorie]);
        $valeurs = $stmt->fetchAll();

        $ecartTotal = 0;
        $ecartMax = 0;

        foreach ($valeurs as $valeur) {
            $moyenne = $profil[$valeur['id_critere']] ?? 3; // 3 = neutre si pas de réponse
            $ecartTotal = $ecartTotal + abs($moyenne - $valeur['valeur']);
            $ecartMax = $ecartMax + 4; // l'écart maximum sur une échelle de 1 à 5 est 4
        }

        if ($ecartMax == 0) {
            return 0;
        }

        return round((1 - $ecartTotal / $ecartMax) * 100);
    }
}
