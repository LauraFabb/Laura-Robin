<?php
require __DIR__ . '/../autoloader.php';

use Questions\QuestionsManager;
use Reponses\ReponsesManager;

$questionsManager = new QuestionsManager();
$reponsesManager  = new ReponsesManager();

// Temporaire : utilisateur n°1 tant que la connexion n'existe pas
$idUtilisateur = 1;

$questions = $questionsManager->getAll();
$reponses  = $reponsesManager->getByUtilisateur($idUtilisateur);
$echelle   = $reponsesManager->getEchelle();
$errors    = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reponses = $_POST['reponses'] ?? [];
    $errors   = $reponsesManager->valider($questions, $reponses);

    if (empty($errors)) {
        // On garde seulement les réponses des questions qui existent
        $reponsesValides = [];
        foreach ($questions as $question) {
            $reponsesValides[$question->getId()] = $reponses[$question->getId()];
        }

        $reponsesManager->enregistrer($idUtilisateur, $reponsesValides);
        header('Location: catalogue.php');
        exit;
    }
}

$nbQuestions = count($questions);
$nbReponses = count($reponses);
?>

<?php require_once __DIR__ . '/../functions.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<?php render('head', ['title' => 'quiz | FYNJ', 'css' => 'quiz']); ?>


<body>

    <?php render('header', ['current' => 'quiz.php']); ?>

    <div class="container">
        <!-- HERO -->
        <div class="hero">
            <h2>Quel domaine du numérique est fait pour toi ?</h2>
            <p>Réponds aux <?= $nbQuestions ?> affirmations ci-dessous selon ton niveau d'accord. Il n'y a pas de bonne ou de mauvaise réponse : réponds simplement comme tu te sens.</p>
        </div>

        <!-- ERREURS -->
        <?php if (!empty($errors)) { ?>
            <div class="error-box">
                <p><strong>Il manque des réponses :</strong></p>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
    </div>

    <main class="main">
        <form action="quiz.php" method="POST" id="quiz-form">

            <section class="container question-list">
                <?php foreach ($questions as $question) { ?>
                    <?php
                    $qid   = $question->getId();
                    $ordre = $question->getOrdre();
                    $texte = htmlspecialchars($question->getTexte());
                    // Aide avec l'IA (n°5)
                    $valeurChoisie = $reponses[$qid] ?? 0;
                    ?>
                    <div class="question-card" id="question-<?= $qid ?>">
                        <span class="question-number">Question <?= $ordre ?> / <?= $nbQuestions ?></span>
                        <h3 class="question-text"><?= $texte ?></h3>

                        <div class="answer-grid">
                            <?php foreach ($echelle as $valeur => $label) { ?>
                                <div>
                                    <input
                                        type="radio"
                                        name="reponses[<?= $qid ?>]"
                                        id="q<?= $qid ?>-<?= $valeur ?>"
                                        value="<?= $valeur ?>"
                                        class="choice-input"
                                        required
                                        <?= $valeurChoisie == $valeur ? 'checked' : '' ?>>
                                    <label for="q<?= $qid ?>-<?= $valeur ?>" class="answer-card">
                                        <span class="answer-value"><?= $valeur ?></span>
                                        <span class="answer-label"><?= htmlspecialchars($label) ?></span>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
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

<?php render('footer'); ?>

</body>

</html>
