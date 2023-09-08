<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    if(isset($_GET['deco']))
    {
        session_destroy();
        header("LOCATION:index.php");
    }

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
        
            <div class="p-5 my-3 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Dashboard</h1>
                    <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima consequuntur, reiciendis iste assumenda perspiciatis fuga. Similique ad qui nulla repellendus, fugiat, adipisci veniam iusto, aliquam eaque error possimus consequatur praesentium?</p>
                    <a href='addProduct.php' class="btn btn-primary btn-lg" type="button">Ajouter un produit</a>
                </div>
                </div>

                <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-4 text-bg-dark rounded-3">
                    <h2>Members</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero labore veritatis totam, repellat ipsam voluptate perferendis at quo ullam eos.</p>
                    <a href='addMember.php' class="btn btn-outline-light">Ajouter un membre</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-4 bg-body-tertiary border rounded-3">
                    <h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet voluptatem sit, fugiat nulla minima nisi quisquam a modi cupiditate? Voluptates, eveniet modi reiciendis corrupti officiis eaque veritatis maiores nihil praesentium!</p>
                    <a href='message.php' class="btn btn-outline-secondary">Voir les messages</a>
                    </div>
                </div>
            </div>
        </div>
    </main>    
    <?php
        include("partials/footer.php");
    ?>
</body>
</html>