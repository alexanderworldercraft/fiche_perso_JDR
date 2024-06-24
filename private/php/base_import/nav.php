<?php

// Empêcher l'accès direct
if (!defined('projet_perso-JDR')) {
    define('projet_perso-JDR', true);
}

require_once "key.php";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les thèmes
$sql_themes = "SELECT ThemeID, Name FROM Theme";
$stmt_themes = $conn->prepare($sql_themes);
$stmt_themes->execute();
$result_themes = $stmt_themes->get_result();

echo '<nav id="nav" class="menu open-current-submenu"><ul>';

while ($theme = $result_themes->fetch_assoc()) {
    echo '<li class="menu-header"><span>' . $theme['Name'] . '</span></li>';

    // Récupérer les sections pour ce thème
    $sql_sections = "SELECT SectionID, Name, Icon FROM Section WHERE ThemeID = ?";
    $stmt_sections = $conn->prepare($sql_sections);
    $stmt_sections->bind_param("i", $theme['ThemeID']);
    $stmt_sections->execute();
    $result_sections = $stmt_sections->get_result();

    while ($section = $result_sections->fetch_assoc()) {
        echo '<li class="menu-item sub-menu">';
        echo '<a href="#"><span class="menu-icon"><span class="material-symbols-outlined align-middle">' . $section['Icon'] . '</span></span><span class="menu-title align-middle">' . $section['Name'] . '</span><span class="menu-suffix align-middle"><span class="badge rounded-1 p-1 one">New</span></span></a>';

        // Récupérer les contenus pour cette section
        $sql_contents = "SELECT Title, Description, ContentID FROM Content WHERE SectionID = ?";
        $stmt_contents = $conn->prepare($sql_contents);
        $stmt_contents->bind_param("i", $section['SectionID']);
        $stmt_contents->execute();
        $result_contents = $stmt_contents->get_result();

        echo '<div class="sub-menu-list" style="visibility: hidden;">';
        echo '<ul>';

        while ($content = $result_contents->fetch_assoc()) {
            $descriptionCourt = $content['Description'];
            $descriptionCourt = substr($descriptionCourt, 0, 156);
            echo '<li class="menu-item">';
            echo '<a href="/Budget_millionnaire/content.php?c=' . $content['ContentID'] . '&t=' . $content['Title'] . '&d=' . $descriptionCourt . '"><span class="menu-title align-middle">' . $content['Title'] . '</span></a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</div>';
        echo '</li>';
    }
}

echo '<li class="menu-header"><span>Compte</span></li>';

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // L'utilisateur est connecté, afficher le lien de déconnexion
?>

<li class="menu-item">
    <a href="/fiche_perso_JDR/deconnexion.php">
        <span class="menu-icon">
            <span class="material-symbols-outlined align-middle">logout</span>
        </span>
        <span class="menu-title align-middle">Se déconnecter</span>
        <span class="menu-suffix align-middle">
            <span class="badge rounded-1 p-1 one"></span>
        </span>
    </a>
</li>

<?php
} else {
    // L'utilisateur n'est pas connecté, afficher le lien de connexion
?>

<li class="menu-item sub-menu">
    <a href="#">
        <span class="menu-icon">
            <span class="material-symbols-outlined align-middle">login</span>
        </span>
        <span class="menu-title align-middle">Connexion</span>
        <span class="menu-suffix align-middle">
            <span class="badge rounded-1 p-1 one"></span>
        </span>
    </a>
    <div class="sub-menu-list" style="visibility: hidden;">
        <ul>
            <li class="menu-item">
                <a href="/fiche_perso_JDR/?getNav=login">
                    <span class="menu-title align-middle">Se connecter</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="/fiche_perso_JDR/?getNav=signUp">
                    <span class="menu-title align-middle">Créer un compte</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<?php
}

echo '</ul></nav>';
?>