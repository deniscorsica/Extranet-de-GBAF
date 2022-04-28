<?php
   
// Foncion email Valide
function check_email_address($email2) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email2)) ? false : true; 
}
?>