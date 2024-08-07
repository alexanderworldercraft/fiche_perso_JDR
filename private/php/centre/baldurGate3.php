<header class="card border-0 rounded-4 bg-transparent mb-3">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i>Fiche pour Baldur's Gate 3</i></b></h1>
    </div>
</header>

<?php

$getform = htmlspecialchars($_GET['getform']);
$classe = htmlspecialchars($_POST['classe']);

switch ($getform) {
    case '1':
        require_once "private/php/baldurgate3/sousClasse.php";
        break;

    case '2':
        require_once "private/php/baldurgate3/race.php";
        break;

    case '3':
        require_once "private/php/baldurgate3/resumer.php";
        break;
    
    default:
        require_once "private/php/baldurgate3/classe.php";
        break;
}
?>

<!-- select avec recherche (select2) -->
<!-- <form action="#" method="post">
    <fieldset>
        <legend>Quel classe souhaite tu jouer ?</legend>
        <div class="row row-cols-1 row-cols-md-2 mb-3">
            <div class="col">
                <div class="mb-3">
                    <label for="options" class="form-label">select Class</label>
                    <select id="options" class="form-select">
                        <option selected>Open this select menu</option>
                        <option value="1">Paladin</option>
                        <option value="2">Prêtre</option>
                        <option value="3">Guerrier</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" value="Ajouter" class="btn btn-primary rounded-3">
    </fieldset>
</form> -->