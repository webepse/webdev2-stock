<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    if(isset($_GET['id']))
    {
        $id  = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:products.php");
    }

    require "../connexion.php";

    $req = $bdd->prepare("SELECT id, nom, email, message, DATE_FORMAT(date,'%d / %m / %Y %Hh%i') as mydate  FROM contact WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:contact.php");
    }
    $req->closeCursor();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Stock - Administration</title>
</head>
<body>
    <?php 
        include("partials/header.php");
    ?>
    <main>
        <div class="container">
        <h2>Message de <?= $don['nom'] ?></h2>
        <h4><a href="mailto:<?= $don['email'] ?>"><?= $don['email'] ?></a></h4>
        <h4><?= $don['mydate'] ?></h4>
        <div>
            <?= nl2br($don['message']) ?>
        </div>
        <a href="contact.php" class="btn btn-secondary my-5">Retour</a>
        </div>
    </main>
    <?php 
        include("partials/footer.php");
    ?>
</body>
</html>