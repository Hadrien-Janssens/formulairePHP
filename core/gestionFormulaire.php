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
            
        if (isset($dataArray[$key])  ) {
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
            elseif (!filter_var($dataArray['email'], FILTER_VALIDATE_EMAIL)) {
                if (!isset($erreurs['email'])) {
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
        // cas de modification de l'attribut name, renvoie une erreur générale du formulaire 
        elseif(!empty($dataArray)) {
            $erreurs['form'] = false ; 
        }
    }
    return [$erreurs, $dataArray];
}

function traitementFormulaire($dataArray,$regles) {
    [$erreurs, $dataArray ] = traitement($regles,$dataArray);
    return [$erreurs, $dataArray];
}