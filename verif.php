<?php
session_start();
require("include/config.php");
    //  Récupération de l'utilisateur et de son password
    $req = $bdd->prepare('SELECT id_user, nom, prenom, password FROM users WHERE username = ?');
    $req->execute(array($_POST['username']));
    $resultat = $req->fetch();

    if (!empty($_POST['username']) AND !empty($_POST['password'])) 
    {
        // Comparaison du password envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
        
        if (!$isPasswordCorrect) 
        {
            header('Location: connexion.php?err=password');    
        }
        else 
        {
            $_SESSION['id_user'] = $resultat['id_user'];
            $_SESSION['pseudo'] = $_POST['username'];
            $_SESSION['nom']= $resultat['nom'];
            $_SESSION['prenom']= $resultat['prenom'];
            header('Location: user.php');
        }
    }
    else
    {
        header('Location: connexion.php?err=champs');
    }        
?>