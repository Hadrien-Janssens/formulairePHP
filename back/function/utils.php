<?php
require_once __DIR__.'/../database/connexionDB.php';

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
            //verification champs unique
            // if (isset($regles[$key]['unique']) && $regles[$key]['unique']===true )  {
            //     try
            //     {
                
            //         $pdo = connexionDB();
            //         $requete = "SELECT UseId FROM Users WHERE "."Use".ucfirst($key)." = :markup" ;
            //         $stmt = $pdo->prepare($requete);
            //         $stmt->bindParam(':markup', $dataArray[$key], PDO::PARAM_STR);
            //         $stmt->execute();
            //         $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
            //         if (isset($utilisateur['UseId'])&& $utilisateur['UseId'] ) {
            //             $erreurs[$key] = "ce $key est déjà pris";
            //         }
            //     }
            //     catch(\PDOException $e)
            //     {
            //         gerer_exceptions($e);
            //     }
            // }
        }
        // cas de modification de l'attribut name, renvoie une erreur générale du formulaire 
        elseif(!empty($dataArray)) {
            $erreurs['form'] = false ; 
        }
    }
    return [$erreurs, $dataArray];
}