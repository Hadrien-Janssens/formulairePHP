<?php
require_once __DIR__."/../models/userModel.php";
require_once __DIR__."/../core/gestionFormulaire.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $dataArrayClean = xssSecurity($_POST);
    [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean, $reglesInscription);
    if (empty($erreurs)) {
        try {
            createUser($dataArrayClean['pseudo'],$dataArrayClean['email'],$dataArrayClean['password']);
            header('Location: /cours-christophe/succesInscription.php');
            exit();
        } catch (Exception $e) {
            echo 'utilisateur déjà pris';
        }
    }
}