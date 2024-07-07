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

$_SESSION['classe'] = htmlspecialchars($_POST['classe']);

// Récupérer les thèmes
$sql_rows = "SELECT SousClasseID, Nom, Description, img 
FROM SousClasse
WHERE ClasseID = ?";
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
                <div class="card">
                    <img src="serve_file.php?file=img/fiche/sousClasse/<?php echo $row['img']; ?>" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['Nom']; ?></h5>
                        <p class="card-text"><?php echo $row['Description']; ?></p>
                        <form action="/fiche_perso_JDR/?getNav=baldurGate3&getform=2&message=tu a choisi la sous-classe <?php echo $row['Nom']; ?>" method="post">
                            <input type="hidden" name="sousClasse" id="sousClasse" value="<?php echo $row['SousClasseID']; ?>">
                            <input type="submit" value="Choisir cette sous-classe !" class="btn btn-primary rounded-3">
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