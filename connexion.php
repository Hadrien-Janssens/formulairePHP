<?php
$metaDescription = "ici vous trouverez la page d'connexion de mon site";
$pageTitre = "connexion";
require_once "./header.php";
require_once __DIR__."/controllers/connectionController.php";
?>

<div class="container">
    <form action="" method="POST">
        <h1>Connexion</h1>
        <input type="hidden" name="formName" value="formConnection">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required minlength="2" maxlength="255">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="72">
        <input type="submit" value="se connecter">
    </form>
</div>