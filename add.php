<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';
$errors = [];

// POST = j'ai rempli un formulaire, il faut que je récupère les données
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = array_map('trim', $_POST);

    if(!isset($recipe['title']) || empty($recipe['title'])) 
    $errors[] = "Le titre est obligatoire";

    if (strlen($recipe['title']) > 100)
    $errors[] = "Le titre est trop long";

    if(!isset($recipe['description']) || empty($recipe['description'])) 
    $errors[] = "Le contenu est obligatoire";

    if(count($errors) === 0) {
        saveRecipe($recipe);
        // header = redirection vers la racine du dossier = index.php
        header('Location: /');
        // je mets un dis pour ne pas recharger à nouveau le formulaire
        die();
    }
}

require __DIR__ . '/src/views/form.php';