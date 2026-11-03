<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos – FYNJ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Outfit:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="./css/commun.css">
    <link rel="stylesheet" href="./css/a-propos.css">
</head>

<body>

    <!-- HEADER / NAVIGATION -->
    <header class="nav">
        <div class="wrap">
            <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
            <nav aria-label="Navigation principale">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php#metiers">Métiers</a></li>
                    <li><a href="quiz.php">Quiz</a></li>
                    <li><a href="a-propos.php" aria-current="page">À propos</a></li>
                </ul>
            </nav>
            <div class="actions">
                <a class="btn btn-white" href="connexion.php">Se connecter</a>
                <a class="btn btn-red" href="quiz.php">Commencer le quiz</a>
            </div>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="wrap">
                <div>
                    <p class="eyebrow">À propos de FYNJ</p>
                    <h1>Ton avenir ne tient pas dans une case.</h1>
                    <p class="lead">Find Your Numeric Job t'aide à explorer les métiers du numérique après le Bachelor Ingénierie des médias. Pas pour choisir à ta place : pour te donner les repères qui te manquent.</p>
                    <p class="meta">Projet étudiant / HEIG-VD</p>
                </div>
                <div class="panel">
                    <p class="eyebrow">Find your numeric job</p>
                    <h2>Tes envies.<br>Tes talents.<br>Tes possibles.</h2>
                    <hr>
                    <p>Un point de départ, pas une destination imposée.</p>
                </div>
            </div>
        </section>

        <!-- POINT DE DÉPART -->
        <section class="start">
            <div class="wrap">
                <div>
                    <p class="eyebrow">Le point de départ</p>
                    <h2>Un Bachelor, plein de directions possibles.</h2>
                </div>
                <div class="txt">
                    <p>Design, développement, data, marketing… L'ingénierie des médias ouvre des portes très différentes. Mais entre un intitulé de poste et ce qu'on fait vraiment au quotidien, il reste souvent un flou.</p>
                    <p>FYNJ fait le lien entre ce que tu apprends, ce qui te motive et les pistes que tu peux explorer. L'idée : rendre la suite plus lisible, sans réduire ton parcours à un seul métier.</p>
                </div>
            </div>
        </section>

        <!-- APPROCHE -->
        <section>
            <div class="wrap">
                <p class="eyebrow">Notre approche</p>
                <h2>Mieux te connaître. Mieux choisir.</h2>
                <p class="muted">Trois façons complémentaires de faire avancer la réflexion.</p>
                <div class="steps">
                    <article class="step">
                        <p class="n">01</p>
                        <h3>Partir de toi</h3>
                        <p>Tes envies, tes compétences et tes priorités servent de point de départ. Le quiz t'aide à mettre des mots sur ce qui compte pour toi.</p>
                    </article>
                    <article class="step">
                        <p class="n">02</p>
                        <h3>Rendre les métiers lisibles</h3>
                        <p>Compare les pistes sur des critères concrets : salaire, créativité, expertise et impact de l'IA. Va au-delà des intitulés.</p>
                    </article>
                    <article class="step">
                        <p class="n">03</p>
                        <h3>Passer à l'action</h3>
                        <p>Garde tes pistes favorites et construis un plan pour la suite : des projets à essayer, des compétences à développer et des parcours à explorer.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- ENGAGEMENTS -->
        <section class="commit">
            <div class="wrap">
                <div class="intro">
                    <p class="eyebrow">Nos engagements</p>
                    <h2>Des repères,<br>pas des étiquettes.</h2>
                    <p>Ton profil évolue. Tes envies aussi. FYNJ est là pour ouvrir des possibilités, pas pour fermer des portes.</p>
                </div>
                <dl>
                    <div>
                        <dt>Tu gardes la main</dt>
                        <dd>Une recommandation est une piste à explorer, jamais une décision à suivre les yeux fermés.</dd>
                    </div>
                    <div>
                        <dt>Le concret avant le jargon</dt>
                        <dd>Des critères compréhensibles et comparables pour t'aider à poser les bonnes questions.</dd>
                    </div>
                    <div>
                        <dt>L'IA, avec du recul</dt>
                        <dd>Comprendre ce que l'IA transforme dans un métier, plutôt que le résumer à « menacé » ou « protégé ».</dd>
                    </div>
                </dl>
            </div>
        </section>

        <!-- APPEL À L'ACTION -->
        <div class="final">
            <div class="wrap">
                <h2>Et si tu commençais par explorer tes possibles ?</h2>
                <p>Tes premières pistes sont à portée de quiz.</p>
                <a class="btn btn-black" href="quiz.php">→ Faire le quiz · 5 min</a>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="wrap">
            <div>
                <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
                <small>FYNJ est un projet étudiant de la HEIG-VD qui aide à explorer les métiers du numérique après le Bachelor.</small>
            </div>
            <div>Contact<small><a href="mailto:contact@fynj.ch">contact@fynj.ch</a></small></div>
            <div>Projet<small>HEIG-VD, Yverdon-les-Bains</small></div>
        </div>
    </footer>

</body>

</html>
