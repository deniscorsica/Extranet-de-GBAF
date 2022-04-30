<?php 
session_start();
if (isset($_SESSION['id_user']) && $_SESSION['id_user'])
{ header('Location:user.php');
} else {

// connexion mysql
$title = 'Connexion';
require("include/config.php");
require("include/config.php");
$valider=$_POST["valider"];
    //  Récupération de l'utilisateur et de son password
    $req = $bdd->prepare('SELECT id_user, nom, prenom, password FROM users WHERE username = ?');
    $req->execute(array($_POST['username']));
    $resultat = $req->fetch();

    if (!empty($_POST['username']) AND !empty($_POST['password'])) 
    {
        // Comparaison du password envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
        
        if (!$isPasswordCorrect) 
        {
             $message='<div class="erreur"><h4>Erreur de mot de passe.<h4></div>';   
			  
        }
        else 
        {
            $_SESSION['id_user'] = $resultat['id_user'];
            $_SESSION['pseudo'] = $_POST['username'];
            $_SESSION['nom']= $resultat['nom'];
            $_SESSION['prenom']= $resultat['prenom'];
            header('Location: user.php');
        }
    }
    else
// Vérification de l'utilisateur et du  password
    {
		if(isset($valider)){
        if(empty($_POST['username']))
        $message='<div class="erreur"><h4>Nom obligatoire<h4></div>';
		elseif(empty($_POST['password']))
        $message='<div class="erreur"><h4>Mot de passe obligatoire.<h4></div>';   }
   
    } 
// Formulaire de connexion
require_once("include/headerpublic.php");
?>

		<div id="bloc_page">
			<div id="login">
			<?php echo $message ?>
				<h2>Se connecter</h2>
				<!-- Formulaire de connexion -->
				<div class="form">
					<form name="fo" method="post" action="">
						<label for="votrepseudo"> Pseudo </label> <br>
						<input class="input" type="text" name="username" id="votrepseudo" value="<?php echo $_POST['username']?>"> <br>
						<label for="votremdp"> Mot de passe </label> <br>
						<input class="input" type="password" name="password" id="votremdp"value="<?php echo $_POST['password']?>"> <br>
						<a href="password.php"><strong> Mot de passe oublié ? </strong></a><br>
						<input class="bouton_connexion"  name="valider" type="submit" value="Connexion"> <br>
					</form>
				</div>
				
		

				<div class ="nouveaumembre">
					<p> Nouveau membre ?<br>
						<button class="bouton_connexion" onclick= "window.location.href ='inscription.php';">Je m'inscris</button> 
					</p>
				</div>
			</div>
		</div>
<?php 
require_once('include/footerpublic.php');
};
?> 
