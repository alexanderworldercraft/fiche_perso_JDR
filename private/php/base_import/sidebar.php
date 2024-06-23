<aside id="sidebar" class="sidebar break-point-sm has-bg-image border-end border-primary collapsed">
    <a id="btn-collapse" class="sidebar-collapser"><span class="material-symbols-outlined">chevron_left</span></a>
    <div class="sidebar-layout">
        <div class="sidebar-header">
            <div class="pro-sidebar-logo">
                <div>
                    <a href="/fiche_perso_JDR" style="color: white;">J</a>
                </div>
                <h5>JDR</h5>
            </div>
        </div>
        <div id="container_nav" class="sidebar-content">

            <!-- Début de la Navigation -->
            <?php require_once "private/php/base_import/nav.php"; ?>
            <!-- Fin de la Navigation -->

        </div>
        <div class="sidebar-footer">
            <article class="footer-box cardteam" data-visible="false">
                <div data-card="front" class="card__front flow-content">
                    <img class="card__img mx-auto" src="https://worldercraft-hebergement.web.app/asset/photo/profil.jpg"
                        alt="photo">
                    <div class="flow-content" data-spacing="sm">
                        <p class="card__name">Patrick Tarroz</p>
                        <p class="card__position">Developpeur Web, Web Mobile
                            <br><br>
                            Titre professionnel de niveau 5
                        </p>
                    </div>
                </div>
                <div data-card="back" class="card__back flow-content">
                    <p class="card__name">Patrick Tarroz</p>
                    <q>La persévérance et la détermination finissent toujours par porter leurs fruits.</q>
                    <ul role="list" class="card__social flex-group">
                        <li>
                            <a href="https://www.linkedin.com/in/patrick-tarroz-56116a1aa/" target="_blank">
                                <i class="fa-brands fa-linkedin fa-xls"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/alexanderworldercraft" target="_blank">
                                <i class="fa-brands fa-github fa-xls"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <footer class="card__footer">
                    <button data-card-controller="" class="card__toggle">
                        <i class="fa-solid fa-plus card__toggle-icon"></i>
                    </button>
                </footer>
            </article>
        </div>
    </div>
</aside>