<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Administration - Stock</title>
</head>
<body>
    <?php 
        include("partials/header.php");
    ?>
    <main>
        <div class="container">
            <h2>Ajouter un membre</h2>
            <a href="members.php" class="btn btn-secondary">Retour</a>
            <form action="treatmentAddMember.php" method="POST">
                <div class="form-group my-3">
                    <label for="login">Login: </label>
                    <input type="text" id="login" name="login" value="" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="password">Mot de passe: </label>
                    <input type="password" name="password" id="password" value="" class="form-control">
                </div>
                <div class="form-group my-3">
                    <label for="confirmPassword">Confirmer le mot de passe</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                </div>
                <div class="form-group my-3">
                    <input type="submit" value="ajouter" class="btn btn-success">
                </div>


            </form>

        </div>
    </main>
    <?php 
        include("partials/footer.php");
    ?>
</body>
</html>