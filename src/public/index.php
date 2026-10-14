<?php
const DB_HOST = 'mariadb';
const DB_PORT = 3306;
const DB_NAME = 'my_database';
const DB_USER = 'username';
const DB_PASSWORD = 'password';

$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// Liste des tables de la base (14 attendues après avoir lancé script.sql)
$sql = "SHOW TABLES";

$stmt = $pdo->prepare($sql);

$stmt->execute();

$tables = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Nombre de lignes de chaque table (0 partout tant qu'il n'y a pas de données)
$nbLignes = [];
foreach ($tables as $table) {
    // Le nom vient de SHOW TABLES, pas de l'utilisateur : pas de risque d'injection ici
    $nbLignes[$table] = (int) $pdo->query("SELECT COUNT(*) FROM `$table`")->fetchColumn();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYNJ – FindYourNumericJob</title>
</head>

<body>
    <h1>FYNJ – FindYourNumericJob</h1>

    <p>La connexion à la base de données fonctionne ✅</p>

    <h2>Tables de la base « <?= htmlspecialchars(DB_NAME) ?> » : <?= count($tables) ?> (12 attendues)</h2>

    <ul>
        <?php foreach ($tables as $table) { ?>
            <li><?= htmlspecialchars($table) ?>
                <ul>
                    <li>Lignes : <?= $nbLignes[$table] ?></li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</body>

</html>
