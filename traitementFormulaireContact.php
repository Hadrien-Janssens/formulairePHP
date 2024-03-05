<?php
function traitementFormulaireContact($dataArray) {
    $erreurs = [];
    $dataArray = xssSecurity($dataArray);
    if (!checkIfGoodData($dataArray)) {
        $erreurs['name']="champs requis !";
        $erreurs['name']="champs requis !";
    }
    else {
        if (!checkNumberCharactere($dataArray["name"],2,255)) {
            $erreurs["name"]="nombre de caractere incorrect !";
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
function checkIfGoodData(array $dataArray):bool {
    $require = [
        "name",
        "email",
        "message"
    ]  ;
    foreach ($dataArray as $key => $value) {
        if (in_array($key,$require) ) {
           if ((!isset($dataArray[$key]) || empty($dataArray[$key]))) {
               return false;
          }
        }
    }
 return true;
}
function checkNumberCharactere (string $string, int $min , int $max):bool{
    if (strlen($string) >= $min && strlen($string) <= $max) {
        return true;
    }
    return false; 
}