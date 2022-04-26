<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', 'Q14daz80',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
          die('Erreur : ' . $e->getMessage());
    } 
?>