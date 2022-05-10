<?php
session_start();
if (isset($_SESSION['id_user']) && $_SESSION['id_user'])
{ header('Location:user.php');
} else {
ob_start();

// connexion à Mysql
$title = 'Mot de passe oublié';
require("include/config.php");
require ("include/fonction.php");
require_once("include/headerpublic.php");

//Ici on submit 
if (isset($_POST['submit']))
{    
    $username = htmlspecialchars($_POST['username']);
    $reponse = htmlspecialchars($_POST['reponse_secrete']);

    // verifier que les champs sont remplis
    if (!empty($_POST['username']) AND !empty($_POST['reponse_secrete']) AND !empty($_POST['newpassword']))
    {
        $req = $bdd->prepare('SELECT * FROM users WHERE username = :username');
        $req->execute(array(
        'username' => $username));
        $resultat = $req->fetch();

        // On compare la réponse envoyée via le formulaire avec la bdd
        $isAnswerCorrect = (($_POST['username'] == $resultat['username']) AND ($_POST['reponse_secrete'] == $resultat['reponse_secrete']));
        if (!$isAnswerCorrect) 
        { 
            $message = '<div class="erreur"><h4>Données incorrectes !<h4></div>';
        }
        else 
        { 
            // renvoyer l'username + reponse  
            $_SESSION['id_user'] = $resultat['id_user'];
            $_SESSION['pseudo'] = $resultat['username'];
            $_SESSION['nom']= $resultat['nom'];
            $_SESSION['prenom']= $resultat['prenom'];
          
      {		// Hash du password
			$newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
			$insertpassword = $bdd->prepare("UPDATE users SET password = ? WHERE id_user = ?");
			$insertpassword->execute(array($newpassword, $_SESSION['id_user']));
			$okpassword = '<p style="color: rgb(50,205,50);">Votre mot de passe a bien été modifié ! </p>';
      }
        }
    }
    else
    {
      if(empty($_POST['username']))
        $message='<div class="erreur"><h4>Veuillez remplir votre pseudo<h4></div>';
		elseif(empty($_POST['reponse_secrete']))
        $message='<div class="erreur"><h4>veuillez remplir votre question secrète<h4></div>';  
		elseif(empty($_POST['newpassword']))
        $message='<div class="erreur"><h4>Veuillez remplir votre mot de passe<h4></div>'; 		
		
    }       
}
?>

        <!-- Formulaire pseudo réponse et password -->
        <div id="login">
		<h2>Mot de passe oublié</h2>
		<?php echo $message ?>
            <form class="form" method="post" action="">
                <label for="username"> Votre pseudo </label> <br>
                <input class="input" type="text" name="username" id="username" placeholder="Votre pseudo" value="<?php echo $_POST['username']?>">
                 <br>
                <label for="reponse_secrete">Réponse à la question secrète </label>
                <input class="input" type="text" name="reponse_secrete" id="reponse_secrete" placeholder="Votre question secrète" value="<?php echo $_POST['reponse_secrete']?>"><br>
				<label for="password">Mot de passe </label>
               <input class="input" type="password" name="newpassword" id="newpassword" placeholder="Votre mot de passe" id="password"/>
               <?php if(isset($okpassword)) { echo $okpassword; } ?>
                <input class="bouton_connexion" type="submit" value="Valider" name="submit"> <br>
            </form>
           
        </div>
<?php 
require_once('include/footer.php');
};
?>  
