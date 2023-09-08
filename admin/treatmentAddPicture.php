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

     if(!empty($_FILES['fichier']['tmp_name']))
     {
        $err = 0;
        // traiter le fichier 
        $dossier = '../images/';
        $fichier = basename($_FILES['fichier']['name']);
        $taille_maxi = 2000000;
        $taille = filesize($_FILES['fichier']['tmp_name']);
        $extensions = ['.png', '.gif', '.jpg', '.jpeg'];
        $extension = strrchr($_FILES['fichier']['name'], '.');

        if(!in_array($extension, $extensions))
        {
            $err=2;
        }

        if($taille>$taille_maxi)
        {
            $err=3;
        }

        if($err == 0)
        {
            $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

            $fichiercpt = rand().$fichier;

            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier.$fichiercpt))
            {
                // insertion dans la base de données
                require "../connexion.php";
                $insert = $bdd->prepare("INSERT INTO images(fichier,id_product) VALUES(?,?)");
                $insert->execute([$fichiercpt,$id]);
                $insert->closeCursor();
                header("LOCATION:updateProduct.php?id=".$id."&addsuccess=ok");

            }else{
                header("LOCATION:updateProduct.php?id=".$id."&picturerror=4");
            }

        }else{
            header("LOCATION:updateProduct.php?id=".$id."&picturerror=".$err);
        } 




      
    



     }else{
        header("LOCATION:updateProduct.php?id=".$id."&picturerror=1");
     }

