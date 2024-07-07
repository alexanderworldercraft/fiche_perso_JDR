<?php
if (!defined('projet_perso-JDR')) {
    define('projet_perso-JDR', true);
}

require_once "private/php/base_import/key.php";

// Créer une connexion
$conn = new mysqli($servername, $username, $password);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Créer la base de données
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Sélectionner la base de données
$conn->select_db($dbname);

// Charger le fichier SQL
$sql = file_get_contents('JDR.sql');

// Exécuter le fichier SQL
if ($conn->multi_query($sql)) {
    do {
        // Stocker le premier résultat
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
}

// Vérifier les erreurs
if ($conn->error) {
    echo "Erreur : " . $conn->error;
} else {
    echo "Importation réussie.";
}

$conn->close();
?>
