<?php
ob_start();
// connexion à  Mysql
$title = 'Nouveau mot de passe';
require("include/config.php");
require_once("include/headerpublic.php");
session_start();

//ne pas afficher la page si la session n'est pas ouverte 
if (!empty($_SESSION['id_user']))
{
    //si on submit 
    if (isset($_POST['submit']))
    { 
        if(!empty($_POST['password']))
        {       
            $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            //inserer nouveau mdp dans bdd 
            $new_mdp = $bdd->prepare('UPDATE users SET password= :password WHERE username= :username');
            $new_mdp ->execute(array(
            'password' => $pass_hash,
            'username' => $_SESSION['pseudo']));
            header('Location: connexion.php?ok=password');
        }
        else
        {
            echo '<p style="color: rgb(255, 0, 0);">Veuillez remplir tous les champs.</p>' ; 
        } 
    }    
}
else 
{
    header('location: connexion.php');
}
?>

        <div id="login">  
            <form class="form" method="post" action="passe.php">
                <label for="password"> Votre nouveau mot de passe :</label> <br>
                <input class="input" type="password" name="password" id="password"> <br>
                <input class="bouton_connexion" type="submit" value="Valider" name="submit"> <br>
            </form>
        </div>
<?php 
require_once('include/footer.php');
?> 
