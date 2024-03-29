<?php
require_once __DIR__."/connexionDB.php";
if (isset($_POST) && !empty($_POST)) {

    try
    {
        $pdo = connexionDB();
        // rechercher les données de l'utilisateur en fonction du pseudo entré
        $requete = "SELECT * FROM Users WHERE UsePseudo = :pseudo";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $stmt->execute();
        //recupere toutes les données de l'utilisateur
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        //tester si le mot de passe correcspond a l'identifiant
        if (password_verify($_POST['password'], $utilisateur['UsePassword'])) {
            echo "<p>Bonjour ". $utilisateur['UsePseudo']." 👋,</p>";
            echo "<p>tu es connecté !</p>";
        }
        else {
            echo "<p>Pseudo ou mot de passe incorrect, veuillez réesssayer</p>";
        }
    }
    catch(\PDOException $e)
    {
        gerer_exceptions($e);
    }

}
?>