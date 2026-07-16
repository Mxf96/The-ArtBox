<?php

session_start();

require 'managers/oeuvres-manager.php';
require 'managers/security-manager.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Nettoyage des données reçues 
    $titre = sanitize_input($_POST['titre']);
    $artiste = sanitize_input($_POST['artiste']);
    $image = sanitize_input($_POST['image']);
    $description = sanitize_input($_POST['description']);

    // Tableau des erreurs
    $errors = [];


    // Vérification du titre
    if (empty($titre)) {
        $errors['titre'] = "Le titre est obligatoire.";
    }


    // Vérification de l'artiste
    if (empty($artiste)) {
        $errors['artiste'] = "L'artiste est obligatoire.";
    }


    // Vérification de la description
    if (strlen($description) < 3) {
        $errors['description'] = "La description doit contenir au moins 3 caractères.";
    }


    // Vérification de l'image
    if (
        !filter_var($image, FILTER_VALIDATE_URL)
        || !str_starts_with($image, 'https://')
    ) {
        $errors['image'] = "Le lien de l'image doit être une URL HTTPS valide.";
    } else {

        $headers = @get_headers($image, true);

        if (!$headers || !isset($headers['Content-Type'])) {
            $errors['image'] = "Le lien de l'image est inaccessible.";
        } elseif (!str_starts_with($headers['Content-Type'], 'image/')) {
            $errors['image'] = "Le lien doit correspondre à une image.";
        }
    }

    // S'il y a des erreurs, on retourne au formulaire
    if (!empty($errors)) {

        $_SESSION['errors'] = $errors;

        $_SESSION['old_data'] = [
            'titre' => $titre,
            'artiste' => $artiste,
            'image' => $image,
            'description' => $description
        ];

        header('Location: ajouter.php');
        exit;
    }


    // Si tout est valide, insertion en BDD
    addOeuvre(
        $titre,
        $artiste,
        $image,
        $description
    );

    header('Location: index.php');
    exit;
}