<?php 
require "./traitementFormulaire.php";
$metaDescription = "voici la super description de la page Contact";
$pageTitre = "contact";
require_once "./header.php";
$erreurs = traitementFormulaireContact($_POST);
?>

<div class="container">
    <h1>Contactez-moi</h1>


    <form action="" method="POST">
        <input type="hidden" name="formName" value="formContact">
        <label for="name">Nom</label>
        <input type="text" maxlength="255" name="name" id="name">
        <?=   $erreurs['name'] ?? 'euh..' ?>
        <label for="firstname">Prénom</label>
        <input type="text" name='firstname' maxlength="255" minlength="2" id="firstname">
        <?=   $erreurs['firstname'] ?? 'euh..hein' ?>
        <label for="mail">Mail</label>
        <input type="email" name='email' required id="mail">
        <label for="message">Message</label>
        <input type='text' required maxlength="3000" minlength="10" name="message">
        <input type="submit" value="Envoyer">
    </form>
</div>