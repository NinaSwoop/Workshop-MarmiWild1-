<?php
require_once 'config.php';
require __DIR__.'/src/models/recipe-model.php';

// Fetching all recipes
$recipes = getAllRecipes();



// Generate the web page __DIR__ prend la valeur du dossier où se trouve le fichier. C'est le chemin absolu
require __DIR__.'/src/views/index.php';