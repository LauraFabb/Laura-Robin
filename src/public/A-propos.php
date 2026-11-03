<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>À propos – FYNJ</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f1f3ea; --ink:#0a0a0a; --muted:#5d6155;
  --lime:#c6f400; --red:#ff1a0a; --radius:14px;
  --mono:'DM Mono',ui-monospace,monospace;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Outfit',system-ui,sans-serif;background:var(--bg);color:var(--ink);line-height:1.55}
a{color:inherit;text-decoration:none}
.wrap{max-width:1100px;margin:0 auto;padding:0 24px}
:focus-visible{outline:3px solid #6d28d9;outline-offset:2px}

/* Boutons */
.btn{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;border-radius:8px;font:600 14px 'Outfit';cursor:pointer;border:1px solid transparent;transition:transform .15s}
.btn:hover{transform:translateY(-1px)}
.btn-red{background:var(--red);color:#fff}
.btn-white{background:#fff;color:var(--ink)}
.btn-black{background:var(--ink);color:var(--lime)}

/* Nav */
.nav{background:var(--ink);color:#fff}
.nav .wrap{display:flex;align-items:center;justify-content:space-between;height:60px;gap:16px}
.logo{display:flex;align-items:center;gap:10px;font-weight:700;letter-spacing:.02em}
.logo i{width:26px;height:26px;border-radius:7px;background:var(--lime);display:grid;place-items:center;color:var(--ink);font-style:normal;font-size:14px}
.nav ul{display:flex;gap:28px;list-style:none;font-size:14px}
.nav ul a{opacity:.65}
.nav ul a[aria-current]{opacity:1;font-weight:700}
.nav .actions{display:flex;gap:10px}

/* Éléments communs */
.eyebrow{font:400 11px var(--mono);letter-spacing:.06em;text-transform:uppercase;margin-bottom:18px}
section{padding:64px 0}
h1{font-size:clamp(34px,5vw,48px);line-height:1.08;font-weight:600;letter-spacing:-.02em;margin-bottom:18px}
h2{font-size:clamp(26px,3.5vw,34px);line-height:1.15;font-weight:600;letter-spacing:-.015em}
.muted{color:var(--muted);font-size:15px}

/* Hero */
.hero .wrap{display:grid;grid-template-columns:1.15fr .85fr;gap:48px;align-items:center}
.hero p.lead{max-width:48ch;color:var(--muted);margin-bottom:22px}
.hero .meta{font:400 11px var(--mono);letter-spacing:.06em;text-transform:uppercase}
.panel{background:var(--ink);color:#fff;border-radius:20px;padding:28px}
.panel .eyebrow{color:var(--lime);margin-bottom:16px}
.panel h2{font-size:28px;font-weight:600;line-height:1.12;margin-bottom:22px}
.panel hr{border:0;border-top:1px solid rgba(255,255,255,.2);margin-bottom:16px}
.panel p{font-size:13px;opacity:.8;max-width:22ch}

/* Point de départ */
.start{background:#fff}
.start .wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px}
.start .txt{display:grid;gap:16px;font-size:14px;color:var(--muted)}

/* Approche */
.steps{display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-top:28px}
.step{background:#fff;border-radius:var(--radius);padding:22px;min-height:170px}
.step .n{font:400 18px var(--mono);margin-bottom:22px}
.step h3{font-size:17px;margin-bottom:6px}
.step p{font-size:13px;color:var(--muted)}

/* Engagements */
.commit{background:var(--ink);color:#fff}
.commit .eyebrow{color:var(--lime)}
.commit .wrap{display:grid;grid-template-columns:1fr 1fr;gap:48px}
.commit .intro p{color:rgba(255,255,255,.7);font-size:14px;margin-top:16px;max-width:40ch}
.commit dl{display:grid;gap:22px}
.commit dt{font-weight:600;font-size:16px;margin-bottom:4px}
.commit dd{font-size:13px;color:rgba(255,255,255,.65)}

/* CTA */
.final{background:var(--red);color:#fff;text-align:center;padding:64px 0}
.final h2{max-width:22ch;margin:0 auto 12px;font-size:clamp(24px,3.5vw,32px)}
.final p{font-size:13px;color:var(--lime);margin-bottom:22px}

/* Footer */
footer{background:var(--ink);color:#fff;padding:28px 0;font-size:12px}
footer .wrap{display:flex;justify-content:space-between;gap:24px;flex-wrap:wrap}
footer small{display:block;opacity:.6;margin-top:6px;max-width:34ch}

@media (max-width:860px){
  .nav ul{display:none}
  .hero .wrap,.start .wrap,.commit .wrap,.steps{grid-template-columns:1fr}
}
@media (prefers-reduced-motion:reduce){*{transition:none!important;scroll-behavior:auto!important}}
</style>
</head>
<body>

<header class="nav">
  <div class="wrap">
    <a class="logo" href="index.html"><i>◆</i>FYNJ</a>
    <nav><ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="index.html#metiers">Métiers</a></li>
      <li><a href="#">Quiz</a></li>
      <li><a href="a-propos.html" aria-current="page">À propos</a></li>
    </ul></nav>
    <div class="actions">
      <a class="btn btn-white" href="#">Se connecter</a>
      <a class="btn btn-red" href="#">Commencer le quiz</a>
    </div>
  </div>
</header>

<main>
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

  <section>
    <div class="wrap">
      <p class="eyebrow">Notre approche</p>
      <h2>Mieux te connaître. Mieux choisir.</h2>
      <p class="muted" style="margin-top:8px">Trois façons complémentaires de faire avancer la réflexion.</p>
      <div class="steps">
        <article class="step"><p class="n">01</p><h3>Partir de toi</h3><p>Tes envies, tes compétences et tes priorités servent de point de départ. Le quiz t'aide à mettre des mots sur ce qui compte pour toi.</p></article>
        <article class="step"><p class="n">02</p><h3>Rendre les métiers lisibles</h3><p>Compare les pistes sur des critères concrets : salaire, créativité, expertise et impact de l'IA. Va au-delà des intitulés.</p></article>
        <article class="step"><p class="n">03</p><h3>Passer à l'action</h3><p>Garde tes pistes favorites et construis un plan pour la suite : des projets à essayer, des compétences à développer et des parcours à explorer.</p></article>
      </div>
    </div>
  </section>

  <section class="commit">
    <div class="wrap">
      <div class="intro">
        <p class="eyebrow">Nos engagements</p>
        <h2>Des repères,<br>pas des étiquettes.</h2>
        <p>Ton profil évolue. Tes envies aussi. FYNJ est là pour ouvrir des possibilités, pas pour fermer des portes.</p>
      </div>
      <dl>
        <div><dt>Tu gardes la main</dt><dd>Une recommandation est une piste à explorer, jamais une décision à suivre les yeux fermés.</dd></div>
        <div><dt>Le concret avant le jargon</dt><dd>Des critères compréhensibles et comparables pour t'aider à poser les bonnes questions.</dd></div>
        <div><dt>L'IA, avec du recul</dt><dd>Comprendre ce que l'IA transforme dans un métier, plutôt que le résumer à « menacé » ou « protégé ».</dd></div>
      </dl>
    </div>
  </section>

  <div class="final">
    <div class="wrap">
      <h2>Et si tu commençais par explorer tes possibles ?</h2>
      <p>Tes premières pistes sont à portée de quiz.</p>
      <a class="btn btn-black" href="#">→ Faire le quiz · 5 min</a>
    </div>
  </div>
</main>

<footer>
  <div class="wrap">
    <div>
      <a class="logo" href="index.html"><i>◆</i>FYNJ</a>
      <small>FYNJ est un projet étudiant de la HEIG-VD qui aide à explorer les métiers du numérique après le Bachelor.</small>
    </div>
    <div>Contact<small>contact@fynj.ch</small></div>
    <div>Projet<small>HEIG-VD, Yverdon-les-Bains</small></div>
  </div>
</footer>

</body>
</html>
