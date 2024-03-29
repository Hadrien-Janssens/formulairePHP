<?php
require_once 'traitementFormulaireContact.php';
require_once 'traitementFormulaireInscription.php';
require_once __DIR__."/models/user_model.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {

  $formName = $_POST["formName"] ?? null;
  switch ($formName) {
    case 'formContact':
        traitementFormulaireContact($_POST);
        break;
    case 'formInscription':
        traitementFormulaireInscription($_POST,$regles);
        break;
    case 'null':
        echo "impossible de traiter ce formulaire car le nom du formulaire est introuvable";
        break;
    default:
        echo "impossible de traiter ce formulaire car le nom du formulaire ne correspond pas";
        break;
  }
}