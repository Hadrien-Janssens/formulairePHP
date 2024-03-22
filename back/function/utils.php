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
        // cas de modification de l'attribut name
        // renvoie une erreur générale du formulaire
        elseif(!empty($dataArray)) {
            $erreurs['form'] = false ; 
        }
    }
    return $erreurs;
}