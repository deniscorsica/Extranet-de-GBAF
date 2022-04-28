<?php
session_start();
if (isset($_SESSION['id_user']) && $_SESSION['id_user'])
{ header('Location:user.php');
} else {
require_once("include/headerpublic.php");?>
			 <div id="bloc_page">
    <div id="index">
      <h2> Bienvenue sur l'extranet de GBAF </h2>
        <button class="bouton_connexion" onclick="window.location.href = 'connexion.php';"> Connectez-vous </button>
    </div></div>
	     
	      <footer>
	    	<div class="shadowbox">
	    		
	            	<p>Site créé dans le cadre d'un projet OpenClassrooms |
			<a class="cool" href="index.html">Accueil</a> |	            	
			<a class="cool" href="mentions.php">Mentions légales</a> |
	            	<a class="cool" href="contact.php">Contact</a>
	
                <SCRIPT LANGUAGE="JavaScript">
			var maintenant=new Date();
			var jour=maintenant.getDate();
			var mois=maintenant.getMonth()+1;
			var an=maintenant.getFullYear();
			document.write("Nous sommes le ",jour,"/",mois,"/",an,".");
		</SCRIPT></p>
			
	        	</div>
  <?php require_once("include/footerpublic.php");
};
?>
