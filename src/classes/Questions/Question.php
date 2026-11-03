<?php
namespace Questions;

// Une question du quiz (une ligne de la table "questions")
class Question {
    private int $id;
    private int $idCritere;
    private string $texte;
    private int $ordre;

    public function __construct(int $id, int $idCritere, string $texte, int $ordre) {
        $this->id = $id;
        $this->idCritere = $idCritere;
        $this->texte = $texte;
        $this->ordre = $ordre;
    }

    // ── Getters ─────────────────────────────────────────────────
    public function getId(): int {
        return $this->id;
    }

    public function getIdCritere(): int {
        return $this->idCritere;
    }

    public function getTexte(): string {
        return $this->texte;
    }

    public function getOrdre(): int {
        return $this->ordre;
    }
}
