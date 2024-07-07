<!-- script Popper2 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<!-- style Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bibliothèque googleicon -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
<!-- Bibliothèque icon réseaux sociaux -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<!-- Inclure le fichier CSS via le script PHP -->
<link rel="stylesheet" href="serve_file.php?file=css/menu01-sidebar.css">
<link rel="stylesheet" href="serve_file.php?file=css/menu02-sidebar.css">
<link rel="stylesheet" href="serve_file.php?file=css/cardteam.css">
<link rel="stylesheet" href="serve_file.php?file=css/style.css">
<!-- Icon dans l'onglet -->
<link rel="shortcut icon" href="serve_file.php?file=img/logo.png">
<!-- Google font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<!-- Highlight style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/github-dark.min.css" />
<!-- Highlight script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js"></script>
<!-- Exercution du code Highlight script -->
<script>
hljs.highlightAll();
</script>

<!-- Bibliothèque pour les select (recherche d'options) (select2) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Style pour le btn theme -->
<style type="text/css">
	.bi {
	    vertical-align: -.125em;
	    fill: currentColor;
	}
	
	.btn-bd-primary {
	    --bs-btn-hover-border-color: currentColor;
	    --bs-btn-active-border-color: currentColor;
        backdrop-filter: blur(4px);
	}
	
	.bd-mode-toggle {
	    z-index: 1500;
	}

    /* Pour la "poignée" de la barre de défilement verticale */
    ::-webkit-scrollbar-thumb {
        border: 1px solid currentColor;
        background-color: transparent;
        border-radius: 5px;
    }

    /* Pour la barre de défilement verticale elle-même */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Pour la "poignée" de la barre de défilement horizontale */
    ::-webkit-scrollbar-thumb:horizontal {
        border: 1px solid currentColor;
        background-color: transparent;
        border-radius: 5px;
    }

    /* Pour la barre de défilement horizontale elle-même */
    ::-webkit-scrollbar:horizontal {
        width: 10px;
    }
</style>

<?php
session_start();
?>