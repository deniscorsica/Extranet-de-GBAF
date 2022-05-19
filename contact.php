<?php
require("include/config.php");
require ("include/fonction.php");
$title = 'contact';
// validation formulaire
   $civilite="Non Pénom :";
   $nom=htmlspecialchars($_POST["nom"]);
   $prenom=htmlspecialchars($_POST["prenom"]);
   $email=htmlspecialchars($_POST["email"]);
   $messages=htmlspecialchars($_POST["messages"]);
   $valider=$_POST["valider"];
   

// Gestion des errreus 
    if(isset($valider)){
      if(empty($nom))
            $message='<div class="erreur"><h4>Veuillez remplir votre Nom<h4></div>';
      elseif(empty($prenom))
         $message='<div class="erreur"><h4>Veuillez remplir votre Prénom<h4></div>';
      elseif(empty($email))
         $message='<div class="erreur"><h4>Veuillez remplir votre e-mail<h4></div>';
	  elseif(check_email_address($email) == false)
		 $message='<div class="erreur"><h4>E-mail non valide.<h4></div>';
	  elseif(!strlen(trim($messages)))
		  $message='<div class="erreur"><h4>Veuillez remplir votre message<h4></div>';
       else{
	   // Resultat  du formulaire
         $message='<div class="rappel"><b>Rappel:</b><br />';
         $message.=$civilite.' '.ucfirst(strtolower($prenom)).' '.strtoupper($nom).'<br />';
         $message.='Email: '.$email. '<br />';
		 $message.='Objet: '.$_POST["objet"]. '<br />';
		 $message.='Message: '.$messages;
         $message.='</div>';
//tout est correctement renseigné, on envoi le mail
		$VotreAdresseMail="denis@informatique-91.com";
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: Extranet de GBAF <".$_POST['email'].">\r\n";
                    $Entetes .= "Reply-To: Extranet de GBAF <".$_POST['email'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['email']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['objet']).'?=';
		    $Message='<div class="rappel"><b>Rappel:</b><br />';		    
		    $Message.=$civilite.' '.ucfirst(strtolower($prenom)).' '.strtoupper($nom).'<br />';
                    $Message.=htmlentities($_POST['objet'],ENT_QUOTES,"UTF-8");
		    $Message.=htmlentities($_POST['messages'],ENT_QUOTES,"UTF-8");                 
 //en fin, on envoi le mail
                     mail($VotreAdresseMail, $Sujet, nl2br($Message), $Entetes);

      }
   }


 
?>
<!-- Formulaire HTML  --> 	
<?php $title = 'Contact';
require_once("include/headerpublic.php");
?>
			
			<div id="bloc_page">
			<div id="contact">
			<?php echo $message ?>
			<h2>Nous contacter</h2>
			<p>Un problème, une question ? N’hésitez pas à utiliser ce formulaire pour prendre contact avec nous !</p>
			<div class="form"> 
		<form  method="post" action="contact.php">
			<label>Votre nom</label>
			<input class="input" type="text" id="nom" name="nom"  placeholder="Votre Nom" value="<?php echo $nom?>"><br>
			<label>Votre prénom</label>
			<input class="input" type="text" id="prenom" name="prenom" placeholder="Votre Prénom"  value="<?php echo $prenom?>"><br> 
			<label>Votre e-mail</label>
			<input class="input" type="text" id="email" name="email"  placeholder="Votre e-mail" value="<?php echo $email?>"><br>
			<label>Quel est le sujet de votre message ?</label>
			<select name="objet" id="objet">
			<option value="" disabled selected hidden>Choisissez le sujet de votre message</option>
			<option value="probleme-compte">Problème avec mon compte</option>
			<option value="autre">Autre...</option>
			</select>
			
			<textarea id="messages" name="messages" placeholder="Votre message" ></textarea>
			<button  class="bouton_connexion" type="submit" name="valider" value="Valider">Envoyer mon message</button>
		</form></div>
		
		</div>	</div>
<?php require_once("include/footer.php");?>
 
