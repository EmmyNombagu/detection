<?php
include('../config/config.php');
$query = new query();

$location="tempFile/";

$temp = $_FILES['image']['tmp_name'];
$imageLabel = $_POST['imageLabel'];

$newImg=str_replace(" ","_",$imageLabel).'.jpg';

$fileLink = '../'.$location.$newImg;
move_uploaded_file($temp,$fileLink);

$jsonLink = $query->getImageURL($fileLink,$imageLabel);
$query->insertUser($imageLabel,$jsonLink,$location.$newImg);
echo "   New User Added "; 

?>
