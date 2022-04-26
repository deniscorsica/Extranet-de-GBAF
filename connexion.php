<?php 
// connexion mysql
$title = 'Connexion';
require("include/config.php");
require_once("include/headerpublic.php");
?>

		<div id="bloc_page">
			<div id="login">
				<h2>Se connecter</h2>
				<!-- Formulaire de connexion -->
				<div class="form">
					<form method="post" action="verif.php">
						<label for="votrepseudo"> Pseudo </label> <br>
						<input class="input" type="text" name="username" id="votrepseudo"> <br>
						<label for="votremdp"> Mot de passe </label> <br>
						<input class="input" type="password" name="password" id="votremdp"> <br>
						<a href="password.php"> Mot de passe oublié ? </a><br>
						<input class="bouton_connexion" type="submit" value="Connexion"> <br>
					</form>
				</div>
				
				<?php 
				//affiche une erreur si mdp faux
				if(!empty($_GET['err']) && $_GET['err']== "password")
				{
					echo '<p style="color: rgb(252, 116, 106);"><strong> Mot de passe ou pseudo incorrect ! </strong></p>'; 
				}

				// affiche une validation si mdp modifié 
				if(!empty($_GET['ok']) && $_GET['ok']== "password")
				{
					echo '<p style="color: lightgreen;"><strong> Votre mot de passe a bien été modifié ! </strong> </p>'; 
				}

				// affiche une erreur si tous les champs ne sont pas remplis
				if(!empty($_GET['err']) && $_GET['err']== "champs")
				{
					echo '<p style="color: red;"><strong>Veuillez remplir tous les champs.</strong></p>';  
				}	
				?>

				<div class ="nouveaumembre">
					<p> Nouveau membre ?<br>
						<button class="bouton_connexion" onclick= "window.location.href ='inscription.php';">Je m'inscris</button> 
					</p>
				</div>
			</div>
		</div>
<?php 
require_once('include/footerpublic.php');
?> 
