<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require "../connexion.php";

    // si on doit supprimer
    if(isset($_GET['delete']))
    {
        // vérification existance
        $req = $bdd->prepare("SELECT * FROM contact WHERE id=?");
        $req->execute([$_GET['delete']]);
        if(!$don = $req->fetch())
        {
            $req->closeCursor();
            header("LOCATION:contact.php");
        }
        $req->closeCursor();

        // suppression
        $delete = $bdd->prepare("DELETE FROM contact WHERE id=?");
        $delete->execute([$_GET['delete']]);
        $delete->closeCursor();
        header("LOCATION:contact.php?deletesuccess=".$_GET['delete']);


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
            <h2 class="fw-bold">Gestion des messages</h2>
            <a href="dashboard.php" class='btn btn-secondary m-3'>Retour</a>
            <?php
                // messages flash
               
                if(isset($_GET['deletesuccess']))
                {
                    echo "<div class='alert alert-danger'>Le message n°".$_GET['deletesuccess']." a bien été supprimé</div>";
                }
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">nom</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Date</th>
                        <th class="d-flex justify-content-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                        $req = $bdd->query("SELECT id, nom, email, DATE_FORMAT(date,'%d / %m / %Y %Hh%i') as mydate FROM contact");
                        while($don = $req->fetch())
                        {
                            echo "<tr>";
                                echo "<td class='text-center'>".$don['id']."</td>";
                                echo "<td class='text-center'>".$don['nom']."</td>";
                                echo "<td class='text-center'>".$don['email']."</td>";
                                echo "<td class='text-center'>".$don['mydate']."</td>";
                                echo "<td class='d-flex justify-content-center'>";
                                    echo "<a href='showMessage.php?id=".$don['id']."' class='btn btn-primary mx-2'>Afficher</a>";
                                    echo "<a href='contact.php?delete=".$don['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
                                echo "</td>";
                            echo "</tr>";
                        }
                        $req->closeCursor();
                    ?>
                </tbody>
            </table> 
        </div>
    </main>
    <?php 
        include("partials/footer.php");
    ?>        
</body>
</html>