<?php
include('query.php');

define('SITELINK','http://localhost/detection/');
define('SITENAME','Facial Recognition Security Access System');
define('LOGO','http://localhost/detection/Logo.png');




//after login
//role 0 ==> 'not signin', 1 ==> 'User', 2 ==> 'admin'

function is_admin(){
  if(!isset($_SESSION['user']) || $_SESSION['role'] = ""){
      header("location:".SITELINK);
  }
}

//$_SESSION['clientID'] = "A11ca";

//unset($_SESSION['my_cart']);


?>
