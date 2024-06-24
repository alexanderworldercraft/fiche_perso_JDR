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
?>
<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <!-- Encodage -->
    <meta charset="UTF-8">
    <!-- Mise en page et mise à l'échelle de la page web -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Description de la page web -->
    <meta name="description" content="">
    <!-- Description lors du partage -->
    <meta property="og:description" content="">
    <!-- Type de contenu lors du partage -->
    <meta property="og:type" content="website">
    <!-- Référent principale de l'url lors du partage -->
    <meta property="og:url" content="">
    <!-- Titre lors du partage -->
    <meta property="og:title" content="index">
    <!-- Titre de l'onglet -->
    <title>index</title>

    <!-- Link et Script du Head -->
    <?php require_once "private/php/base_import/head.php"; ?>
</head>

<body>

    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- Navigation de l'Application -->
        <?php require_once "private/php/base_import/sidebar.php"; ?>
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <main class="content">
                <div class="container">
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm" style="z-index: 9999;">
                        <i class="ri-menu-line ri-xl background-boutton-and-shadow"></i>
                    </a>

                    <!-- Début contenu -->

                    <?php 
                        
                        $getNav = htmlspecialchars($_GET['getNav']);

                        switch ($getNav) {
                            case 'login':
                                require_once 'private/php/centre/login.php';
                                break;
                            case 'signUp':
                                require_once 'private/php/centre/signUp.php';
                                break;
                            case 'baldurGate3':
                                require_once 'private/php/centre/baldurGate3.php';
                                break;
                            
                            default:
                            require_once 'private/php/centre/index.php';
                                break;
                        }

                    ?>

                    <!-- Fin du contenu -->

                </div>
                <!-- Pied de page contenant la version et l'auteur -->
                <footer id="footer" class="footer"><?php require_once "private/php/base_import/footer.php"; ?></footer>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

</body>

</html>