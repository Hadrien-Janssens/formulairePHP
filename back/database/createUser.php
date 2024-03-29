<?php 
require_once __DIR__.'/connexionDB.php';
function createUser($pseudo,$email, $password ) {
 
    $motDePasseHashed = password_hash($password,PASSWORD_BCRYPT );

    try
    {
        // Instancier la connexion à la base de données.
        $pdo = connexionDB();

        // Préparer la requête SQL :
        $requete = "INSERT INTO Users (UsePseudo, UseEmail, UsePassword) VALUES (:pseudo, :email, :password)";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $motDePasseHashed);

        // Exécuter la requête.
        $stmt->execute();
    }
    catch(\PDOException $e)
    {
        gerer_exceptions($e);
    }
}