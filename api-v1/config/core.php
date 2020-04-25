<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('Asia/Jakarta');
 
// variables used for jwt
$key = "827ccb0eea8a706c4c34a16891f84e7b";
$iss = "immanuel-app.com";
$aud = "immanuel-app.com";
$iat = 1356999524;
$nbf = 1357000000;

?>