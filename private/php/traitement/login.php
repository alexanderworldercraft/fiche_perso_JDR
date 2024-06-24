<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collecte des informations du formulaire    

    // Vérification des données
    if(!isset($_POST['user']) || empty($_POST['user'])) {
        echo "Erreur de user";
        exit();
    } else {
        echo "user ok<br>";
    }

    if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo "Erreur de password";
        exit();
    } else {
        echo "password ok<br>";
    }
    
    // Echappement des données
    $user = htmlspecialchars($_POST['user']);
    $mot_de_passe = htmlspecialchars($_POST['password']);

    // Empêcher l'accès direct
    if (!defined('projet_perso-JDR')) {
        define('projet_perso-JDR', true);
    }

    // Clé de connexion
    require "./private/php/base_import/key.php";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    
    // Préparer une requête SQL pour sélectionner l'utilisateur
    $stmt = $conn->prepare("SELECT u.UtilisateurID, u.Nom, u.MotDePasse, g.Titre, u.GradeID, u.EtatID
    FROM Utilisateur u
    JOIN Grade g ON u.GradeID = g.GradeID
    WHERE Nom = ?");

    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($mot_de_passe, $row['MotDePasse'])) {
            // Connexion réussie
            if ($row['EtatID'] == 1) {
                session_start();
                $_SESSION['userID'] = $row['UtilisateurID']; // Récupération de l'ID de l'utilisateur
                $_SESSION['userNom'] = $row['Nom']; // Récupération du nom de l'utilisateur
                $_SESSION['userGrade'] = $row['Titre']; // Récupération du grade
                $_SESSION['userGradeID'] = $row['GradeID']; // Récupération du grade
                $_SESSION['logged_in'] = true;
                $message = "Connexion avec le compte " . $row['Nom'] . " réussi.";
                header("Location: /fiche_perso_JDR/?message=" . urlencode($message));
                exit();
            } else {
                // Échec de la connexion (compte dans la corbeille)
                $message = "Compte dans la corbeille, merci de contacter le SuperAdministrateur.";
                sleep(3);
                header("Location: /fiche_perso_JDR/?getNav=login&message=" . urlencode($message));
            }
            
        } else {
            // Échec de la connexion (mot de passe)
            $message = "Mot de passe incorrecte";
            sleep(3);
            header("Location: /fiche_perso_JDR/?getNav=login&message=" . urlencode($message));
        }
    } else {
        // Utilisateur non trouvé
        $message = "Utilisateur non trouvé.";
        sleep(3);
        header("Location: /fiche_perso_JDR/?getNav=login&message=" . urlencode($message));
    }

    $stmt->close(); // Fermer l'objet statement
    $conn->close(); // Fermer la connexion à la base de données

}