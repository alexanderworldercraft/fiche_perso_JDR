<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark">

<head>
    <!-- Encodage -->
    <meta charset="UTF-8">
    <!-- Mise en page et mise à l'échelle de la page web -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Description de la page web -->
    <meta name="description" content="">
    <!-- Description lors du partage -->
    <meta property="og:description" content="">
    <!-- Type de contenu lors du partage -->
    <meta property="og:type" content="website">
    <!-- Référent principale de l'url lors du partage -->
    <meta property="og:url" content="">
    <!-- Titre lors du partage -->
    <meta property="og:title" content="index">
    <!-- Titre de l'onglet -->
    <title>index</title>

    <!-- Link et Script du Head -->
    <?php require_once "private/php/base_import/head.php"; ?>
</head>

<body>

    <div class="layout has-sidebar fixed-sidebar fixed-header">
        <!-- Navigation de l'Application -->
        <?php require_once "private/php/base_import/sidebar.php"; ?>
        <div id="overlay" class="overlay"></div>
        <div class="layout">
            <main class="content">
                <div class="container">
                    <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm" style="z-index: 9999;">
                        <i class="ri-menu-line ri-xl background-boutton-and-shadow"></i>
                    </a>

                    <!-- Début contenu -->

                    <header class="card border-0 rounded-4 bg-transparent mb-3">
                        <div class="card-body">
                            <h1 class="card-title text-center m-0"><b><i>Page de création de compte</i></b></h1>
                        </div>
                    </header>

                    <article class="card bg-bleu rounded-4 mb-3">
                        <section class="card-body">
                            <form action="signUp_traitement.php" method="post">
                                <fieldset>
                                    <legend>Création</legend>
                                    <div class="row row-cols-1 row-cols-md-2 mb-3 was-validated">
                                        <div class="col">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control rounded-3" name="username" id="username"
                                                    placeholder="username" required>
                                                <label for="username">Nom d'utilisateur</label>
                                                <div class="invalid-feedback">
                                                    Champs obligatoire !
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row row-cols-1 row-cols-xl-2">
                                                <div class="col">
                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control rounded-3"
                                                            name="password" id="password" placeholder="password"
                                                            required>
                                                        <label for="password">Mot de passe</label>
                                                        <div class="invalid-feedback">
                                                            Champs obligatoire !
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-floating mb-0 mb-md-3">
                                                        <input type="password" class="form-control rounded-3"
                                                            name="confirmpassword" id="confirmpassword" placeholder="confirmpassword"
                                                            required>
                                                        <label for="confirmpassword">Confirmer le mot de passe</label>
                                                        <div class="invalid-feedback">
                                                            Champs obligatoire !
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-check text-start my-3">
                                        <input id="togglePassword" class="form-check-input shadow-lg" type="checkbox"
                                            id="togglePassword">
                                        <label class="form-check-label" for="togglePassword">
                                            Voir le mot de passe
                                        </label>
                                        <!-- script pour voir le mot de passe -->
                                        <script src="serve_file.php?file=js/togglePasswordVisibility.js"></script>
                                    </div>
                                    <input type="submit" value="Créer le compte" class="btn btn-primary rounded-3">
                                </fieldset>
                            </form>
                        </section>
                    </article>

                    <!-- Fin du contenu -->

                </div>
                <!-- Pied de page contenant la version et l'auteur -->
                <footer id="footer" class="footer"><?php require_once "private/php/base_import/footer.php"; ?></footer>
            </main>
            <div class="overlay"></div>
        </div>
    </div>

</body>

</html>