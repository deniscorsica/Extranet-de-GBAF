<?php
require("include/config.php");

if(empty($_SESSION['id_user']) AND empty($_SESSION['pseudo']) AND empty($_SESSION['nom']) AND empty($_SESSION['prenom'])) 
{
    header('location: connexion.php');
}
else 
{
?><!DOCTYPE html>
<html lang="fr">
<!-- Header connecté -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if(!empty($title))
        {?>
        <title><?= $title; }?></title>
        <link rel="stylesheet" type="text/css" href="css/gbaf.css">
 </head>
    <body>
        <header>
            <a href="user.php">
                <div id="logo">
                    <img class="logo" src="img/logo-gbaf.png" alt="">
                </div>
            </a>
            <div id="nomsession"><!-- On affiche nom prénom session --> 
            <button class="bouton_nom">
            <?php
                echo '<img class="iconlog" src="img/iconlog2.png" alt="iconelog"/> ' . $_SESSION['nom'] .' '. $_SESSION['prenom'] ;
            ?>
            </button>
		<button class="bouton_parametre" onclick= "window.location.href = 'index.php';"> Accueil
	     </button> 				
            	<button class="bouton_parametre" onclick= "window.location.href = 'parametres.php';"> Vos informations et paramètres
            </button> 
		
	<button class="bouton_deconnexion" onclick= "window.location.href = 'deconnexion.php';"> Déconnexion 
            </button> 
            <?php
		}
            ?>
            </div>
        </header>
