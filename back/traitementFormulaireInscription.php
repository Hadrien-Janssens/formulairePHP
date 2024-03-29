<?php
require_once __DIR__."/function/utils.php";

function traitementFormulaireInscription($dataArray, $regles) {

    $dataArray = xssSecurity($dataArray);
    $erreurs = traitement($regles,$dataArray);
    return $erreurs;
}