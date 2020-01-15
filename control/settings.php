<?php
include('nav.php');
?>
<style type="text/css">
  img{
    border: 0;
  }
</style>
<?php
$msg="";
  if(isset($_POST['lpImg'])){
    $imglabel = $_POST['imglabel'];
    $image=$_FILES["file"]["name"];
    $size=$_FILES["file"]["size"]/1024;
    $temp=$_FILES["file"]["tmp_name"];
    if(empty($imglabel)){
      $msg = '<div class="alert alert-warning" role="alert">
      Provide an Image Label </div>';
    }elseif(empty($image)){
      $msg = '<div class="alert alert-warning" role="alert">
      Provide a valid image </div>';
    }else{
      $allowed = array('gif','png','jpg','jpeg');
      $ext=pathinfo($image, PATHINFO_EXTENSION);
      
        $location="tempFile/";
        $newImg=str_replace(" ","_",$imglabel);
        $tmp=explode(".",$image);
        $newfile=$newImg.'.'.end($tmp);
        $fileLink = '../'.$location.$newfile;
        move_uploaded_file($temp,$fileLink);

        $jsonLink = $query->getImageURL($fileLink,$imglabel);
        $query->insertUser($imglabel,$jsonLink,$location.$newfile);
        $msg = '<div class="alert alert-success" role="alert">
        New User Added </div>'; 
      
    }
  }
?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


            <div class="col-md-6 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Webcam Image</h4>
                      <p class="card-description">
                        Basic form layout
                      </p>
                      <form class="forms-sample">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>

        </div>
    </div>
</div>
</div>

<?php
include('footer.php');
?>