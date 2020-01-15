<?php
include('nav.php');
?>
<style type="text/css">
  img{
    border: 0;
  }
  #my_camera{
 width: 100%;
 height: 240px;
 border: 1px solid black;
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
                      <?php print($msg);?>
                      <h4 class="card-title">Image Upload</h4>
                      <form class="forms-sample" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Image Label</label>
                          <input type="text" class="form-control" name="imglabel" id="exampleInputEmail1" placeholder="Image Label (Name, Phone, Tag etc)">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Image</label>
                          <img id="preview" style="width: 150px; height: 150px;" border="0px">
                          <input type="file" name="file" style="display: none;" class="upImg">
                          <span class="btn btn-outline-primary fetchImg">
                            <i class="mdi mdi-image"></i> Browse Image
                          </span>
                          <span id="filename"></span>

                        </div>
                        <button name="lpImg" class="btn btn-success mr-2"><i class="mdi mdi-content-save"></i>Submit</button>
                      </form>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Webcam Image</h4>
                      <form id="myAwesomeForm" action="savecamera.php" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                          <label for="exampleInputEmail1">Image Label</label>
                          <input type="type" class="form-control" id="imageLabel" name="imageLabel" placeholder="Enter Image Label">
                        </div>
                      <div id="my_camera"></div>
                      <br/>
                      <div id="results"></div>
                      <span class="btn btn-outline-primary mr-2 takeShot">
                        <i class="mdi mdi-camera"></i>Take Snapshot</span>
                      <br/>
                      <span class="btn btn-outline-primary mr-2 retake">
                        <i class="mdi mdi-camera"></i>Retake</span>
                      <br/>
                        <button type="submit" class="btn btn-success mr-2 saveCam"><i class="mdi mdi-content-save"></i>Submit</button>
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
<script type="text/javascript" src="<?php print(SITELINK);?>webcamjs/webcam.min.js"></script>
  <script src="<?php print(SITELINK);?>jquery-1.11.1.min.js"></script>
<script type="text/javascript">
      $(".retake").hide();
      $("#results").hide(); 
  Webcam.set({
  width: 320,
  height: 240,
  image_format: 'jpeg',
  jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

$(function (){
  $(document).on("click", ".takeShot", function(){
    // take snapshot and get image data
    Webcam.snap( function(data_uri) {
      // display results in page
      $("#my_camera").hide();
      $("#results").html('<img src="'+data_uri+'"/>');
      $("#results").show(); 
      $(".retake").show(); 
      $(".takeShot").hide();

     $("#myAwesomeForm").submit(function(e){
       e.preventDefault();
       appendFileAndSubmit(data_uri);
      });

    });

  });
});

$(function (){
  $(document).on("click", ".retake", function(){
      $("#my_camera").show();
      $("#results").hide(); 
      $(".retake").hide(); 
      $(".takeShot").show();
    })
});


 function b64toBlob(b64Data, contentType, sliceSize) {
  contentType = contentType || '';
  sliceSize = sliceSize || 512;
  var byteCharacters = atob(b64Data);
  var byteArrays = [];
  for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
    var slice = byteCharacters.slice(offset, offset + sliceSize);
    var byteNumbers = new Array(slice.length);
    for (var i = 0; i < slice.length; i++) {
      byteNumbers[i] = slice.charCodeAt(i);
    }
    var byteArray = new Uint8Array(byteNumbers);
    byteArrays.push(byteArray);
  }
  var blob = new Blob(byteArrays, {type: contentType});
  return blob;
 }

 function appendFileAndSubmit(ImageURL){
    var form = document.getElementById("myAwesomeForm");
    var block = ImageURL.split(";");
    var contentType = block[0].split(":")[1];
    var realData = block[1].split(",")[1];
    var blob = b64toBlob(realData, contentType);
    var fd = new FormData(form);
    fd.append("image", blob);
    $.ajax({
       url:"<?php print(SITELINK);?>saveImage",
       data: fd,
       type:"POST",
       contentType:false,
       processData:false,
       cache:false, 
       error:function(err){
        console.error(err);
       },
       success:function(data){
        $("#imglabel").val('');
        alert(data);

       },
       complete:function(){
        console.log("Request finished.");
       }
      });
 }

</script>
<?php
include('footer.php');
?>