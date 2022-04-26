<?php
$title = 'Inscription';
require("include/config.php");
require_once("include/headerpublic.php");

?>
		
			
		<div id="bloc_page">
			<div id="contact"					
		<h2>Votre message</h2>
<?php  if(!empty($_GET['err']) && $_GET['err']== "champs") 
				{
					echo '<p style="color: rgb(252, 116, 106);"><strong> Veuillez remplir tous les champs. </strong></p>';  
				} ?>

			<p>Un problème, une question ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
		<div class="form">
			<form action="submit_contact.php" method="post">
			<div>Votre nom</div>
			<input class="input" type="text" id="nom" name="nom" placeholder="Martin">
			<div>Votre prénom</div>
			<input class="input" type="text" id="prenom" name="prenom" placeholder="Jacques">
			<div>Votre e-mail</div>
			<input class="input" type="email" id="email" name="email" placeholder="monadresse@mail.com">
			<div>Quel est le sujet de votre message ?</div>
			<div class="select-wrapper"><select name="objet" id="objet"><div>
			<option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
			<option value="probleme-compte">Problème avec mon compte</option>
			<option value="autre">Autre...</option>
			</select>
			<div><label for="message">Votre message</label></div>
			<textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...."></textarea>
		<button  class="bouton_connexion" type="submit" name="valider" value="Valider">Envoyer mon message</button>
		</form>
		</div>	</div></div></div>
<?php require_once("include/footerpublic.php");?>
 