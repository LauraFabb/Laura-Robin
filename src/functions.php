<?php

function render(string $component, array $data = []): void
{
    // Le chemin est calculé avant `extract()` afin qu'une valeur de `$data`
    // ne puisse pas écraser la variable `$componentPath`.
    $componentPath = __DIR__ . '/components/' . $component . '.php';

    // `extract()` transforme les clés du tableau en variables locales à la
    // fonction. `EXTR_SKIP` empêche d'écraser les variables déjà présentes.
    extract($data, EXTR_SKIP);

    // `require` et non `require_once` : un composant peut être affiché
    // plusieurs fois dans une même page.
    require $componentPath;
}
