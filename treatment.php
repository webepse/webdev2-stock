<?php
    if(isset($_POST['nom']))
    {
        $err=0;
        if(empty($_POST['nom']))
        {
            $err=1;
        }else{ 
            $nom = htmlspecialchars($_POST['nom']);
        }

        if(empty($_POST['mail']))
        {
            $err=2;
        }else{
            $email = $_POST['mail'];
            if(!preg_match("#^[a-z0-9\._-]+@[a-z0-9_-]{2,}\.[a-z]{2,}$#",$email))
            {
                $err=3;
            }
        }

        if(empty($_POST['message']))
        {
            $err=3;
        }else{
            $message = htmlspecialchars($_POST['message']);
        }

        if($err==0)
        {
            require "connexion.php";
            $insert = $bdd->prepare("INSERT INTO contact(nom,email,date,message) VALUES(:nom,:mail,NOW(),:message)");
            $insert->execute([
                ":nom" => $nom,
                ":mail"=>$email,
                ":message"=>$message
            ]);

            header("LOCATION:index.php?contact=success#contact");

        }else{
            header("LOCATION:index.php?error=".$err."#contact");
        }


    }else{
        header("LOCATION:index.php");
    }