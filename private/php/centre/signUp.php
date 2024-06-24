<header class="card border-0 rounded-4 bg-transparent mb-3">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i>Page de création de compte</i></b></h1>
    </div>
</header>

<article class="card bg-bleu rounded-4 mb-3 shadow">
    <section class="card-body">
        <form action="traitement.php?getTraitement=signUp" method="post">
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
                                    <input type="password" class="form-control rounded-3" name="password" id="password"
                                        placeholder="password" required>
                                    <label for="password">Mot de passe</label>
                                    <div class="invalid-feedback">
                                        Champs obligatoire !
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-0 mb-md-3">
                                    <input type="password" class="form-control rounded-3" name="confirmpassword"
                                        id="confirmpassword" placeholder="confirmpassword" required>
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
                    <input id="togglePassword" class="form-check-input shadow-lg" type="checkbox" id="togglePassword">
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