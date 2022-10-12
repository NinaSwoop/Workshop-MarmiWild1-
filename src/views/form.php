<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une recette</title>
</head>
<body>

<!-- Pour afficher les erreurs -->
<?php 
if(count($errors) > 0) {
    echo '<ul>';
    foreach($errors as $error) {
echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>

    <main> 
        <!-- action permet de dire où seront envoyées les informations -->
        <form action ="" method ="post" enctype="application/x-www-form-urlencoded" class="errormessages">
        <fieldset>
        <legend>Ajouter votre recette</legend>

<p>
<label for="title">Title :</label>
<input type="text" id="title" name="title" placeholder="Your title here, 255 caracters max">
</p>

<p>
<label for="description">Content :</label>
<textarea name="description" id="description" cols="30" rows="10"></textarea>
</p>

<button type="submit">Soumettre votre recette</button>

</fieldset>
</form>
</main>
</body>
</html>