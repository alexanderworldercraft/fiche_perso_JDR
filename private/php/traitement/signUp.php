<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collecte des informations du formulaire    

    // Vérification des données
    if(!isset($_POST['username']) || empty($_POST['username'])) {
        echo "Erreur de username";
        exit();
    }
    
    if(!isset($_POST['password']) || empty($_POST['password'])) {
        echo "Erreur de password";
        exit();
    }
    
    if(!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
        echo "Erreur de confirmpassword";
        exit();
    }

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Vérification des données (vous pouvez ajouter vos propres validations)
    if ($password !== $confirmPassword) {
        $message = "Les mots de passe ne correspondent pas.";
        header("Location: /fiche_perso_JDR/signUp.php?message=" . urlencode($message));
        exit;
    }
    
    // Echappement des données
    $nom_utilisateur = htmlspecialchars($_POST['username']);
    $mot_de_passe_hache = password_hash($_POST['password'], PASSWORD_DEFAULT); 

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

    // Vérifier si le email existe déjà
    $stmt = $conn->prepare("SELECT Nom FROM Utilisateur WHERE Nom = ?");
    $stmt->bind_param("s", $nom_utilisateur);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nom d'utilisateur déjà pris
        $message = "Le nom d'utilisateur est déjà pris.";
        header("Location: /fiche_perso_JDR/signUp.php?message=" . urlencode($message));
        exit;
    }

    // ID de grade par défaut 3 pour 'invité'
    $id_grade_par_defaut = 3;
    // ID de etat par défaut 1 pour 'actif'
    $id_etat_par_defaut = 1;

    // Insertion dans la base de données avec le grade par défaut
    $stmt = $conn->prepare("INSERT INTO Utilisateur (Nom, MotDePasse, GradeID, EtatID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $nom_utilisateur, $mot_de_passe_hache, $id_grade_par_defaut, $id_etat_par_defaut);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Redirection vers la page d'origine après l'inscription réussie
        $message = "Inscription réussie !";
        header("Location: /fiche_perso_JDR/login.php?message=" . urlencode($message));
        exit;
    } else {
        // Gérer l'erreur d'inscription ici
        $message = "Erreur lors de l'incription" . $stmt->error;
        header("Location: /fiche_perso_JDR/signUp.php?message=" . urlencode($message));
        exit;
    }

    $stmt->close(); // Fermer l'objet statement
    $conn->close(); // Fermer la connexion à la base de données
}