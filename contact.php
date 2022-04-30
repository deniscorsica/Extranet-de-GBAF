<?php
require  "include/verifmail.php";
// validation formulaire
   $civilite="Non Pénom";
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$email=$_POST["email"];
   @$messages=$_POST["messages"];
   @$valider=$_POST["valider"];
   $email2= $email ;

// Gestion des errreus 
    if(isset($valider)){
      if(empty($nom))
            $message='<div class="erreur"><h4>Nom obligatoire.<h4></div>';
      elseif(empty($prenom))
         $message='<div class="erreur"><h4>Prénom oblogatoire.<h4></div>';
      elseif(empty($email))
         $message='<div class="erreur"><h4>E-mail laissé vide.<h4></div>';
	  elseif(check_email_address($email2) == false)
		 $message='<div class="erreur"><h4>E-mail non valide.<h4></div>';
	  elseif(!strlen(trim($messages)))
		  $message='<div class="erreur"><h4>Message obligatoire.<h4></div>';
       else{
		   // Resultat  du formulaire
         $message='<div class="rappel"><b>Rappel:</b><br />';
         $message.=$civilite.' '.ucfirst(strtolower($prenom)).' '.strtoupper($nom).'<br />';
         $message.='Email: '.$email. '<br />';
		 $message.='Objet: '.$_POST["objet"]. '<br />';
		 $message.='Message: '.$messages;
         $message.='</div>';
      }
   }


 
?>
<!-- Formulaire HTML  --> 	
<?php $title = 'Contact';
require("include/config.php");
require_once("include/headerpublic.php");
?>
			
			<div id="bloc_page">
			<div id="contact">
			<?php echo $message ?>
			<h2>Nous contacter</h2>
			<p>Un problème, une question ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
			<div class="form"> 
			<form name="fo" method="post" action="">
			<div>Votre nom</div>
			<input class="input" type="text" id="nom" name="nom"  value="<?php echo $nom?>">
			<div>Votre prénom</div>
			<input class="input" type="text" id="prenom" name="prenom"  value="<?php echo $prenom?>"> 
			<div>Votre e-mail</div>
			<input class="input" type="text" id="email" name="email" value="<?php echo $email?>">
			<div>Quel est le sujet de votre message ?</div>
			<div class="select-wrapper"><select name="objet" id="objet"><div>
			<option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
			<option value="probleme-compte">Problème avec mon compte</option>
			<option value="autre">Autre...</option>
			</select>
			<div><label for="message">Votre message</label></div>
			<textarea id="messages" name="messages" placeholder="Bonjour, je vous contacte car...."> </textarea>
			
			
		<button  class="bouton_connexion" type="submit" name="valider" value="Valider">Envoyer mon message</button>
		</form>
		
		</div>	</div></div></div>
<?php require_once("include/footerpublic.php");?>
 