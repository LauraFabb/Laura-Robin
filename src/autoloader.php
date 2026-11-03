<?php
// Autoloader : charge automatiquement une classe quand on l'utilise.
// Le namespace correspond au dossier dans src/classes/
// Exemple : Categories\CategoriesManager => src/classes/Categories/CategoriesManager.php
spl_autoload_register(function ($classe) {
    $fichier = __DIR__ . '/classes/' . str_replace('\\', '/', $classe) . '.php';

    if (file_exists($fichier)) {
        require_once $fichier;
    }
});
