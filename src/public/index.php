<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FYNJ – Find Your Numeric Job</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="./css/commun.css">
    <link rel="stylesheet" href="./css/accueil.css">
</head>

<body>

    <!-- HEADER / NAVIGATION -->
    <header class="nav">
        <div class="wrap">
            <a class="logo" href="index.php"><i>◆</i>FYNJ</a>
            <nav aria-label="Navigation principale">
                <ul>
                    <li><a href="index.php" aria-current="page">Accueil</a></li>
                    <li><a href="#metiers">Métiers</a></li>
                    <li><a href="quiz.php">Quiz</a></li>
                    <li><a href="a-propos.php">À propos</a></li>
                </ul>
            </nav>
            <div class="actions">
                <a class="btn btn-white" href="connexion.php">Se connecter</a>
                <a class="btn btn-red" href="quiz.php">Découvrir l'outil</a>
            </div>
        </div>
    </header>

    <main>
        <!-- HERO -->
        <section class="hero">
            <div class="wrap">
                <div>
                    <span class="badge">Projet HEIG-VD</span>
                    <h1>Find Your Numeric Job</h1>
                    <p class="lead">FYNJ transforme tes envies, tes compétences et tes priorités en pistes professionnelles concrètes pour l'après Bachelor ingénierie des médias.</p>
                    <div class="cta">
                        <a class="btn btn-red" href="quiz.php">Faire le quiz (5 min)</a>
                        <a class="btn btn-white" href="#metiers">Explorer les métiers</a>
                    </div>
                    <div class="proof">
                        <div class="avatars" aria-hidden="true">
                            <span class="avatar--orange"></span>
                            <span class="avatar--violet"></span>
                            <span class="avatar--red"></span>
                        </div>
                        <span>Déjà testé par 38 étudiant·es</span>
                        <span>Données anonymes, sans jargon</span>
                    </div>
                </div>

                <div class="hero-card">
                    <span class="tag">Ton profil probable</span>
                    <h2>Exploratrice créative &amp; analytique</h2>
                    <div class="bars">
                        <div><b>Créativité <span>92%</span></b><em style="--v: 92%"></em></div>
                        <div><b>Analyse <span>78%</span></b><em style="--v: 78%"></em></div>
                        <div><b>Impact humain <span>64%</span></b><em class="bar--red" style="--v: 64%"></em></div>
                    </div>
                    <div class="match">
                        <small>94% compatible</small>
                        <strong>UX Designer</strong>
                        <span>Créativité et sens du détail</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- CHIFFRES CLÉS -->
        <div class="stats">
            <div class="wrap">
                <p><strong>24</strong>métiers numériques</p>
                <p><strong>10</strong>filières et secteurs</p>
                <p><strong>4</strong>critères comparables</p>
                <p><strong>100%</strong>gratuit pour la HEIG-VD</p>
            </div>
        </div>

        <!-- ÉTAPES -->
        <section>
            <div class="wrap">
                <p class="eyebrow">Simple, rapide, sans jargon</p>
                <h2 class="title">Ton orientation en 3 étapes</h2>
                <p class="sub">Un chemin guidé pour passer de « je ne sais pas encore » à un plan d'action clair et motivant.</p>
                <div class="grid3">
                    <article class="step">
                        <div class="ico" aria-hidden="true">✦</div>
                        <h3>Exprime ce qui compte</h3>
                        <p>Salaire, créativité, expertise ou impact de l'IA : note ce qui oriente tes priorités et ce que tu veux.</p>
                    </article>
                    <article class="step">
                        <div class="ico" aria-hidden="true">◎</div>
                        <h3>Explore tes affinités</h3>
                        <p>Découvre les métiers du numérique les plus proches de ton profil, avec des données fiables et comparables.</p>
                    </article>
                    <article class="step">
                        <div class="ico" aria-hidden="true">➜</div>
                        <h3>Construis ton parcours</h3>
                        <p>Sauvegarde tes pistes, classe des projets et prépare la suite de ton Bachelor avec un plan d'action.</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- MÉTIERS -->
        <section id="metiers" class="jobs">
            <div class="wrap">
                <div class="jobs-head">
                    <h2 class="title">Des métiers concrets, des critères comparables</h2>
                    <a href="catalogue.php">Voir tout le catalogue</a>
                </div>
                <div class="grid3">
                    <article class="job">
                        <div class="top">
                            <div><span class="pct">94% compatible</span><h3>UX Designer</h3></div>
                            <button type="button" class="save" aria-label="Sauvegarder">▢</button>
                        </div>
                        <div class="facts">
                            <div>Salaire moyen<b>CHF 92k</b></div>
                            <div>Aptitudes<b>Moyenne</b></div>
                            <div>Risque IA<b>Faible</b></div>
                        </div>
                        <div class="tags"><span>Recherche</span><span>Prototypage</span></div>
                        <div class="foot"><a href="fiche-categorie.php">Voir la fiche</a><span>+ Comparer</span></div>
                    </article>
                    <article class="job">
                        <div class="top">
                            <div><span class="pct">88% compatible</span><h3>Data Analyst</h3></div>
                            <button type="button" class="save" aria-label="Sauvegarder">▢</button>
                        </div>
                        <div class="facts">
                            <div>Salaire moyen<b>CHF 105k</b></div>
                            <div>Aptitudes<b>Élevée</b></div>
                            <div>Risque IA<b>Moyen</b></div>
                        </div>
                        <div class="tags"><span>SQL</span><span>Visualisation</span></div>
                        <div class="foot"><a href="fiche-categorie.php">Voir la fiche</a><span>+ Comparer</span></div>
                    </article>
                    <article class="job">
                        <div class="top">
                            <div><span class="pct">86% compatible</span><h3>Creative Technologist</h3></div>
                            <button type="button" class="save" aria-label="Sauvegarder">▢</button>
                        </div>
                        <div class="facts">
                            <div>Salaire moyen<b>CHF 96k</b></div>
                            <div>Aptitudes<b>Élevée</b></div>
                            <div>Risque IA<b>Faible</b></div>
                        </div>
                        <div class="tags"><span>Code créatif</span><span>3D / XR</span></div>
                        <div class="foot"><a href="fiche-categorie.php">Voir la fiche</a><span>+ Comparer</span></div>
                    </article>
                </div>
            </div>
        </section>

        <!-- TÉMOIGNAGE -->
        <section class="testi">
            <div class="wrap">
                <div class="photo" role="img" aria-label="Portrait de Sarah Anselmann"></div>
                <div>
                    <span class="alert">Parole d'alumni</span>
                    <blockquote>« Voir les tâches réellement transformées par l'IA m'a aidée à choisir l'UX, pas par défaut, mais en connaissance de cause. »</blockquote>
                    <p class="who"><strong>Sarah Anselmann</strong><span>UX Designer · Bachelor IM 2024 · 1 an</span></p>
                </div>
            </div>
        </section>

        <!-- APPEL À L'ACTION -->
        <div class="final">
            <div class="wrap">
                <h2>Ton futur job mérite mieux qu'un test de personnalité générique.</h2>
                <p>Cinq minutes pour des pistes concrètes, un plan et des métiers qui te ressemblent.</p>
                <a class="btn btn-black" href="quiz.php">Commencer le quiz</a>
            </div>
        </div>
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
