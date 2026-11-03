<?php
namespace Categories;

// Contrat : les méthodes que doit avoir un gestionnaire de catégories
interface CategoriesManagerInterface {
    public function getAll(): array;
    public function getAllClassees(array $profil): array;
}
