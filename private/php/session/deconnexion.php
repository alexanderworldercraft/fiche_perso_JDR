<?php

session_start();
session_unset(); // Supprimer les variables de session
session_destroy(); // Détruire la session
$message = "Déconnexion réussi.";
header('Location: /fiche_perso_JDR/?message=' . urlencode($message)); // Redirection vers la page de connexion

?>