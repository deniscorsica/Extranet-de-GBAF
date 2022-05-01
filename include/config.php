<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    try
    {
        $bdd = new PDO('mysql:host=localhost:3306;dbname=projet3;charset=utf8', 'projet', 'Denaze1436',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
          die('Erreur : ' . $e->getMessage());
    } 
?>