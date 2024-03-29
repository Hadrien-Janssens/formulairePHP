<?php
require_once __DIR__."/function/utils.php";
function traitementFormulaireInscription($dataArray) {
    $regles = [
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
    $dataArray = xssSecurity($dataArray);
    $erreurs = traitement($regles,$dataArray);
    return $erreurs;
}