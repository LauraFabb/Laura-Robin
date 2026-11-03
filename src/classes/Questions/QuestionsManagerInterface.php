<?php
namespace Questions;

// Contrat : les méthodes que doit avoir un gestionnaire de questions
interface QuestionsManagerInterface {
    public function getAll(): array;
}
