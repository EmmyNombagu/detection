<?php
include('config.php');
$query = new query();

$action = $_POST['action'];

if($action=='getImgDetails'){
  $imgURL = $_POST['imgURL'];
  $qp = $query->getImageEmotion($imgURL);
  
  echo json_encode($qp);
}

if($action=='deleteUser'){
  $id = $_POST['id'];
  $query->deleteUser($id);  
  echo "User Deleted";
}


 ?>
