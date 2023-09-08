<?php 
    require "connexion.php";
    $limit = 3;
    $reqCount = $bdd->query("SELECT * FROM products");
    $count = $reqCount->rowCount(); // permet de recup le nombre de produit via la req
    $reqCount->closeCursor();
    $nbPage = ceil($count/$limit); // arrondi au sup
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Stock - Products page</title>
</head>
<body>
    <main>
        <div class="container">
            <h2>Page des produits</h2>
            <ul class="pagination">
                <?php
                    if(isset($_GET['page']))
                    {
                        $pg = $_GET['page'];
                    }else{
                        $pg = 1;
                    }

                    // (1-1)*3=0
                    // (2-1)*3=3
                    // (3-1)*3=6
                    $offset = ($pg-1)*$limit;

                    if($pg>1)
                    {
                        echo '<li class="page-item">';
                         echo  "<a href='products.php?page=".($pg-1)."' class='page-link'>Previous</a>";
                        echo '</li>';
                    }
                    echo '<li class="page-item active" aria-current="page">';
                        echo '<a class="page-link" href="#">'.$pg.'</a>';
                    echo '</li>';
                    if($pg!=$nbPage && $pg<$nbPage)
                    {
                        echo '<li class="page-item">';
                        echo  "<a href='products.php?page=".($pg+1)."' class='page-link'>Next</a>";
                       echo '</li>';
                    }
                ?>
            </ul>
            <div class="row d-flex justify-content-center">
                <?php 
                    $products = $bdd->prepare("SELECT * FROM products ORDER BY id DESC LIMIT :offset , :mylimit");
                    $products->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $products->bindParam(':mylimit', $limit, PDO::PARAM_INT);
                    $products->execute();
                    while($donProd = $products->fetch())
                    {
                        echo "<div class='card col-3 m-3'>";
                            echo "<img src='images/".$donProd['image']."' alt='image de ".$donProd['name']."' class='img-fluid' alt=''>";
                            echo "<div class='card-body'>";
                                echo "<h5><a href='product.php?id=".$donProd['id']."'>".$donProd['name']."</a></h5>";
                                echo "<p class='card-text'>".$donProd['description']."</p>";
                            echo "</div>";
                        echo "</div>";  
                    }
                    $products->closeCursor();
                ?>
            </div>
        </div>
    </main>    
    


    
</body>
</html>