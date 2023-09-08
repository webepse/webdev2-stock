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
        <h2>Ajouter une image</h2>
        <a href="updateProduct.php?id=<?= $id ?>" class="btn btn-secondary">Retour</a>
        <form action="treatmentAddPicture.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label for="image">Image: </label>
                <input type="file" name="fichier" id="image" class="form-control">
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Ajouter" class="btn btn-success">
            </div>
        </form>
        </div>
    </main>
    <?php 
        include("partials/footer.php");
    ?>
</body>
</html>