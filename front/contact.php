<?php 
require "../back/traitementFormulaire.php";
require "../back/function/envoyerMail.php";
$metaDescription = "voici la super description de la page Contact";
$pageTitre = "contact";
require_once "./header.php";
$erreurs = traitementFormulaireContact($_POST);
?>

<div class="form-container">
    <!-- le message d'envoie avec succes et envoie de mail-->
    <?php 
        if (isset($erreurs['form']) && !$erreurs['form']) {
            echo "<div class='erreur-champ'>Le formulaire n'a pas été envoyé, une erreur est survenue !</div>";
        }
        elseif (empty($erreurs) && !empty($_POST)) {
            echo "<div class='succes'> Données envoyées avec succès </div>";
            envoyerMail($_POST['nom'],$_POST['email'], $_POST['message']);
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
            <input type="text" maxlength="255" name="name" id="name" aria-describedby="name-erreur" aria-invalid="true"
                value=<?php if (isset($_POST['name']) && !empty($erreurs)) echo $_POST['name'] ; ?>>
            <div id="name-erreur" class="erreur">
                <?=   $erreurs['name'] ?? '' ?>
            </div>
            <label for="firstname">Prénom</label>
            <input type="text" name='firstname' maxlength="255" minlength="2" id="firstname"
                aria-describedby="firstname-erreur" aria-invalid="true"
                value=<?php if (isset($_POST['firstname']) && !empty($erreurs)) echo $_POST['firstname'] ; ?>>
            <div id="firstname-erreur" class="erreur">
                <?=   $erreurs['firstname'] ?? '' ?>
            </div>
            <label for="email">Mail</label>
            <input type="" name='email' id="email" aria-describedby="email-erreur" aria-invalid="true"
                value=<?php if (isset($_POST['email']) && !empty($erreurs)) echo $_POST['email'] ; ?>>
            <div id="email-erreur" class="erreur">
                <?=   $erreurs['email'] ?? '' ?>
            </div>
            <label for="message">Message</label>
            <input type='text' required maxlength="3000" minlength="10" name="message" aria-describedby="message-erreur"
                aria-invalid="true"
                value=<?php if (isset($_POST['message']) && !empty($erreurs)) echo $_POST['message'] ; ?>>
            <div id="message-erreur" class="erreur">
                <?=   $erreurs['message'] ?? '' ?>
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</div>