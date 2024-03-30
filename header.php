<?php
define('BASE_URL', "/cours-christophe");

// echo '<pre>' . print_r($_SERVER, true) . '</pre>';

function classSuivantLeChemin()
{
    $pages = [
        BASE_URL . '/index.php' => 'Accueil',
        BASE_URL . '/contact.php' => 'Contact',
        BASE_URL . '/inscription.php' => 'Inscription',
        BASE_URL . '/connexion.php' => 'Connexion'
    ];
    foreach ($pages as $page => $label) {
        $class = ($_SERVER['REQUEST_URI'] == $page) ? 'active' : '';
        echo '<li><a href="' . $page . '" class="' . $class . '">' . $label . '</a></li>';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title><?=$pageTitre?></title>
</head>

<body>
    <nav>
        <ul>
            <?php classSuivantLeChemin(); ?>
        </ul>
    </nav>