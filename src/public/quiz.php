<?php
session_start();

require __DIR__ . '/../autoloader.php';

use Questions\QuestionsManager;
use Reponses\ReponsesManager;

// 1) Créer la connexion et les gestionnaires (managers)
$database         = new Database();
$questionsManager = new QuestionsManager($database);
$reponsesManager  = new ReponsesManager($database);

// Utilisateur : pour l'instant, utilisateur n°1 par défaut
// (à remplacer par la vérification de connexion quand connexion.php sera fait)
$idUtilisateur = (int) ($_SESSION['utilisateur_id'] ?? 1);

// 2) Charger les questions et les réponses déjà enregistrées (pour reprendre le quiz)
$questions = $questionsManager->getAll();
$reponses  = $reponsesManager->getByUtilisateur($idUtilisateur);
$echelle   = $reponsesManager->getEchelle();
$errors    = [];

// 3) Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reponses = $_POST['reponses'] ?? [];
    $errors   = $reponsesManager->valider($questions, $reponses);

    if (empty($errors)) {
        $reponsesManager->enregistrer($idUtilisateur, $reponses);
        header('Location: catalogue.php');
        exit;
    }
}

$nbQuestions = count($questions);
$nbReponses = count($reponses);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYNJ – Quiz d'orientation</title>
    <link rel="stylesheet" href="./css/variables.css">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/quiz.css">
    <link rel="stylesheet" href="./css/responsive.css">
</head>

<body>

    <!-- HEADER STICKY -->
    <header class="site-header">
        <h1>FYNJ – FindYourNumericJob</h1>
        <p>Quiz d'orientation</p>

        <!-- Barre de progression -->
        <div class="progress">
            <div class="progress__bar" id="progress-bar"
                style="width: <?= $nbQuestions > 0 ? round($nbReponses / $nbQuestions * 100) : 0 ?>%;"></div>
        </div>
        <p class="progress__text">
            <span id="progress-count"><?= $nbReponses ?></span> / <?= $nbQuestions ?> réponses
        </p>
    </header>

    <div class="container">
        <!-- HERO -->
        <div class="hero">
            <h2>Quel domaine du numérique est fait pour toi ?</h2>
            <p>Réponds aux <?= $nbQuestions ?> affirmations ci-dessous selon ton niveau d'accord. Il n'y a pas de bonne ou de mauvaise réponse : réponds simplement comme tu te sens.</p>
        </div>

        <!-- ERREURS -->
        <?php if (!empty($errors)): ?>
            <div class="error-box">
                <p><strong>Il manque des réponses :</strong></p>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <main class="main">
        <form action="quiz.php" method="POST" id="quiz-form">

            <section class="container question-list">
                <?php foreach ($questions as $question): ?>
                    <?php
                    $qid   = $question->getId();
                    $ordre = $question->getOrdre();
                    $texte = htmlspecialchars($question->getTexte());
                    $valeurChoisie = (int) ($reponses[$qid] ?? 0);
                    ?>
                    <div class="question-card" id="question-<?= $qid ?>">
                        <span class="question-number">Question <?= $ordre ?> / <?= $nbQuestions ?></span>
                        <h3 class="question-text"><?= $texte ?></h3>

                        <div class="answer-grid">
                            <?php foreach ($echelle as $valeur => $label): ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="reponses[<?= $qid ?>]"
                                        id="q<?= $qid ?>-<?= $valeur ?>"
                                        value="<?= $valeur ?>"
                                        class="choice-input"
                                        <?= $valeurChoisie === $valeur ? 'checked' : '' ?>>
                                    <label for="q<?= $qid ?>-<?= $valeur ?>" class="answer-card">
                                        <span class="answer-value"><?= $valeur ?></span>
                                        <span class="answer-label"><?= htmlspecialchars($label) ?></span>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <section class="container">
                <div class="selection-summary">
                    <button type="submit" class="btn-primary">
                        Voir mes domaines recommandés →
                    </button>
                </div>
            </section>
        </form>
    </main>

    <footer><small>Projet réalisé dans le cadre du cours ProgServ2 à la HEIG-VD</small></footer>


</body>

</html>
