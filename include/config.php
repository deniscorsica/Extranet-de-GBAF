<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=projet3;charset=utf8', 'user', 'mdp',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
          die('Erreur : ' . $e->getMessage());
    } 
?>