<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'FYNJ – Find Your Numeric Job') ?></title>
    <meta name="description" content="<?= htmlspecialchars($description ?? "FYNJ - Explore les métiers du numérique après le Bachelor Ingénierie des médias") ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Outfit:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="./css/commun.css">
    <?php if (!empty($css)) { ?>
        <link rel="stylesheet" href="./css/<?= htmlspecialchars($css) ?>.css">
    <?php } ?>
</head>
