<?php
session_start();
$title = 'Inscription';
require("include/config.php");
	// vérification 

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
				$message='<div class="erreur"><h4>Pseudo déja utilisé<h4></div>';
			}
		}
		else
		{
			 if(empty($_POST['nom']))
        $message='<div class="erreur"><h4>Veuillez remplir votre Nom<h4></div>';
		elseif(empty($_POST['prenom']))
        $message='<div class="erreur"><h4>Veuillez remplir votre Prénom<h4></div>';  
		elseif(empty($_POST['username']))
        $message='<div class="erreur"><h4>Veuillez remplir votre pseudo<h4></div>'; 
		elseif(empty($_POST['password']))
        $message='<div class="erreur"><h4>Veuillez remplir votre mot de passe<h4></div>'; 
		elseif(empty($_POST['reponse']))
        $message='<div class="erreur"><h4>Veuillez remplir votre question secréte<h4></div>'; 
		}
	}
require_once("include/headerpublic.php");
?>

		<div id="bloc_page">
			<div id="inscription">
			<?php echo $message ?>
				<h2>Inscription</h2> 
				
				<!-- Formulaire d'inscription -->
				<form class="fo" method="post"  action="">
					<div>Votre nom :</div>
					<input class="input" type="text" name="nom" placeholder="Votre Nom" value="<?php echo $_POST['nom']?>">
					<div>Votre prénom :</div>
					<input class="input" type="text" name="prenom" placeholder="Votre Prénom" value="<?php echo $_POST['prenom']?>">
					<div>Votre pseudo :</div>
					<input class="input" type="text" name="username" placeholder="Votre pseudo" value="<?php echo $_POST['username']?>">
					<div>Votre mot de passe :</div>
					<input class="input" type="password" name="password" placeholder="Votre mot de passe" value="<?php echo $_POST['password']?>">				
					<div>Choix de votre question secrète :</div>
					<select class="input" name="choix">
						<option value="choix1">Le nom de jeune fille de votre mère</option>
						<option value="choix2">Le nom de votre premier animal de compagnie</option>
						<option value="choix3">La ville de naissance de votre père</option>
						<option value="choix4">La Ville de votre naissance </option>
					</select> <br>
					<div>Réponse à la question secrète :</div>
					<input class="input" type="text" name="reponse" placeholder="Votre question secrète" value="<?php echo $_POST['reponse']?>">
					<input class="bouton_connexion" type="submit" name="valider" value="Valider">
				</form>
			</div>
		</div>
<?php 
require_once('include/footerpublic.php');

?> 
