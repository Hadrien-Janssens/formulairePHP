<?php
    require_once __DIR__.'/../core/connexionDB.php';

$reglesInscription = [
    "pseudo" => [
      "require" => true,
      "max" => 255,
      "min" => 2,
      "unique"=> true
    ],
    "email" => [
        "require" => true,
        "max" => 255,
        "min" => 2,
        "unique" => true
    ],
    "password" => [
        "require" => true,
        "max" => 72,
        "min" => 8
    ],
    "confirmation" => [
      "require" => true,
      "max" => 72,
      "min" => 8
    ]
    ];

    $reglesConnection = [
        "pseudo" => [
          "require" => true,
          "max" => 255,
          "min" => 2,
          "unique"=> true
        ],
        "password" => [
            "require" => true,
            "max" => 72,
            "min" => 8
        ]
        ];

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
        throw new Exception($e);
    }
}

function connectionUser($pseudo, $password) {
    try
    {
        $pdo = connexionDB();
        // rechercher les données de l'utilisateur en fonction du pseudo entré
        $requete = "SELECT * FROM Users WHERE UsePseudo = :pseudo";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->execute();
        //recupere toutes les données de l'utilisateur
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        //tester si le mot de passe correcspond a l'identifiant
        if (!empty($utilisateur) && password_verify($password, $utilisateur['UsePassword'])) {
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