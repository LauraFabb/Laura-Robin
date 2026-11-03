<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FYNJ – Find Your Numeric Job</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f1f3ea; --ink:#0a0a0a; --muted:#5d6155;
  --lime:#c6f400; --red:#ff1a0a; --violet:#6d28d9;
  --card:#fff; --soft:#eceee3; --radius:14px;
}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Outfit',system-ui,sans-serif;background:var(--bg);color:var(--ink);line-height:1.5}
img{max-width:100%;display:block}
a{color:inherit;text-decoration:none}
.wrap{max-width:1100px;margin:0 auto;padding:0 24px}
:focus-visible{outline:3px solid var(--violet);outline-offset:2px}
 
/* Boutons */
.btn{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;border-radius:8px;font:600 14px 'Outfit';cursor:pointer;border:1px solid transparent;transition:transform .15s}
.btn:hover{transform:translateY(-1px)}
.btn-red{background:var(--red);color:#fff}
.btn-white{background:#fff;color:var(--ink);border-color:#d9dccf}
.btn-black{background:var(--ink);color:#fff}
 
/* Nav */
.nav{background:var(--ink);color:#fff}
.nav .wrap{display:flex;align-items:center;justify-content:space-between;height:60px;gap:16px}
.logo{display:flex;align-items:center;gap:10px;font-weight:700;letter-spacing:.02em}
.logo i{width:26px;height:26px;border-radius:7px;background:var(--lime);display:grid;place-items:center;color:var(--ink);font-style:normal;font-size:14px}
.nav ul{display:flex;gap:28px;list-style:none;font-size:14px}
.nav ul a{opacity:.75}
.nav ul a[aria-current]{opacity:1;border-bottom:2px solid var(--lime);padding-bottom:4px}
.nav .actions{display:flex;gap:10px}
 
/* Hero */
.hero{padding:64px 0 72px}
.hero .wrap{display:grid;grid-template-columns:1.1fr .9fr;gap:48px;align-items:center}
.badge{display:inline-block;background:var(--lime);font-size:12px;font-weight:600;padding:4px 12px;border-radius:999px;margin-bottom:20px}
h1{font-size:clamp(36px,5vw,56px);line-height:1.05;font-weight:700;letter-spacing:-.02em;margin-bottom:18px}
.hero p.lead{color:var(--muted);max-width:44ch;margin-bottom:24px}
.hero .cta{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:24px}
.proof{display:flex;align-items:center;gap:14px;font-size:12px;color:var(--muted);flex-wrap:wrap}
.avatars{display:flex}
.avatars span{width:22px;height:22px;border-radius:50%;border:2px solid var(--bg);margin-left:-6px}
.avatars span:first-child{margin-left:0}
 
.hero-card{position:relative;background:var(--ink);color:#fff;border-radius:20px;padding:14px;min-height:340px;overflow:hidden;
  background-image:linear-gradient(180deg,rgba(0,0,0,.2),rgba(0,0,0,.85)),linear-gradient(135deg,#3b4a5a,#8a9aa8)}
.hero-card .tag{font-size:11px;font-weight:600;color:var(--lime)}
.hero-card h2{font-size:24px;line-height:1.15;margin:6px 0 14px;max-width:10ch}
.bars{display:grid;gap:8px;width:55%;font-size:11px}
.bars div{display:grid;gap:3px}
.bars b{display:flex;justify-content:space-between;font-weight:500}
.bars em{display:block;height:4px;border-radius:2px;background:rgba(255,255,255,.2);position:relative}
.bars em::after{content:"";position:absolute;inset:0 auto 0 0;width:var(--v);background:var(--c);border-radius:2px}
.match{position:absolute;left:14px;right:14px;bottom:14px;background:#fff;color:var(--ink);border-radius:12px;padding:6px 14px}
.match small{font-size:11px;font-weight:600;color:var(--muted)}
.match strong{display:block;font-size:18px}
.match span{font-size:12px;color:var(--muted)}
 
/* Stats */
.stats{background:var(--lime)}
.stats .wrap{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;padding-top:18px;padding-bottom:18px}
.stats p{font-size:12px}
.stats strong{font-size:22px;margin-right:6px}
 
/* Sections */
section{padding:64px 0}
.eyebrow{font-size:12px;font-weight:600;color:var(--red);margin-bottom:8px}
h2.title{font-size:28px;font-weight:600;letter-spacing:-.01em}
.sub{color:var(--muted);margin:6px 0 28px;font-size:15px}
.grid3{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.step{background:var(--soft);border-radius:var(--radius);padding:20px;border:1px solid #e1e4d6}
.step .ico{width:34px;height:34px;border-radius:9px;background:var(--lime);display:grid;place-items:center;margin-bottom:14px}
.step h3{font-size:17px;margin-bottom:6px}
.step p{font-size:13px;color:var(--muted)}
 
.jobs-head{display:flex;justify-content:space-between;align-items:baseline;margin-bottom:20px}
.jobs-head a{font-size:12px;color:var(--red);font-weight:600}
.job{background:var(--card);border-radius:var(--radius);padding:18px;box-shadow:0 2px 10px rgba(0,0,0,.08);display:grid;gap:12px}
.job .top{display:flex;justify-content:space-between;align-items:flex-start}
.job .pct{font-size:11px;font-weight:600}
.job .pct::before{content:"";display:inline-block;width:7px;height:7px;border-radius:50%;background:var(--lime);margin-right:6px}
.job h3{font-size:18px;margin-top:4px}
.job .save{width:28px;height:28px;border-radius:8px;border:1px solid #ddd;background:#fff;cursor:pointer}
.facts{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
.facts div{background:#f5f6ef;border-radius:8px;padding:8px;font-size:11px;color:var(--muted)}
.facts b{display:block;color:var(--ink);font-size:13px}
.tags{display:flex;gap:6px;flex-wrap:wrap}
.tags span{font-size:11px;padding:3px 10px;border:1px solid #ddd;border-radius:999px}
.job .foot{display:flex;justify-content:space-between;font-size:12px}
.job .foot a{color:var(--red);font-weight:600}
.job .foot span{color:var(--muted)}
 
/* Témoignage */
.testi .wrap{display:grid;grid-template-columns:.9fr 1.1fr;gap:40px;align-items:center}
.photo{aspect-ratio:1/1;border-radius:20px;background:linear-gradient(135deg,#d9a96a,#7b8f6a)}
.alert{display:inline-block;background:var(--violet);color:#fff;font-size:11px;font-weight:600;padding:3px 10px;border-radius:6px;margin-bottom:14px}
blockquote{font-size:22px;font-weight:500;line-height:1.3;margin-bottom:18px}
.who{font-size:13px}.who span{display:block;color:var(--muted);font-size:12px}
 
/* CTA final */
.final{background:var(--red);color:#fff;text-align:center;padding:72px 0}
.final h2{font-size:clamp(26px,4vw,38px);max-width:22ch;margin:0 auto 12px;line-height:1.15}
.final p{font-size:13px;opacity:.85;margin-bottom:22px}
 
/* Footer */
footer{background:var(--ink);color:#fff;padding:28px 0;font-size:12px}
footer .wrap{display:flex;justify-content:space-between;gap:24px;flex-wrap:wrap}
footer small{display:block;opacity:.6;margin-top:4px}
 
/* Responsive */
@media (max-width:860px){
  .nav ul{display:none}
  .hero .wrap,.testi .wrap{grid-template-columns:1fr}
  .grid3{grid-template-columns:1fr}
  .stats .wrap{grid-template-columns:1fr 1fr}
}
@media (prefers-reduced-motion:reduce){*{transition:none!important;scroll-behavior:auto!important}}
</style>
</head>
<body>
 
<header class="nav">
  <div class="wrap">
    <a class="logo" href="#"><i>◆</i>FYNJ</a>
    <nav><ul>
      <li><a href="#" aria-current="page">Accueil</a></li>
      <li><a href="#metiers">Métiers</a></li>
      <li><a href="#">Quiz</a></li>
      <li><a href="A-propos.php">À propos</a></li>
    </ul></nav>
    <div class="actions">
      <a class="btn btn-white" href="#">Se connecter</a>
      <a class="btn btn-red" href="#">Découvrir l'outil</a>
    </div>
  </div>
</header>
 
<main>
  <div class="hero">
    <div class="wrap">
      <div>
        <span class="badge">Projet HEIG-VD</span>
        <h1>Find Your Numeric Job</h1>
        <p class="lead">FYNJ transforme tes envies, tes compétences et tes priorités en pistes professionnelles concrètes pour l'après Bachelor ingénierie des médias.</p>
        <div class="cta">
          <a class="btn btn-red" href="#">Faire le quiz (5 min)</a>
          <a class="btn btn-white" href="#metiers">Explorer les métiers</a>
        </div>
        <div class="proof">
          <div class="avatars"><span style="background:#f59e0b"></span><span style="background:#6d28d9"></span><span style="background:#ff1a0a"></span></div>
          <span>Déjà testé par 38 étudiant·es</span>
          <span>Données anonymes, sans jargon</span>
        </div>
      </div>
 
      <div class="hero-card">
        <span class="tag">Ton profil probable</span>
        <h2>Exploratrice créative &amp; analytique</h2>
        <div class="bars">
          <div><b>Créativité <span>92%</span></b><em style="--v:92%;--c:var(--lime)"></em></div>
          <div><b>Analyse <span>78%</span></b><em style="--v:78%;--c:var(--lime)"></em></div>
          <div><b>Impact humain <span>64%</span></b><em style="--v:64%;--c:var(--red)"></em></div>
        </div>
        <div class="match">
          <small>94% compatible</small>
          <strong>UX Designer</strong>
          <span>Créativité et sens du détail</span>
        </div>
      </div>
    </div>
  </div>
 
  <div class="stats">
    <div class="wrap">
      <p><strong>24</strong>métiers numériques</p>
      <p><strong>10</strong>filières et secteurs</p>
      <p><strong>4</strong>critères comparables</p>
      <p><strong>100%</strong>gratuit pour la HEIG-VD</p>
    </div>
  </div>
 
  <section>
    <div class="wrap">
      <p class="eyebrow">Simple, rapide, sans jargon</p>
      <h2 class="title">Ton orientation en 3 étapes</h2>
      <p class="sub">Un chemin guidé pour passer de « je ne sais pas encore » à un plan d'action clair et motivant.</p>
      <div class="grid3">
        <article class="step"><div class="ico">✦</div><h3>Exprime ce qui compte</h3><p>Salaire, créativité, expertise ou impact de l'IA : note ce qui oriente tes priorités et ce que tu veux.</p></article>
        <article class="step"><div class="ico">◎</div><h3>Explore tes affinités</h3><p>Découvre les métiers du numérique les plus proches de ton profil, avec des données fiables et comparables.</p></article>
        <article class="step"><div class="ico">➜</div><h3>Construis ton parcours</h3><p>Sauvegarde tes pistes, classe des projets et prépare la suite de ton Bachelor avec un plan d'action.</p></article>
      </div>
    </div>
  </section>
 
  <section id="metiers" style="background:var(--bg);padding-top:0">
    <div class="wrap">
      <div class="jobs-head">
        <h2 class="title" style="font-size:20px">Des métiers concrets, des critères comparables</h2>
        <a href="#">Voir tout le catalogue</a>
      </div>
      <div class="grid3">
        <article class="job">
          <div class="top"><div><span class="pct">94% compatible</span><h3>UX Designer</h3></div><button class="save" aria-label="Sauvegarder">▢</button></div>
          <div class="facts"><div>Salaire moyen<b>CHF 92k</b></div><div>Aptitudes<b>Moyenne</b></div><div>Risque IA<b>Faible</b></div></div>
          <div class="tags"><span>Recherche</span><span>Prototypage</span></div>
          <div class="foot"><a href="#">Voir la fiche</a><span>+ Comparer</span></div>
        </article>
        <article class="job">
          <div class="top"><div><span class="pct">88% compatible</span><h3>Data Analyst</h3></div><button class="save" aria-label="Sauvegarder">▢</button></div>
          <div class="facts"><div>Salaire moyen<b>CHF 105k</b></div><div>Aptitudes<b>Élevée</b></div><div>Risque IA<b>Moyen</b></div></div>
          <div class="tags"><span>SQL</span><span>Visualisation</span></div>
          <div class="foot"><a href="#">Voir la fiche</a><span>+ Comparer</span></div>
        </article>
        <article class="job">
          <div class="top"><div><span class="pct">86% compatible</span><h3>Creative Technologist</h3></div><button class="save" aria-label="Sauvegarder">▢</button></div>
          <div class="facts"><div>Salaire moyen<b>CHF 96k</b></div><div>Aptitudes<b>Élevée</b></div><div>Risque IA<b>Faible</b></div></div>
          <div class="tags"><span>Code créatif</span><span>3D / XR</span></div>
          <div class="foot"><a href="#">Voir la fiche</a><span>+ Comparer</span></div>
        </article>
      </div>
    </div>
  </section>
 
  <section class="testi" style="background:#fff">
    <div class="wrap">
      <div class="photo" role="img" aria-label="Portrait de Sarah Anselmann"></div>
      <div>
        <span class="alert">Parole d'alumni</span>
        <blockquote>« Voir les tâches réellement transformées par l'IA m'a aidée à choisir l'UX, pas par défaut, mais en connaissance de cause. »</blockquote>
        <p class="who"><strong>Sarah Anselmann</strong><span>UX Designer · Bachelor IM 2024 · 1 an</span></p>
      </div>
    </div>
  </section>
 
  <div class="final">
    <div class="wrap">
      <h2>Ton futur job mérite mieux qu'un test de personnalité générique.</h2>
      <p>Cinq minutes pour des pistes concrètes, un plan et des métiers qui te ressemblent.</p>
      <a class="btn btn-black" href="#">Commencer le quiz</a>
    </div>
  </div>
</main>
 
<footer>
  <div class="wrap">
    <a class="logo" href="#"><i>◆</i>FYNJ</a>
    <div>Contact<small>contact@fynj.ch</small></div>
    <div>Projet<small>HEIG-VD, Yverdon-les-Bains</small></div>
  </div>
</footer>
 
</body>
</html>
<?php
require __DIR__ . '/config.php';

$dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";

$pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);


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
