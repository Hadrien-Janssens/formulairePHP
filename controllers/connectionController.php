<?php
require_once __DIR__."/../models/userModel.php";
require_once __DIR__."/../core/gestionFormulaire.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    $dataArrayClean = xssSecurity($_POST);
    [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean,$reglesConnection);
    if (empty($erreurs)) {
    connectionUser($dataArrayClean['pseudo'], $dataArrayClean['password']);
    }
}