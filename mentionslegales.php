<?php session_start();
$title = 'Mentions légales';
require("include/config.php");
require ("include/fonction.php");
if (isset($_SESSION['id_user']) && $_SESSION['id_user'])
{ require_once("include/header.php");
} else {
require_once("include/headerpublic.php");

};
?>
		
			
<div id="bloc_page">
			<div id="mention">					
				<h2>Mentions légales</h2>
				
<p>En vigueur au 25/04/2020<br />
Formation développement Prép'fullstack Openclassrooms<br />
Conformément aux dispositions des Articles 6-III et 19 de la Loi n°2004-575 du 
21 juin 2004 pour la confiance dans l’économie numérique, dite L.C.E.N., il est 
porté à la connaissance des utilisateurs et visiteurs,<br />ci-après l'utilisateur 
du site http://extranet-gbaf.informatique-91.com ,ci-après le "site", les présentes mentions légales.<br />
La connexion et la navigation sur le site par l’Utilisateur implique acceptation 
intégrale et sans réserve des présentes mentions légales.<br />
Ces dernières sont accessibles sur le Site à la rubrique « Mentions légales ».<br />
<br />
<strong>ARTICLE 1 - L'EDITEUR</strong><br />
L’édition et la direction de la publication du Site est assurée par 
Denis, dans le cadre du projet 3 Prép'fullstack OpenClassrooms .<br />
<br />
<strong>ARTICLE 2 - L'HEBERGEUR</strong><br />
L'hébergeur du site est OVHCLOUD , dont le siège social est situé au
 2 rue Kellermann – BP 80157 59053 ROUBAIX CEDEX 1 ,<br />
<br />
<strong>ARTICLE 3 - ACCES AU SITE</strong><br />
Le Site est accessible en tout endroit, 7j/7, 24h/24 sauf cas de force majeure, 
interruption programmée ou non et pouvant découlant d’une nécessité de 
maintenance.<br />
En cas de modification, interruption ou suspension du Site, l'Editeur ne saurait 
être tenu responsable.<br />
<br />
<strong>ARTICLE 4 - COLLECTE DES DONNEES<br />
</strong>Le Site assure à l'Utilisateur une collecte et un traitement 
d'informations personnelles dans le respect de la vie privée conformément à la 
loi n°78-17 du 6 janvier 1978 relative à l'informatique, aux fichiers et aux 
libertés.<br />
En vertu de la loi Informatique et Libertés, en date du 6 janvier 1978, 
l'Utilisateur dispose d'un droit d'accès, de rectification, de suppression et 
d'opposition de ses données personnelles. <br />
L'Utilisateur exerce ce droit :par mail à l'adresse email :
<a href="mailto:drouindenis@bbox.fr">drouindenis@bbox.fr</a> via un formulaire 
de contact via son espace personnel <br />
Toute utilisation, reproduction, diffusion, commercialisation, modification de 
toute ou partie du Site, sans autorisation de l’Editeur est prohibée et pourra 
entraînée des actions et poursuites judiciaires<br />telles que notamment prévues par 
le Code de la propriété intellectuelle et le Code civil.</p>

				<div class ="retour">
						<button class="bouton_connexion" onclick= "window.location.href ='index.php';">Retour à l'accueil</button> 
					</p>
				</div>
	 
				</div>
			</div>

<?php require_once("include/footer.php");?>