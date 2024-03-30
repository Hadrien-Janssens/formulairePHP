<?php
require_once __DIR__."/function/utils.php";
require_once __DIR__."/database/createUser.php";
require_once __DIR__."/database/connexionUser.php";


$reglesInscription = [
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
$reglesContact = [
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
$reglesConnection = [
    "pseudo" => [
      "require" => true,
      "max" => 255,
      "min" => 2,
      "unique"=> true
    ],
    "password" => [
        "require" => true,
        "max" => 72,
        "min" => 8
    ]
    ];
    

function traitementFormulaire($dataArray,$regles) {
        [$erreurs, $dataArray ] = traitement($regles,$dataArray);
        return [$erreurs, $dataArray];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

  $formName = $_POST["formName"] ?? null;
  switch ($formName) {
    case 'formContact':
        $dataArrayClean = xssSecurity($_POST);
       [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean,$reglesContact);
        break;
    case 'formInscription':
        $dataArrayClean = xssSecurity($_POST);
        [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean, $reglesInscription);
        if (empty($erreurs)) {
            try {
                createUser($dataArrayClean['pseudo'],$dataArrayClean['email'],$dataArrayClean['password']);
                header('Location: /cours-christophe/succesInscription.php');
                exit();
            } catch (Exception $e) {
                echo 'utilisateur déjà pris';
            }
        }
        break;
    case 'formConnection':
        $dataArrayClean = xssSecurity($_POST);
        [$erreurs , $dataArrayClean] = traitementFormulaire($dataArrayClean,$reglesConnection);
        print_r($erreurs);
        if (empty($erreurs)) {
          connectionUser($dataArrayClean['pseudo'], $dataArrayClean['password']);
        }
        break;
    case 'null':
        echo "impossible de traiter ce formulaire car le nom du formulaire est introuvable";
        break;
    default:
        echo "impossible de traiter ce formulaire car le nom du formulaire ne correspond pas";
        break;
  }
}