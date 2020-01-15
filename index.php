<?php
	include('nav.php');
	$src = "http://media.pixlab.xyz/7472p5d65d231c5bb5.jpg";
	//$hub=array();
	//$logs = $query->getResult($src);
	
	//print_r($logs);
?>
<style type="text/css">
	.error{
		color: red;
		font-stretch: extra-condensed;
		font-family: "Arial Black";
	}
	.success{
		color: green;
		font-stretch: extra-condensed;
		font-family: "Arial Black";
	}
	#my_camera{
		width: 320;
		height: 240;
		border: 3px solid black;
	}
	#similar{
		height: 350px;
		border: 3px solid black;
	}
	#result{
		height: 350px;
		border: 3px solid red;
	}
</style>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                	<div class="row">
                		<div class="card col-4">
                			<div class="card-body">
                				<h4 class="card-title">Webcam Image</h4>
                				<form id="myAwesomeForm" method="post" enctype="multipart/form-data" >
                					<div class="row">
                				 		<div id="my_camera"></div>
                				 		<div id="results"></div>
                				 	</div>
                				 	<br/>
                				 	<span class="btn btn-outline-primary mr-2 takeShot">
                				 		<i class="mdi mdi-camera"></i>Take Snapshot
                				 	</span>
                				 	<br/>
                				 	<span class="btn btn-outline-primary mr-2 retake">
                				 		<i class="mdi mdi-camera"></i>Retake
                				 	</span>
                				 	<br/>
                				 	<span data-id="" class="btn btn-success mr-2 saveCam"><i class="mdi mdi-content-save"></i>Submit</span>
                				</form>
                			</div>
                		</div>

                		<div class="card col-4">
                			<div class="card-body">
                				<h4 class="card-title">Search Result</h4>
                				<div id="sdefault">
                					<img src="load2.gif" style="height:100%; width: 100%">
                					<h4>Processing...</h4>
                				</div>
                				<div id="sfail">
                					<div class="row">
                						<h1 class="error">
                							No Match Found! Kindly Step Out.
                						</h1>
                					</div>
                				</div>
                				<div id="sSuccess">
                					<div class="row">
                					<img src="gate.gif" style="height:100%; width: 100%">
                						<h1 class="success">
                							Welcome to Dunamis International Gospel Center 
                						</h1>
                					</div>
                				</div>
                			</div>
                			<br/>
                		</div>

                		<div class="card col-4">
                			<div class="card-body">
                				<h4 class="card-title">Match Analysis</h4>
                				<div id="rdefault">
                					<img src="load.gif" style="height:100%; width: 100%">
                					<h4>Processing...</h4>
                				</div>
                				<div id="rfail">
                					<div class="row">
                						<h1 class="error">
                							Error! No User Found
                						</h1>
                					</div>
                				</div>

			                      <div id="rSuccess">
			                        <div class="row">
			                          <div class="form-group col-12" align="center">
			                            <img id="preview2" style="width: 100px; height: 100px;">
			                          </div>
			                        </div>
			                        <div class="row">
			                          <div class="form-group col-6">
			                            <label>Gender</label>
			                            <input id="gender" class="form-control" type="text" name="" readonly="">
			                          </div>
			                          <div class="form-group col-6">
			                            <label>Age</label>
			                            <input id="age" class="form-control" type="text" name="" readonly="">
			                          </div>
			                        </div>
			                        <div class="row">
			                          <div class="form-group col-12" align="center">
			                           <label>Emotion</label>
			                            <input id="emotion" class="form-control" type="text" name="" readonly="">
			                          </div>
			                        </div>
			                        <div class="row">
			                          <div class="form-group col-6">
			                            <label>Face Width</label>
			                            <input id="face_width" class="form-control" type="text" name="" readonly="">
			                          </div>
			                          <div class="form-group col-6">
			                            <label>Face Height</label>
			                            <input id="face_height" class="form-control" type="text" name="" readonly="">
			                          </div>
			                        </div>
			                        <div class="row">
			                          <div class="form-group col-6">
			                            <label>Face Top</label>
			                            <input id="top" class="form-control" type="text" name="" readonly="">
			                          </div>
			                          <div class="form-group col-6">
			                            <label>Face Left</label>
			                            <input id="left" class="form-control" type="text" name="" readonly="">
			                          </div>
			                        </div>
			                      </div>
			                			</div>
			                			<br/>
			                		</div>

			                	</div>

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
      $(".saveCam").hide();
      $("#results").hide();

      $("#rfail").hide();
      $("#rSuccess").hide();

      $("#sfail").hide();
      $("#sSuccess").hide();

      $("#sdefault").hide();
      $("#rdefault").hide();

	  Webcam.set({
	  	width: 320,
	  	height: 240,
	  	image_format: 'jpeg',
	  	jpeg_quality: 90
	  });

	  Webcam.attach('#my_camera');

	  $(function (){
	  	$(document).on("click", ".takeShot", function(){
	  		$(".saveCam").show();
	  		// take snapshot and get image data
	  		Webcam.snap( function(data_uri) {
	  			// display results in page
	  			$("#my_camera").hide();
	  			$("#results").html('<img src="'+data_uri+'"/>');
	  			$("#results").show();
	  			$(".retake").show();
	  			$(".takeShot").hide();
	  			ImageURL  = data_uri;
	  			$(".saveCam").data('id',data_uri);
	  			
	  			/**$("#myAwesomeForm").submit(function(e){
	  				e.preventDefault();
	  				appendFileAndSubmit(data_uri);
	  			});**/
	  		});
	  	});
	  });

	$(function (){
	  	$(document).on("click", ".retake", function(){
	  		$(".saveCam").hide();
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

	$(function (){
	  	$(document).on("click", ".saveCam", function(){
	       	$("#sdefault").show();
      		$("#rdefault").show();

      		$("#rSuccess").hide();
      		$("#sSuccess").hide();
      		$("#rfail").hide();
      		$("#sfail").hide();
	//function appendFileAndSubmit(){
		var ImageURL = $(this).data('id');
		//alert($imgL);
		var form = document.getElementById("myAwesomeForm");
		var block = ImageURL.split(";");
		var contentType = block[0].split(":")[1];
		var realData = block[1].split(",")[1];
		var blob = b64toBlob(realData, contentType);
		var fd = new FormData(form);
		fd.append("image", blob);
		$.ajax({
			url:"<?php print(SITELINK);?>compare",
			data: fd,
			type:"POST",
			contentType:false,
			processData:false,
			cache:false,
	       success:function(data){
	       	$res2 = JSON.parse(data);
	        //alert($res2.stat);
	         setTimeout(function(){	
	         	$("#sdefault").hide();
		      	$("#rdefault").hide();                                           
			       	
			        if($res2.stat =='1'){
			        	$("#rSuccess").show();
			        	$("#sSuccess").show();
			        	$.ajax({
			        		type:'POST',
			        		url:'<?php print(SITELINK);?>query',
			        		data: {
			        			action: 'getImgDetails',
			        			imgURL : $res2.msg
			        		},
			        		success: function (data){
			        			//alert(data);
				            $res = JSON.parse(data);
				            $('#preview2').attr('src', $res2.msg);
				            $("#gender").val($res.gender);
				            $("#age").val($res.age);
				            $("#emotion").val($res.emotion);
				            $("#face_width").val($res.face_width);
				            $("#face_height").val($res.face_height);
				            $("#top").val($res.top);
				            $("#left").val($res.left);
				            //$("#result").show();
				        }
				    });
			        }else{
			        	$("#rfail").show();
			        	$("#sfail").show();
			        }
			    }, 5500);
	       },
		});
	});
	  });


 </script>


<?php
	include('control/footer.php');
?>