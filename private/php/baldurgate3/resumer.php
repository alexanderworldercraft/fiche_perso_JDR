<article class="card bg-bleu rounded-4 mb-3">
    <section class="card-body">
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

$_SESSION['race'] = htmlspecialchars($_POST['race']);

// Récupérer les thèmes
$sql_rows = "SELECT r.RaceID AS RaceID, r.Nom AS Race, r.Description AS DescriptionRace, c.Description AS DescriptionClasse, sc.Description AS DescriptionSousClasse, r.img AS img, cr.ClasseID AS ClasseID, c.Nom AS Classe, sc.Nom AS sousClasse
FROM ClasseRace cr
JOIN Race r ON cr.RaceID = r.RaceID
JOIN Classe c ON cr.ClasseID = c.ClasseID
JOIN SousClasse sc ON c.ClasseID = sc.ClasseID
WHERE cr.ClasseID = ? AND r.RaceID = ? AND sc.SousClasseID = ?";
$stmt_rows = $conn->prepare($sql_rows);
$stmt_rows->bind_param("iii", $_SESSION['classe'], $_SESSION['race'], $_SESSION['sousClasse']);
$stmt_rows->execute();
$result_rows = $stmt_rows->get_result();

while ($row = $result_rows->fetch_assoc()) {
    ?>
        <div class="card">
            <div class="card-header">
                <h4>Résumer du personnage</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title"><b><i>Classe : <?php echo $row['Classe']; ?></i></b></h5>
                <p class="card-text"><?php echo $row['DescriptionClasse']; ?></p>
                <h5 class="card-title"><b><i>Sous-classe : <?php echo $row['sousClasse']; ?></i></b></h5>
                <p class="card-text"><?php echo $row['DescriptionSousClasse']; ?></p>
                <h5 class="card-title"><b><i>Race : <?php echo $row['Race']; ?></i></b></h5>
                <p class="card-text"><?php echo $row['DescriptionRace']; ?></p>
                <form>
                    <input type="hidden" name="classe" id="classe" value="<?php echo $row['RaceID']; ?>">
                    <input type="submit" value="Validé se choix !" class="btn btn-primary rounded-3">
                    <a class="btn btn-primary rounded-3" href="/fiche_perso_JDR/?getNav=baldurGate3">Recommencer</a>
                </form>
            </div>
        </div>
        <?php
}
        
$stmt_rows->close();

$conn->close();
?>
    </section>
</article>