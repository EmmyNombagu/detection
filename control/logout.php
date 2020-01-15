<?php
include('../config/config.php');
$query = new query();
$_SESSION['user']="";
session_destroy();
session_unset();
header("location:".SITELINK);
exit();
?>