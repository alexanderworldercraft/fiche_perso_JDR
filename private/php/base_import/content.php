<?php

require_once "key.php";

$content = $_GET["c"];

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les thèmes
$sql_contents = "SELECT Title, Description, ContentID FROM Content WHERE ContentID = $content";
$stmt_contents = $conn->prepare($sql_contents);
$stmt_contents->execute();
$result_contents = $stmt_contents->get_result();

while ($content = $result_contents->fetch_assoc()) {
    
    $Description = $content['Description']; // Convertit d'abord les caractères spéciaux en entités HTML
    $Description = nl2br($Description); // Ensuite, convertit les sauts de ligne en balises <br>
    ?>
<header class="card border-0 rounded-4 bg-transparent mt-5 mb-5">
    <div class="card-body">
        <h1 class="card-title text-center m-0"><b><i><?php echo $content['Title']; ?></i></b></h1>
    </div>
</header>
<article class="card bg-transparent border-0 mb-3">
    <?php
    if (!empty($content['Description'])) {
        ?>
    <section class="card-body rounded-4 bg-transparent mb-3"><?php echo $Description; ?></section>
    <?php
    }    
   ?>
</article>

<article class="card bg-transparent border-0 mb-3">
<button type="submit"
    class="position-absolute top-0 end-0 badge bg-warning text-black z-1 btn"
    data-bs-toggle="modal" data-bs-target="#modalUpdate" data-id="<?php echo $content['ContentID']; ?>">Maj contenue</button>
</article>
<?php
}