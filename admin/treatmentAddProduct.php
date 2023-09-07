<?php
     session_start();
     if(!isset($_SESSION['login']))
     {
         header("LOCATION:index.php");
     }

     if(isset($_POST['name']))
     {
        // traiter les informations (pas le fichier)
        $err = 0;
        if(empty($_POST['name']))
        {
            $err=1;
        }else{
            $name = htmlspecialchars($_POST['name']);
        }  

        if(empty($_POST['description']))
        {
            $err=2;
        }else{
            $description= htmlspecialchars($_POST['description']);
        }

        if(empty($_POST['price']))
        {
            $err=3;
        }else{
            $price = htmlspecialchars($_POST['price']);
        }

        if($err == 0)
        {
            // traiter le fichier 
            $dossier = '../images/';
            $fichier = basename($_FILES['image']['name']);
            $taille_maxi = 200000;
            $taille = filesize($_FILES['image']['tmp_name']);
            $extensions = ['.png', '.gif', '.jpg', '.jpeg'];
            $extension = strrchr($_FILES['image']['name'], '.');

            if(!in_array($extension, $extensions))
            {
                $err=4;
            }

            if($taille>$taille_maxi)
            {
                $err=5;
            }

            if($err == 0)
            {
                $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                $fichiercpt = rand().$fichier;

                if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier.$fichiercpt))
                {
                    // insertion dans la base de données
                    require "../connexion.php";
                    $insert = $bdd->prepare("INSERT INTO products(name,description,price,image) VALUES(?,?,?,?)");
                    $insert->execute([$name, $description, $price, $fichiercpt]);
                    $insert->closeCursor();


                    if($extension == ".png")
                    {
                        header("LOCATION:redimpng.php?image=".$fichiercpt);
                    }else{
                        header("LOCATION:redim.php?image=".$fichiercpt);
                    }



                }else{
                    header("LOCATION:addProduct.php?error=6");
                }

            }else{
                header("LOCATION:addProduct.php?error=".$err);
            } 




        }else{
            header("LOCATION:addProduct.php?error=".$err);
        }
    



     }else{
        header("LOCATION:addProduct.php");
     }

