
<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php 
            if(!empty($title))
        {?>
        <title><?= $title; }?></title>

        <link rel="stylesheet" type="text/css" href="css/gbaf.css">
    	</head>
<!-- Header Public -->	
<body>
	<header>
	<a href="index.php">
	<div id="logo">
         <img class="logo" src="img/logo-gbaf.png" alt="">
         </div>
	</a>
	<?php nav();?>
	</header>	