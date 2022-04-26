<?php session_start();
$title = 'Mentions légales';
require("include/config.php");
require_once("include/header.php");

?>
		
			
<div id="bloc_page">
			<div id="mention">					
					Les données personnelles sécurisées figurant sur ce site internet concernent les utilisateurs de GBAF qui ne collecte aucune donnée personnelle directement sur le site internet, ni cookie.<br />
					Les utilisateurs ne peuvent accéder qu'aux seulles informations les concernants, pour optimiser la confidentialité de vos consultations, nous vous conseillons de choisir un mot de passe sécurisé.<br />
				        Toute personne pourra exercer ses droits de retrait, de rectification ou de portabilité des données la concernant dans le cadre de la RGPD, en s'adressant à l'administrateur du site via la page de contact
				<div class ="retour">
					<p> Retour à l'accueil<br>
						<button class="bouton_connexion" onclick= "window.location.href ='user.php';">Retour</button> 
					</p>
			</div></div>

<?php require_once("include/footer.php");?>