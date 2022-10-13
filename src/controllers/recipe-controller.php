<?php
require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}

function addRecipe(): void 
{
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
    
    require __DIR__ . '/../views/form.php';
}

function showRecipe(): void 
{
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
if (false === $id || null === $id) {
    header("Location: /");
    exit("Wrong input parameter");
}

// Fetching a recipe from database -  assuming the database is okay
$recipe = getRecipeById($id);

// Database result check
if (!isset($recipe['title']) || !isset($recipe['description'])) {
    header("Location: /");
    exit("Recipe not found");
}

require __DIR__.'/../views/show.php';
}
