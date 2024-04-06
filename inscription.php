<?php
$metaDescription = "ici vous trouverez la page d'inscription de mon site";
$pageTitre = "inscription";
require_once "./header.php";
require_once "./controllers/inscriptionController.php";
?>
<div class="container">
    <form action="" method="POST">
        <h1>Inscription</h1>
        <input type="hidden" name="formName" value="formInscription">
        <label for="pseudo">Pseudo</label>
        <input type="text" id="pseudo" name="pseudo" required minlength="2" maxlength="255"
            value=<?php if (isset($_POST['pseudo']) && !empty($erreurs)) echo $_POST['pseudo'] ; ?>>
        <div id="name-erreur" class="erreur">
            <?=   $erreurs['pseudo'] ?? '' ?>
        </div>
        <label for="email">Email</label>
        <input id="email" name="email"
            value=<?php if (isset($_POST['email']) && !empty($erreurs)) echo $_POST['email'] ; ?>>
        <div id="name-erreur" class="erreur">
            <?=   $erreurs['email'] ?? '' ?>
        </div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required minlength="8" maxlength="72"
            value=<?php if (isset($_POST['password']) && !empty($erreurs)) echo $_POST['password'] ; ?>>
        <div id="name-erreur" class="erreur">
            <?=   $erreurs['password'] ?? '' ?>
        </div>
        <label for="confirmation">Confirmation</label>
        <input type="password" id="confirmation" name="confirmation" required minlength="8" maxlength="72"
            value=<?php if (isset($_POST['confirmation']) && !empty($erreurs)) echo $_POST['confirmation'] ; ?>>
        <div id="name-erreur" class="erreur">
            <?=   $erreurs['confirmation'] ?? '' ?>
        </div>
        <input type="submit" value="s'inscrire">
    </form>
</div>