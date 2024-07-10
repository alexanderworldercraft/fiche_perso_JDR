<nav id="nav" class="menu open-current-submenu">
    <ul>

        <li class="menu-header"><span>Création</span></li>

        <li class="menu-item sub-menu">
            <a href="#">
                <span class="menu-icon">
                    <span class="material-symbols-outlined align-middle">draft</span>
                </span>
                <span class="menu-title align-middle">Création de fiche de personnage</span>
                <span class="menu-suffix align-middle">
                    <span class="badge rounded-1 p-1 one">New</span>
                </span>
            </a>
            <div class="sub-menu-list">
                <ul>
                    <?php
                    if (!defined('projet_perso-JDR')) {
                        define('projet_perso-JDR', true);
                    }
                    
                    require_once "private/php/base_import/key.php";
                    
                    // Créer une connexion
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    
                    // Vérifier la connexion
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    // Récupérer les thèmes
                    $sql_rows = "SELECT Ref, Nom FROM Univers";
                    $stmt_rows = $conn->prepare($sql_rows);
                    $stmt_rows->execute();
                    $result_rows = $stmt_rows->get_result();

                    while ($row = $result_rows->fetch_assoc()) {
                    ?>
                    <li class="menu-item">
                        <a href="/fiche_perso_JDR/?getNav=<?php echo $row['Ref']; ?>">
                            <span class="menu-title align-middle"><?php echo $row['Nom']; ?></span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </li>

        <li class="menu-header"><span>Compte</span></li>

        <?php
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
            <div class="sub-menu-list">
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

?>

    </ul>
</nav>