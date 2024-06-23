<?php
// serve_file.php

// Nom du fichier à servir
$file = isset($_GET['file']) ? $_GET['file'] : null;

if ($file) {
    // Chemin complet vers le fichier
    $filePath = __DIR__ . '/private/' . $file;

    // Vérifier si le fichier existe
    if (file_exists($filePath)) {
        // Déterminer le type de contenu du fichier
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'css':
                $mimeType = 'text/css';
                break;
            case 'js':
                $mimeType = 'application/javascript';
                break;
            case 'jpg':
            case 'jpeg':
                $mimeType = 'image/jpeg';
                break;
            case 'png':
                $mimeType = 'image/png';
                break;
            case 'gif':
                $mimeType = 'image/gif';
                break;
            default:
                $mimeType = 'application/octet-stream';
        }

        // Définir les en-têtes appropriés
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($filePath));

        // Lire et envoyer le fichier
        readfile($filePath);
        exit;
    } else {
        // Si le fichier n'existe pas, renvoyer une erreur 404
        http_response_code(404);
        echo "File not found.";
        exit;
    }
} else {
    // Si aucun fichier n'est spécifié, renvoyer une erreur 400
    http_response_code(400);
    echo "No file specified.";
    exit;
}
?>