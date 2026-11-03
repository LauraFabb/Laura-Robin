<?php
namespace Categories;

// Une catégorie de métiers (une ligne de la table "categories")
class Categorie {
    private int $id;
    private string $nom;
    private string $description;
    private int $salaireMin;
    private int $salaireMax;
    private int $risqueIa;
    private int $score = 0; // score de correspondance avec le profil (en %)

    public function __construct(
        int $id,
        string $nom,
        string $description,
        int $salaireMin,
        int $salaireMax,
        int $risqueIa
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->salaireMin = $salaireMin;
        $this->salaireMax = $salaireMax;
        $this->risqueIa = $risqueIa;
    }

    // ── Getters ─────────────────────────────────────────────────
    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getSalaireMin(): int {
        return $this->salaireMin;
    }

    public function getSalaireMax(): int {
        return $this->salaireMax;
    }

    public function getRisqueIa(): int {
        return $this->risqueIa;
    }

    public function getScore(): int {
        return $this->score;
    }

    // ── Setter ──────────────────────────────────────────────────
    public function setScore(int $score): void {
        $this->score = $score;
    }

    // ── Méthodes d'affichage ────────────────────────────────────

    // Salaire en milliers : "CHF 80k – 115k"
    public function getSalaireFormate(): string {
        $min = round($this->salaireMin / 1000);
        $max = round($this->salaireMax / 1000);
        return 'CHF ' . $min . 'k – ' . $max . 'k';
    }

    // Niveau de risque IA (sert de classe CSS) : 'faible', 'moyen' ou 'eleve'
    public function getNiveauRisqueIa(): string {
        if ($this->risqueIa <= 2) {
            return 'faible';
        } elseif ($this->risqueIa == 3) {
            return 'moyen';
        } else {
            return 'eleve';
        }
    }

    // Texte du risque IA : "Faible", "Moyen" ou "Élevé"
    public function getTexteRisqueIa(): string {
        if ($this->risqueIa <= 2) {
            return 'Faible';
        } elseif ($this->risqueIa == 3) {
            return 'Moyen';
        } else {
            return 'Élevé';
        }
    }
}
