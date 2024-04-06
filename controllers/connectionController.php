<?php
require_once __DIR__."/../models/userModel.php";
require_once __DIR__."/../core/gestionFormulaire.php";
require_once __DIR__."/../core/gestionAuthentification.php";



if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $dataArrayClean = xssSecurity($_POST);
    $erreurs  = traitement($reglesConnection,$dataArrayClean);
    if (empty($erreurs)) {
        connecterUtilisateur($dataArrayClean['pseudo'],$dataArrayClean['password']);
    }
}
//rediriger l'utilisateur si il essaye de joindre la page inscription alors qu'il est déja connecté
if (isset($_SESSION['utilisateur_id']) &&est_connecte($_SESSION['utilisateur_id'])) {
    header('Location: /cours-christophe/profile.php');
    exit();
}