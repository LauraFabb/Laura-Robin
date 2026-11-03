<?php
// Aide avec l'IA (n°1)
spl_autoload_register(function ($classe) {
    $fichier = __DIR__ . '/classes/' . str_replace('\\', '/', $classe) . '.php';

    if (file_exists($fichier)) {
        require_once $fichier;
    }
});
