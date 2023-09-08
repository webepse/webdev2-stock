<?php
    require "connexion.php";
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
    <title>Stock</title>
</head>
<body>
    <main>
        <div class="container">
            <h1>Stock</h1>
            <div class="row d-flex justify-content-center">
            <?php
                $req = $bdd->query("SELECT * FROM products ORDER BY id DESC LIMIT 0,6");
                while($don = $req->fetch())
                {
                    echo "<div class='card col-3 m-3'>";
                        echo "<img src='images/".$don['image']."' alt='image de ".$don['name']."' class='img-fluid' alt=''>";
                        echo "<div class='card-body'>";
                            echo "<h5><a href='product.php?id=".$don['id']."'>".$don['name']."</a></h5>";
                            echo "<p class='card-text'>".$don['description']."</p>";
                        echo "</div>";
                    echo "</div>";    
                }
                $req->closeCursor();
            ?>
            </div>
            <a href="products.php">Voir tous les produits</a>
        </div>

    </main>
   
</body>
</html>