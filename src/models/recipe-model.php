<?php 

function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}


function getAllRecipes(): array
{
    $connection = createConnection();

    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $recipes;
}

function getRecipeById(int $id): array
{
    $connection = createConnection();

    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $recipe = $statement->fetch(PDO::FETCH_ASSOC);

    return $recipe;
}
    // Je mets void quand il n'y a pas de return
function saveRecipe(array $recipe): void
{
    $connection = createConnection();
    // Requête SQL de type INSERT INTO 
    $query = "INSERT INTO recipe (title, description)
    -- Place holder :: 
    VALUES (:title, :description);";
    // Je demande de préparer la petite voiture et de m'attendre avant d'aller dans la BDD
    $statement = $connection->prepare($query);
    // PDO::PARAM_STR permet de faire des tests sur une chaine de caractère
    $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
    // Je demande à envoyer la voiture
    $statement->execute();
}