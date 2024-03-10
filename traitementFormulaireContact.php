<?php
function traitementFormulaireContact($dataArray) {
    $erreurs = [];
    $regles = [
        "name" => [
          "require" => true,
          "max" => 255,
          "min" => 2
        ],
        "firstname" => [
          "require" => false,
          "max" => 255,
          "min" => 2
        ],
        "email" => [
            "require" => true,
            "max" => 255,
            "min" => 2
        ],
        "message" => [
            "require" => true,
            "max" => 3000,
            "min" => 2
          ]
        ];
    $dataArray = xssSecurity($dataArray);
    foreach ($dataArray as $key => $value) {
        
        if (isset($regles[$key])  ) {

            if( $regles[$key]['require'] && empty($dataArray[$key]) ) {
                $erreurs[$key]="champs requis !";
            }
            elseif ( $regles[$key]['max'] < strlen($dataArray[$key]) || $regles[$key]['min'] > strlen($dataArray[$key])) {
                if (!empty($dataArray[$key])) {
                    $erreurs[$key]="Ce champs doit contenir entre ". $regles[$key]['min'] ." et ". $regles[$key]['max'] ." caractères";
                }
            }
            elseif (!filter_var($dataArray['email'], FILTER_VALIDATE_EMAIL)) {
                if (!isset($erreurs['email'])) {
                    $erreurs['email']="Veuillez entrer une adresse mail valide";
                }
            }
        }
    }
    return $erreurs;
}

function xssSecurity($array) {
    foreach ($array as $key => $value) {
        $newValue = htmlentities($array[$key]);
        $array[$key]=$newValue;
    }
    return $array;
}