<?php

function xssSecurity($array) {
    foreach ($array as $key => $value) {
        $newValue = htmlentities($array[$key]);
        $array[$key]=$newValue;
    }
    return $array;
}

function traitement(array $regles, array $dataArray , ?array $erreurs=[]):array {
  
    foreach ($regles as $key => $value) {

            //verification required
            if( $regles[$key]['require'] && empty($dataArray[$key]) ) {
                $erreurs[$key]="champs requis !";
            }
            //verification max/min de caracteres
           elseif (isset($regles[$key]['max']) && isset($regles[$key]['min']) ) {
            if ( $regles[$key]['max'] < strlen($dataArray[$key]) || $regles[$key]['min'] > strlen($dataArray[$key])) {
                if (!empty($dataArray[$key])) {
                    $erreurs[$key]="Ce champs doit contenir entre ". $regles[$key]['min'] ." et ". $regles[$key]['max'] ." caractères";
                }
            }
           }
           //verification email valide
           elseif ($key == 'email') {
               if (filter_var($dataArray['email'], FILTER_VALIDATE_EMAIL)) {
                   $erreurs['email']="Veuillez entrer une adresse mail valide";
                }
            }
            //verification de la confimation du mot de passe
            if ($key == 'confirmation') {
                if ($dataArray['confirmation'] != $dataArray['password']) {
                    $erreurs[$key]="Ce champs doit être identique au champs mot de passe";
                }
            }
        }
    return [$erreurs, $dataArray];
}