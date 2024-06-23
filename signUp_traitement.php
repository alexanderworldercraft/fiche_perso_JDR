<?php
// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclure le fichier PHP dans le dossier privé
    require_once 'private/php/traitement/signUp.php';
} else {
    echo "Formulaire non soumis.";
}
?>