<?php
session_start();

require __DIR__ . '/../autoloader.php';

use Categories\CategoriesManager;
use Reponses\ReponsesManager;

// 1) Créer la connexion et les gestionnaires (managers)
$database          = new Database();
$categoriesManager = new CategoriesManager($database);
$reponsesManager   = new ReponsesManager($database);

// Utilisateur : pour l'instant, utilisateur n°1 par défaut
// (à remplacer par la vérification de connexion quand connexion.php sera fait)
$idUtilisateur = (int) ($_SESSION['utilisateur_id'] ?? 1);

// 2) Calculer le profil de l'utilisateur et classer les catégories
$profil        = $reponsesManager->getProfil($idUtilisateur);
$categories    = $categoriesManager->getAllClassees($profil);
$meilleurScore = empty($categories) ? 0 : $categories[0]->getScore();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ton catalogue – FYNJ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="./css/commun.css">
    <link rel="stylesheet" href="./css/catalogue.css">
</head>

<body>

    <!-- HEADER / NAVIGATION -->
    <header class="nav">
        <div class="wrap">
            <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
            <nav aria-label="Navigation principale">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="catalogue.php" aria-current="page">Catalogue</a></li>
                    <li><a href="quiz.php">Quiz</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <!-- EN-TÊTE DU CATALOGUE -->
        <section class="catalogue-head">
            <div class="wrap">
                <p class="eyebrow">Résultat de ton quiz</p>
                <h1>Les domaines qui te correspondent</h1>
                <p class="lead">Voici les catégories de métiers classées selon tes réponses. Le pourcentage indique à quel point chaque domaine correspond à tes centres d'intérêt.</p>
                <a class="btn btn-white" href="quiz.php">↺ Refaire le test</a>
            </div>
        </section>

        <section class="catalogue">
            <div class="wrap">

                <!-- MESSAGE SI AUCUNE CATÉGORIE NE CORRESPOND BIEN -->
                <?php if ($meilleurScore < 60): ?>
                    <div class="notice">
                        <p><strong>Aucun domaine ne ressort vraiment de tes réponses.</strong> Ce n'est pas grave : parcours les fiches ci-dessous pour découvrir les métiers, ou <a href="quiz.php">ajuste tes réponses</a>.</p>
                    </div>
                <?php endif; ?>

                <div class="categorie-grid">
                    <?php foreach ($categories as $categorie): ?>
                        <?php
                        $cid          = $categorie->getId();
                        $nom          = htmlspecialchars($categorie->getNom());
                        $description  = htmlspecialchars($categorie->getDescription());
                        $score        = $categorie->getScore();
                        $salaire      = $categorie->getSalaireFormate();
                        $niveauRisque = $categorie->getNiveauRisqueIa();
                        $texteRisque  = $categorie->getTexteRisqueIa();
                        ?>
                        <article class="categorie-card">
                            <div class="categorie-card__top">
                                <span class="score"><?= $score ?>% compatible</span>
                            </div>

                            <h2 class="categorie-nom"><?= $nom ?></h2>

                            <!-- Barre de correspondance -->
                            <div class="score-bar" aria-hidden="true">
                                <span style="width: <?= $score ?>%"></span>
                            </div>

                            <p class="categorie-desc"><?= $description ?></p>

                            <div class="facts">
                                <div>Salaire<b><?= $salaire ?></b></div>
                                <div>Risque IA<b class="risque risque--<?= $niveauRisque ?>"><?= $texteRisque ?></b></div>
                            </div>

                            <a class="categorie-link" href="fiche-categorie.php?id=<?= $cid ?>">Voir la fiche →</a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="wrap">
            <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
            <div>Contact<small><a href="mailto:contact@fynj.ch">contact@fynj.ch</a></small></div>
            <div>Projet<small>HEIG-VD, Yverdon-les-Bains</small></div>
        </div>
    </footer>

</body>

</html>
