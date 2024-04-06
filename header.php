<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);
session_set_cookie_params([
    'path' => '/',
    'secure' => false,
    'httponly' => false,
    'samesite' => 'lax'
]);
session_start();
}

function classSuivantLeChemin () {
    $pages = [
        'index.php' => 'Accueil',
        'contact.php' => 'Contact',
        'inscription.php' => 'Inscription',
        'connexion.php'=> 'Connexion',
        'profile.php'=> 'Profile'
    ];
    foreach ($pages as $page => $label) {
        $class = ($_SERVER['REQUEST_URI'] == '/cours-christophe/' . $page) ? 'active' : '';
        echo '<li><a href="./' . $page . '" class="' . $class . '">' . $label . '</a></li>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?? ''?>">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title><?=$pageTitre?? ''?></title>
</head>

<body>
    <nav>
        <ul>
            <?php classSuivantLeChemin(); ?>
        </ul>
    </nav>