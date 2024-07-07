<?php

$getNav = htmlspecialchars($_GET['getNav']);

switch ($getNav) {
    case 'baldurGate3':
        session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // L'utilisateur n'est pas connecté ou la session n'est pas valide
        $message = "Tu n'est pas connecter, si tu souhaite poursuivre ? connecte toi à ton compte.";
        header('Location: /fiche_perso_JDR/?getNav=login&message=' . urlencode($message));
    exit();
}
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
        $message = "temps écoulé, rediriger vers l'accueil";
        header('Location: /fiche_perso_JDR/?getNav=login&message=' . urlencode($message));
        exit();
    }
}
// Mise à jour du timestamp de la dernière activité
$_SESSION['last_activity'] = time();
        break;
    
    default:
        break;
}
// contenu sécurisé
?>