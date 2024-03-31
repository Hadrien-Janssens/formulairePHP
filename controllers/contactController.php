<?php
require_once __DIR__."/../models/contactModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

    $dataArrayClean = xssSecurity($_POST);
    [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean,$reglesContact);
}