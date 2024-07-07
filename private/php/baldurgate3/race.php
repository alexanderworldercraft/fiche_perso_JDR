<article class="card bg-transparent border-0 mb-3">
    <section class="card-body p-0">
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

$_SESSION['sousClasse'] = htmlspecialchars($_POST['sousClasse']);

// Récupérer les thèmes
$sql_rows = "SELECT r.RaceID AS RaceID, r.Nom AS Nom, r.Description AS Description, r.img AS img, c.ClasseID AS ClasseID
FROM ClasseRace c
JOIN Race r ON c.RaceID = r.RaceID
WHERE c.ClasseID = ?";
$stmt_rows = $conn->prepare($sql_rows);
$stmt_rows->bind_param("i", $_SESSION['classe']);
$stmt_rows->execute();
$result_rows = $stmt_rows->get_result();

?>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            <?php
while ($row = $result_rows->fetch_assoc()) {
    ?>
            <div class="col">
                <div class="card bg-bleu rounded-4">
                    <img src="serve_file.php?file=img/fiche/race/<?php echo $row['img']; ?>" class="card-img-top rounded-top-4"
                        alt="...">
                    <div class="card-body">
                    <h4 class="card-title text-primary-emphasis"><b><i><?php echo $row['Nom']; ?></i></b></h4>
                        <p class="card-text"><?php echo $row['Description']; ?></p>
                        <form action="/fiche_perso_JDR/?getNav=baldurGate3&getform=3&message=tu a choisi la race <?php echo $row['Nom']; ?>" method="post">
                            <input type="hidden" name="race" id="race" value="<?php echo $row['RaceID']; ?>">
                            <input type="submit" value="Choisir cette race !" class="btn btn-primary rounded-3">
                        </form>
                    </div>
                </div>
            </div>
            <?php
}
?>
        </div>
        <?php
        
$stmt_rows->close();

$conn->close();
?>
    </section>
</article>