<header class="card border-0 rounded-4 bg-transparent mb-3">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i>Création de fiches de personnage pour
                    JDR</i></b></h1>
    </div>
</header>

<?php
if (isset($_SESSION['userGradeID']) && $_SESSION['userGradeID'] == 1) {
    // L'utilisateur est connecté, afficher le lien de déconnexion
?>
<div class="row row-cols-1 row-cols-md-2">
    <div class="col">
        <article class="card bg-bleu rounded-4 mb-3">
            <section class="card-body">

                <form action="add_theme.php" method="post">
                    <fieldset>
                        <legend>Theme</legend>
                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="titre" id="titre"
                                        placeholder="titre" required>
                                    <label for="titre">Titre</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Ajouter" class="btn btn-primary rounded-3">
                    </fieldset>
                </form>
            </section>
        </article>

        <article class="card bg-bleu rounded-4 mb-3 mb-md-0">
            <section class="card-body">

                <form action="add_section.php" method="post">
                    <fieldset>
                        <legend>Section</legend>
                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select rounded-3" id="section" name="section">
                                        <?php
                                                                // Récupérer les sections
                                                                $sql_sections = "SELECT ThemeID, Name FROM Theme";
                                                                $result_sections = $conn->query($sql_sections);
                                                                while ($section = $result_sections->fetch_assoc()) {
                                                                    echo '<option value="' . $section['ThemeID'] . '">' . $section['Name'] . '</option>';
                                                                }
                                                                ?>
                                    </select>
                                    <label for="section">Theme</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="titre" id="titre"
                                        placeholder="titre" required>
                                    <label for="titre">Titre</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-3" name="icon" id="icon"
                                        placeholder="icon" required>
                                    <label for="icon">Icon</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Ajouter" class="btn btn-primary rounded-3">
                    </fieldset>
                </form>
            </section>
        </article>
    </div>

    <div class="col">
        <article class="card bg-bleu rounded-4 h-100">
            <section class="card-body">

                <form action="add_content.php" method="post" class="h-100">
                    <fieldset class="h-100 d-flex flex-column">
                        <legend>content</legend>
                        <div class="row row-cols-1 row-cols-md-2 mb-3">
                            <div class="col">
                                <div class="form-floating mb-3 mb-md-0">
                                    <select class="form-select rounded-3" id="section" name="section">
                                        <?php
                                                    // Récupérer les sections
                                                    $sql_sections = "SELECT Section.SectionID, Section.Name AS section, Theme.Name AS theme
                                                                    FROM Section
                                                                    JOIN Theme ON Section.ThemeID = Theme.ThemeID
                                                                    ORDER BY Theme.Name, Section.Name";
                                                    $result_sections = $conn->query($sql_sections);
                                                    while ($section = $result_sections->fetch_assoc()) {
                                                        echo '<option value="' . $section['SectionID'] . '">' . $section['section'] . '/' . $section['theme'] . '</option>';
                                                    }
    
                                                    $conn->close();
                                                    ?>
                                    </select>
                                    <label for="section">Section</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input type="text" class="form-control rounded-3" name="titre" id="titre"
                                        placeholder="titre" required>
                                    <label for="titre">Titre</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3" style="flex-grow: 1!important;">
                            <textarea class="form-control h-100 rounded-3" placeholder="Leave a comment here"
                                id="description" name="description" style="flex-grow: 1!important;"></textarea>
                            <label for="description">Description</label>
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