<?php
session_start();
require ("include/fonction.php");
if (isset($_SESSION['id_user']) && $_SESSION['id_user'])
{ header('Location:user.php');
} else {
$title = 'accueil';
require_once("include/headerpublic.php");?>
<div id="bloc_page">
    <div id="index">
     <h2> Bienvenue sur l'extranet de GBAF </h2>
      <button class="bouton_connexion" onclick="window.location.href = 'connexion.php';"> Connectez-vous </button>
    </div>
</div>
  <?php require_once("include/footer.php");
};
?>
