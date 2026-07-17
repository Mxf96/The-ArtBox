<?php

session_start();

$errors = $_SESSION['errors'] ?? [];
$old_data = $_SESSION['old_data'] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['old_data']);

require 'includes/header.php';
require 'managers/security-manager.php';
?>

<form action="traitement.php" method="POST">
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
        <input
            type="text"
            name="titre"
            id="titre"
            value="<?= escape($old_data['titre'] ?? '') ?>">

        <?php if (isset($errors['titre'])): ?>
            <p class="error">
                <?= escape($errors['titre']) ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input
            type="text"
            name="artiste"
            id="artiste"
            value="<?= escape($old_data['artiste'] ?? '') ?>">

        <?php if (isset($errors['artiste'])): ?>
            <p class="error">
                <?= escape($errors['artiste']) ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input
            type="url"
            name="image"
            id="image"
            value="<?= escape($old_data['image'] ?? '') ?>">

        <?php if (isset($errors['image'])): ?>
            <p class="error">
                <?= escape($errors['image']) ?>
            </p>
        <?php endif; ?>
    </div>
    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea
            name="description"
            id="description"><?= escape($old_data['description'] ?? '') ?></textarea>

        <?php if (isset($errors['description'])): ?>
            <p class="error">
                <?= escape($errors['description']) ?>
            </p>
        <?php endif; ?>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php require 'includes/footer.php'; ?>