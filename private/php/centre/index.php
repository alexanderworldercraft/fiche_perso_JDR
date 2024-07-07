<header class="card border-0 rounded-4 bg-transparent mb-3">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i>Création de fiches de personnage pour
                    JDR</i></b></h1>
    </div>
</header>

<?php
if (isset($_SESSION['userGradeID']) && $_SESSION['userGradeID'] == 1) {
?>
<div class="row row-cols-1 row-cols-md-2">

    <div class="col">
        <article class="card bg-bleu rounded-4 mb-3">
            <div class="card-header">
                <h1><b><i>sans back-end !</i></b></h1>
            </div>
            <section class="card-body">

                <form method="post">
                    <fieldset>
                        <legend>Nouvelle Classe</legend>
                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <select class="form-select rounded-3" name="univers" id="universClasse"
                                        aria-label="Floating label select example">
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
                                        $sql_rows = "SELECT UniversID, Nom
                                        FROM Univers";
                                        $stmt_rows = $conn->prepare($sql_rows);
                                        $stmt_rows->execute();
                                        $result_rows = $stmt_rows->get_result();
                                        
                                        while ($row = $result_rows->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $row['UniversID']; ?>"><?php echo $row['Nom']; ?></option>
                                            <?php
                                        }
                                                
                                        $stmt_rows->close();
                                        
                                        $conn->close();
                                        ?>
                                    </select>
                                    <label for="universClasse">Selectionner l'univers</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="titre" id="classetitre"
                                        placeholder="titre" required>
                                    <label for="titre">Classe</label>
                                </div>
                            </div>
                            <div class="form-floating mb-3" style="flex-grow: 1!important;">
                                <textarea class="form-control h-100 rounded-3" placeholder="Leave a comment here"
                                    id="classedescription" name="description" style="flex-grow: 1!important;"></textarea>
                                <label class="ms-3" for="description">Description</label>
                            </div>
                        </div>
                        <input type="submit" value="Ajouter" class="btn btn-primary rounded-3">
                    </fieldset>
                </form>
            </section>
        </article>
    </div>

</div>
<?php
} else {
    // L'utilisateur n'est pas connecté
    if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] !== true) {
    ?>

<article class="card bg-bleu rounded-4 shadow">
    <section class="card-body">
        <h4 class="card-title">Si c'est la première fois que tu viens ici, voici quelques
            informations qui te seront utiles.</h4>
        <p class="card-text">Tout d'abord, pour utiliser l'application, il te faut un compte afin de
            pouvoir sauvegarder tes fiches de personnages. Tu peux en créer un très facilement en
            cliquant <a href="/fiche_perso_JDR/?getNav=signUp" class="h5 text-danger"><b><i>ici</i></b></a>.</p>
    </section>
</article>

<?php
    }
}