<?php
namespace Reponses;

interface ReponsesManagerInterface {
    public function getEchelle(): array;
    public function getByUtilisateur(int $idUtilisateur): array;
    public function getProfil(int $idUtilisateur): array;
    public function valider(array $questions, array $reponses): array;
    public function enregistrer(int $idUtilisateur, array $reponses): void;
}
