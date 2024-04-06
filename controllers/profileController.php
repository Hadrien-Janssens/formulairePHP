<?php
    require_once __DIR__."/../core/gestionAuthentification.php";
    require_once dirname(__DIR__)."/core/getInfoUser.php";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        deconnecter_utilisateur();
        header('Location: /cours-christophe/connexion.php');
        exit();
    }

    if (est_connecte($_SESSION['utilisateur_id'])) {
        $utilisateur = getInfoUser($_SESSION['utilisateur_id']);
    }
    else {
        header('Location: /cours-christophe/connexion.php');
        exit();
    }