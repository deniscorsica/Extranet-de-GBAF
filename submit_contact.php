<?php
// connexion à Mysql
require("include/config.php");
	// vérification 
	if (isset($_POST['valider'])) 
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']); 
		$email = htmlspecialchars($_POST['email']) ;
		$objet = htmlspecialchars($_POST['objet']);
		$message = htmlspecialchars($_POST['message']);
		
		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['objet']) AND !empty($_POST['message']))
		{
include_once('include/headerpublic.php'); ?>
<div id="bloc_page">
		<div id="login">            
<h1>Message bien reçu !</h1>
            
         
                
                <div>
                    <h5>Rappel de vos informations</h5>
                    <p><b>Nom</b> : <?php echo($nom); ?></p>
		<p><b>Prénom</b> : <?php echo($prenom); ?></p>
 		    <p><b>Email</b> : <?php echo($email); ?></p>
		    <p><b>Objet</b> : <?php echo($objet); ?></p>
                    <p><b>Message</b> : <?php echo strip_tags($message); ?></p>
<a href="index.html"> <input class="bouton_connexion" type="button" value="Revenir à l'accueil"> </a>

                </div>
</div></div>
             <?php require_once("include/footerpublic.php");	
						
						        			
		}
		else
		{
			header('location: contact.php?err=champs');
		}
	}
?>
