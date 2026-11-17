<?php
// Paramètre attendu : $current = nom du fichier de la page courante (ex. 'index.php')
$current = $current ?? '';

$links = [
    'index.php'     => 'Accueil',
    'catalogue.php' => 'Métiers',
    'quiz.php'      => 'Quiz',
    'a-propos.php'  => 'À propos',
];
?>
<header class="nav">
    <div class="wrap">
        <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
        <nav aria-label="Navigation principale">
            <ul>
                <?php foreach ($links as $file => $label) { ?>
                    <li>
                        <a href="<?= $file ?>" <?= $current === $file ? 'aria-current="page"' : '' ?>><?= $label ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <div class="actions">
            <a class="btn btn-white" href="connexion.php">Se connecter</a>
            <a class="btn btn-red" href="quiz.php">Découvrir l'outil</a>
        </div>
    </div>
</header>
