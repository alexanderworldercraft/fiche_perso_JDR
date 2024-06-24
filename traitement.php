<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $getTraitement = htmlspecialchars($_GET['getTraitement']);

    switch ($getTraitement) {
        case 'login':
            require_once 'private/php/traitement/login.php';
            break;
        case 'signUp':
            require_once 'private/php/traitement/signUp.php';
            break;
        
        default:
            # code...
            break;
    }
} else {
    echo "Formulaire non soumis.";
}
?>