<?php
require 'includes/header.php';
require 'managers/oeuvres-manager.php';
require 'managers/security-manager.php';

// Si l'URL ne contient pas d'id, on redirige sur la page d'accueil
if (empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

// Récupération de l'œuvre depuis la base de données
$oeuvre = getOeuvreById($_GET['id']);

// Si aucune oeuvre trouvé, on redirige vers la page d'accueil
if (!$oeuvre) {
    header('Location: index.php');
    exit;
}

?>

<article id="detail-oeuvre">

    <div id="img-oeuvre">
        <img src="<?= sanitize_input($oeuvre['image']) ?>"
            alt="<?= sanitize_input($oeuvre['titre']) ?>">
    </div>

    <div id="contenu-oeuvre">
        <h1><?= sanitize_input($oeuvre['titre']) ?></h1>
        <p class="description">
            <?= sanitize_input($oeuvre['artiste']) ?>
        </p>
        <p class="description-complete">
            <?= sanitize_input($oeuvre['description']) ?>
        </p>
    </div>
</article>

<?php require 'includes/footer.php'; ?>