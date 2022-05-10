<?php
   
// Foncion email Valide
function check_email_address($email2) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email2)) ? false : true; 
}

   
// Foncion menu
function nav() { ?>
<div id='nomsession'>		<button class="bouton_parametre" onclick= "window.location.href = 'index.php';"> Accueil
			</button> 				
                <button class="bouton_parametre" onclick= "window.location.href = 'mentionslegales.php';"> Mentions legales
            </button> 
			    <button class="bouton_parametre" onclick= "window.location.href = 'contact.php';"> Contact 
            </button> 				
                 </div>
<?php
}
?>