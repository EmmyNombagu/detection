<?php
ob_start();
session_start();

require_once "pixlab.php";


define('DB','detection');
define('HOST','localhost');
define('USER','root');
define('PASSWORD','');
define('APIKEY','6d8f697aeef27bf85fb2ec5bec7f926a');



function check_date($sql){
	$nDate = date('F jS, Y',$sql);
	return $nDate;
}



class query {



	function CONNECT($sql1,$sql2,$sql3,$sql4){
		$conn = mysqli_connect($sql1,$sql2,$sql3,$sql4);

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  //return $conn;
	}

	function SEARCH($sql){
		$act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
		$conn=mysqli_connect($ht,$act,$ky,$db);
		$result = mysqli_query($conn,$sql);
		return $result;
	}

	function FETCH($sql1){

		$sq1=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
		return $sq1;
	}

	function CLEAN($sql){
		$act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
	    $conn=mysqli_connect($ht,$act,$ky,$db);
		$q2=strip_tags($sql);
		$q3=stripslashes($q2);
		$conn=mysqli_connect($ht,$act,$ky,$db);
		$sql=mysqli_real_escape_string($conn, $q3);
		return $sql;
	}


	function getImageURL($imgpath,$label){
		$pix = new Pixlab(APIKEY);
		$pix->switch_to_http();
		if( !$pix->post('store',array('comment' => $label),$imgpath) ){
			echo $pix->get_error_message();
			die;
		}
		return $pix->json->link;
	}

	function insertUser($sql,$sql2,$sql3){
	    $act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
	    $conn=mysqli_connect($ht,$act,$ky,$db);
	    $b="INSERT INTO ".$db.".users (label,imgLink,localURL) values (?, ?, ?)";
		$stmt = $conn->prepare($b);
		$stmt->bind_param("sss", $sql,$sql2,$sql3);
		$stmt->execute();
	}

	function deleteUser($sql){
	    $act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
	    $conn=mysqli_connect($ht,$act,$ky,$db);
	    $b="DELETE FROM ".$db.".users WHERE id = ?";
		$stmt = $conn->prepare($b);
		$stmt->bind_param("s", $sql);
		$stmt->execute();
	}

	function fetch_users(){
	  $act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
	  $conn=mysqli_connect($ht,$act,$ky,$db);
		$b="SELECT * FROM ".$db.".users ORDER BY id DESC";
		$stmt = $conn->prepare($b);
		$stmt->execute();
		$res=$stmt->get_result();
			while($row=$res->fetch_assoc()){
				$resultSet[]=$row;
			}
			if(!empty($resultSet)){
				return $resultSet;
			}else{
				return 0;
			}
		$stmt->close();
	}

	function getImageEmotion($imgpath){
		$pix = new Pixlab(APIKEY);
		$pix->switch_to_http();

		if( !$pix->get('facemotion',array(
			'img' => $imgpath
		)) ){
			return $pix->get_error_message();
			die;
		}
		$faces = $pix->json->faces;
		//echo "Total number of detected faces: ".count($faces)."\n";
		if( count($faces) < 1 ){
			return "No human faces were were detected on this picture\n";
		}else{
			# Iterate all over the detected faces
			foreach($faces as $face){
				$coord = $face->rectangle;
				//echo 'Face coordinate: width: ' . $coord->width . ' height: ' . $coord->height . ' X: ' . $coord->left . ' Y: ' . $coord->top . "\n";
				$data['face_width'] = $coord->width;
				$data['face_height'] = $coord->height;
				$data['left'] = $coord->left;
				$data['top'] = $coord->top;

				# Guess emotion
				foreach( $face->emotion as $emotion ){
					if ( $emotion->score > 0.5 ){
						$data['emotion'] = ucwords($emotion->state);
					}
				}
				# Grab the age and gender
				$data['age'] = $face->age;
				$data['gender'] = ucfirst($face->gender);
				//echo "Age ~: " . $face->age. "\n";
				//echo "Gender: " . $face->gender . "\n";
			}

			return $data;
		}
	}


	function compareFace($src,$target){
		$pix = new Pixlab(APIKEY);
		if( !$pix->get('facecompare',[
			'src'    => $src,
			'target' => $target,
		]) ){
			return $pix->get_error_message()."\n";
			die;
		}
		//echo "Same Face?: ". ($pix->json->same_face?'True':'False') ."\n";
		//echo "Confidence: ". $pix->json->confidence."\n";
		return $pix->json->same_face?'True':'False';
	}


	function getResult($src){
		$logs = $this->fetch_users();
		$d = 0;
		foreach($logs as $log){
			$sImg = $log['imgLink'];
			$res = $this->compareFace($src,$sImg);
			if($res == 'True'){
				$d = 1;
			}
		}
		return $d;
	}

	function countAdmin($sql1,$sql2){
	    $act=USER;
		$ht=HOST;
		$ky=PASSWORD;
		$db=DB;
	    $conn=mysqli_connect($ht,$act,$ky,$db);
	    $b="SELECT count(*) as total FROM ".$db.".access WHERE userid=? and password= ?";
		$stmt = $conn->prepare($b);
		$stmt->bind_param("ss", $sql1,$sql2);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($total);
		$stmt->store_result();
		if($stmt->num_rows>0){
			$stmt->fetch();
			return $total;
		}
	}





	  
}




?>
