<?php
namespace Categories;

interface CategoriesManagerInterface {
    public function getAll(): array;
    public function getAllClassees(array $profil): array;
}
