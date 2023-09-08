<?php
    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:index.php");
    }
    
    require "connexion.php";
    $req = $bdd->prepare("SELECT * FROM products WHERE id=?");
    $req->execute([$id]);
    $don = $req->fetch();
    if(!$don)
    {
        $req->closeCursor();
        header("LOCATION:index.php");
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
    <title>Stock - <?= $don['name'] ?></title>
</head>
<body>
    <main>
        <div class="container">
            <h2>Page produit</h2>
            <div class="row">
                <div class="col-md-6">
                    <img src="images/<?= $don['image'] ?>" alt="image de <?= $don['name'] ?>" class='img-fluid'>
                </div>
                <div class="col-md-6">
                    <h1 class='fw-bold'><?= $don['name'] ?></h1>
                    <div><?= $don['price'] ?>€</div>
                    <div><?= nl2br($don['description']) ?></div>
                </div>
            </div>
            <a href="products.php" class='btn btn-secondary my-3'>Retour aux produits</a>
        </div>
    </main>
</body>
</html>