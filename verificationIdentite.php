<?php
$metaDescription = "verification d'identité";
$pageTitre = "verification d'identité";
require_once __DIR__."/header.php";
require_once __DIR__."/controllers/verificationIdentiteController.php";
?>
<h1>verification d'identité</h1>

<form action="" method="POST">
    <label for="verification_code">Code</label>
    <input type="hidden" name="formVerificationIdentitie">
    <input type="text" name="verification_code" require maxlength="5" minlength="5" id="verification_code">
    <input type="submit" value="Vérifier">
</form>
<p>ou</p>
<form class="btn" action="" method="POST">
    <input type="submit" value="Envoyer un nouveau code de verification">
</form>