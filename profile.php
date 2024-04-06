<?php
$metaDescription = "profile";
$pageTitre = "profile";
require_once __DIR__."/header.php";
require_once __DIR__."/controllers/profileController.php";
?>

<h1>Profile</h1>
<p>nom : <?= $utilisateur['UsePseudo']??'...'?> </p>
<p>email : <?=$utilisateur['UseEmail'] ?? '...'?></p>





<form class="btn" action="" method="POST">
    <input type="submit" value='Déconnecter'>
</form>

<?php require_once __DIR__."/footer.php";