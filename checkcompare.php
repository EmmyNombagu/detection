<?php
include('config/config.php');
$query = new query();

$location="tempFile/";

$rand = rand(90,2000) * time();
$label = "IMG".sprintf("%0.8s",str_shuffle($rand));

$temp = $_FILES['image']['tmp_name'];

$newImg=$label.'.jpg';

$fileLink = $location.$newImg;
move_uploaded_file($temp,$fileLink);

$jsonLink = $query->getImageURL($fileLink,$newImg);

unlink($fileLink);
$logs = $query->getResult($jsonLink);
/**if($logs == '1'){
	$data['status'] = 'ok';
	$data['msg'] = $jsonLink;
}else{
	$data['status'] = 'fail';
	$data['msg'] = 'No Record Found ';
}
echo json_encode($data); **/
$data['stat'] = $logs;
$data['msg'] = $jsonLink;
echo json_encode($data);

?>
