<?php

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // L'utilisateur n'est pas connecté ou la session n'est pas valide
    header('Location: ./login.php'); // Redirection vers la page de connexion
    exit();
}
$user_id = $_SESSION['user_id']; // Récupérez l'ID de l'utilisateur depuis la session
// Définir un tableau des grades autorisés

// Durée de timeout en secondes (ex: 300 secondes = 5 minutes)
$timeout_duration = 3600;
$_SESSION['refresh_timeout'] = $timeout_duration + 1;
// Vérifiez si $_SESSION['last_activity'] est défini
if (isset($_SESSION['last_activity'])) {
    // Calculer le temps écoulé depuis la dernière activité
    $elapsed_time = time() - $_SESSION['last_activity'];

    // Si le temps écoulé est supérieur à la durée de timeout
    if ($elapsed_time > $timeout_duration) {
        // Détruire la session et rediriger vers la page de connexion
        session_unset();
        session_destroy();
        header('Location: ./login.php');
        exit();
    }
}
// Mise à jour du timestamp de la dernière activité
$_SESSION['last_activity'] = time();
// contenu sécurisé
?>