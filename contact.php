<?php 
require "./traitementFormulaire.php";
$metaDescription = "voici la super description de la page Contact";
$pageTitre = "contact";
require_once "./header.php";
$erreurs = traitementFormulaireContact($_POST);
?>

<div class="form-container">
    <!-- le message d'envoie avec succes -->
    <?php 
        if ( (isset($_POST['name'])) && (isset($_POST['email'])) && (isset($_POST['message'])) && isset($erreurs) && empty($erreurs)) {
           echo "<div class='succes'> Données envoyées avec succès </div>";
        }
    ?>
    <div class="layout">
        <div class="left">
            <div>
                <h2>
                    Vous avez une question ? <br />
                    <br />
                    N'hésitez pas !
                </h2>
            </div>
        </div>
        <form action="" method="POST">
            <input type="hidden" name="formName" value="formContact">
            <label for="name">Nom</label>
            <input type="text" maxlength="255" name="name" id="name"
                value=<?php if (isset($_POST['name']) && !empty($erreurs)) echo $_POST['name'] ; ?>>
            <div class="erreur">
                <?=   $erreurs['name'] ?? '' ?>
            </div>
            <label for="firstname">Prénom</label>
            <input type="text" name='firstname' maxlength="255" minlength="2" id="firstname"
                value=<?php if (isset($_POST['firstname']) && !empty($erreurs)) echo $_POST['firstname'] ; ?>>
            <div class="erreur">
                <?=   $erreurs['firstname'] ?? '' ?>
            </div>
            <label for="email">Mail</label>
            <input type="" name='email' id="email"
                value=<?php if (isset($_POST['email']) && !empty($erreurs)) echo $_POST['email'] ; ?>>
            <div class="erreur">
                <?=   $erreurs['email'] ?? '' ?>
            </div>
            <label for="message">Message</label>
            <input type='text' required maxlength="3000" minlength="10" name="message"
                value=<?php if (isset($_POST['message']) && !empty($erreurs)) echo $_POST['message'] ; ?>>
            <div class="erreur">
                <?=   $erreurs['message'] ?? '' ?>
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</div>