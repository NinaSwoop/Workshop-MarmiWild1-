<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = array_map('trim', $_POST);
    $errors = [];

    if(!isset($recipe['title']) || empty($recipe['title'])) 
    $errors[] = "Le titre est obligatoire";

    if(!isset($recipe['description']) || empty($recipe['description']) || strlen($recipe['description']) > 255) 
    $errors[] = "Le contenu est obligatoire et ne doit pas dépasser 255 caractères";

    if(count($errors) === 0) {
        saveRecipe($recipe);
        header('Location: /');
        die();
    }
}

require __DIR__ . '/src/views/form.php';