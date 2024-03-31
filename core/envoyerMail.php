<?php

function envoyerMail($nom, $email, $message) {
$destinataire = "moi-meme@exemple.com";
$sujet = "Prise de contact";
// Configuration simple de l'entête.
$entete = [
    "From" =>  "$nom <$email>",
    "MIME-Version" => "1.0",
    "Content-Type" => "text/html; charset=\"UTF-8\"",
    "Content-Transfer-Encoding" => "quoted-printable"
];
// Tentative d'envoi du mail :
if (mail($destinataire, $sujet, $message, $entete)){
    echo "Le courriel a été envoyé avec succès.";
}
else{
    echo "L'envoi du courriel a échoué.";
}

}