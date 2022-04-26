<?php
// connexion à Mysql
require("include/config.php");
	// vérification 
	if (isset($_POST['valider'])) 
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']) ;
		$username = htmlspecialchars($_POST['username']);
		$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$question = ($_POST['choix']);
		$reponse = htmlspecialchars($_POST['reponse']);
		
		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['choix'] AND !empty($_POST['reponse'])))
		{		
			//pseudo 
			$requsername = $bdd->prepare("SELECT id_user FROM users WHERE username = ?");
			$requsername->execute(array($username));
			$usernameexist = $requsername->rowcount();
			if ($usernameexist == 0) 
			{
				// insérer dans Mysql
				$req = $bdd->prepare('INSERT INTO users(nom, prenom, username, password, question_secrete, reponse_secrete) VALUES(?, ?, ?, ?, ?, ?)');
				$req->execute(array($nom, $prenom, $username,$pass_hache, $question, $reponse));
				// Puis redirection du visiteur vers la page de connexion
				header('Location: connexion.php'); 
			}        
			else 
			{
				header('location: inscription.php?err=pseudo');
			}
		}
		else
		{
			header('location: inscription.php?err=champs');
		}
	}
?>
