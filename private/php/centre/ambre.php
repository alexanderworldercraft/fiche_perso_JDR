<header class="card border-0 rounded-4 bg-transparent mb-3">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i>Fiche pour le JDR d'ambre</i></b></h1>
    </div>
</header>

<?php

$getform = htmlspecialchars($_GET['getform']);
$classe = htmlspecialchars($_POST['classe']);

switch ($getform) {
    case '1':
        $_SESSION['ambre_q1'] = htmlspecialchars($_POST['ambre-q1']);
    ?>
<div class="card bg-bleu rounded-4">
    <!-- <img src="serve_file.php?file=img/fiche/..." class="card-img-top rounded-top-4"
            alt="..."> -->
    <div class="card-body">
        <h4 class="card-title text-primary-emphasis"><b><i>Pendant une aventure, en traversant une fôret vous vous
                    retrouvez devant un ravin que vous devez franchir.<br>Comment procéder vous ?</i></b></h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-3 g-4">
            <div class="col">
                <div class="card bg-bleu rounded-4 h-100">
                    <img src="serve_file.php?file=img/fiche/ambre/q1-1.webp"
                        class="card-img-top rounded-top-4" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-primary-emphasis"><b><i>réponse 1</i></b></h4>
                        <p class="card-text" style="text-align: justify;">Vous êtes déterminé à ne pas vous
                            laisser ralentir par ce ravin et décider de sauter par-dessus afin de rejoindre l'autre côté.</p>
                        <form action="/fiche_perso_JDR/?getNav=ambre&getform=2&message=tu a choisi la response 1"
                            method="post" class="col text-center">
                            <input type="hidden" name="ambre-q2" id="ambre-q2-1" value="1">
                            <input type="submit" value="choisir ce choix" class="btn btn-primary rounded-3 my-1">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-bleu rounded-4 h-100">
                    <img src="serve_file.php?file=img/fiche/ambre/q1-2.webp"
                        class="card-img-top rounded-top-4" alt="...">
                    <div class="card-body">
                    <h4 class="card-title text-primary-emphasis"><b><i>réponse 2</i></b></h4>
                        <p class="card-text" style="text-align: justify;">Vous décider de couper un arbre ou
                            deux pour vous faire un pont de fortune, après tout il y a largement de quoi faire.</p>
                        <form action="/fiche_perso_JDR/?getNav=ambre&getform=2&message=tu a choisi la response 2"
                            method="post" class="col text-center">
                            <input type="hidden" name="ambre-q2" id="ambre-q2-2" value="2">
                            <input type="submit" value="choisir ce choix" class="btn btn-danger rounded-3 my-1">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-bleu rounded-4 h-100">
                    <img src="serve_file.php?file=img/fiche/ambre/q1-3.webp"
                        class="card-img-top rounded-top-4" alt="...">
                    <div class="card-body">
                    <h4 class="card-title text-primary-emphasis"><b><i>réponse 3</i></b></h4>
                        <p class="card-text" style="text-align: justify;">Vous préférez chercher un moyen de
                            contourner le ravin.</p>
                        <form action="/fiche_perso_JDR/?getNav=ambre&getform=2&message=tu a choisi la response 3"
                            method="post" class="col text-center">
                            <input type="hidden" name="ambre-q2" id="ambre-q2-3" value="3">
                            <input type="submit" value="choisir ce choix" class="btn btn-warning rounded-3 my-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form action="/fiche_perso_JDR/?getNav=ambre&getform=2&message=tu a choisi le joker" method="post"
            class="text-center">
            <input type="hidden" name="ambre-q2" id="ambre-q2-4" value="joker">
            <input type="submit" value="Joker" class="btn btn-secondary rounded-3 my-1">
        </form>
    </div>
</div>
<?php

        break;

    case '2':
        $_SESSION['ambre_q2'] = htmlspecialchars($_POST['ambre-q2']);
        echo $_SESSION['ambre_q2'];
        break;

    case '3':
        require_once "private/php/baldurgate3/resumer.php";
        break;
    
    default:
    ?>
<div class="card bg-bleu rounded-4">
    <!-- <img src="serve_file.php?file=img/fiche/..." class="card-img-top rounded-top-4"
        alt="..."> -->
    <div class="card-body">
        <h4 class="card-title text-primary-emphasis"><b><i>Pendant une aventure, en traversant une fôret vous vous
                    retrouvez devant un ravin que vous devez franchir.<br>Comment procéder vous ?</i></b></h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 mb-3 g-4">
            <div class="col">
                <p class="card-text" style="text-align: justify;">response 1 :<br>Vous êtes déterminé à ne pas vous
                    laisser ralentir par ce ravin et décider de sauter par-dessus.</p>
            </div>
            <div class="col border border-primary-subtle border-md-2 border-top-0 border-bottom-0">
                <p class="card-text" style="text-align: justify;">response 2 :<br>Vous décider de couper un arbre ou
                    deux pour vous faire un pont de fortune, après tout il y a largement de quoi faire.</p>
            </div>
            <div class="col">
                <p class="card-text" style="text-align: justify;">response 3 :<br>Vous préférez chercher un moyen de
                    contourner le ravin.</p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mb-3">
            <form action="/fiche_perso_JDR/?getNav=ambre&getform=1&message=tu a choisi la response 1" method="post"
                class="col text-center">
                <input type="hidden" name="ambre-q1" id="ambre-q1-1" value="1">
                <input type="submit" value="response 1" class="btn btn-primary rounded-3 my-1">
            </form>
            <form action="/fiche_perso_JDR/?getNav=ambre&getform=1&message=tu a choisi la response 2" method="post"
                class="col text-center">
                <input type="hidden" name="ambre-q1" id="ambre-q1-2" value="2">
                <input type="submit" value="response 2" class="btn btn-danger rounded-3 my-1">
            </form>
            <form action="/fiche_perso_JDR/?getNav=ambre&getform=1&message=tu a choisi la response 3" method="post"
                class="col text-center">
                <input type="hidden" name="ambre-q1" id="ambre-q1-3" value="3">
                <input type="submit" value="response 3" class="btn btn-warning rounded-3 my-1">
            </form>
        </div>
        <form action="/fiche_perso_JDR/?getNav=ambre&getform=1&message=tu a choisi le joker" method="post"
            class="text-center">
            <input type="hidden" name="ambre-q1" id="ambre-q1-4" value="joker">
            <input type="submit" value="Joker" class="btn btn-secondary rounded-3 my-1">
        </form>
    </div>
</div>
<?php
break;
}
?>