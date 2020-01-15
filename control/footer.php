
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © <?php print(date('Y'));?>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
      </footer>
    </div>
  </div>
</div>
  <script src="<?php print(SITELINK);?>control/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php print(SITELINK);?>control/vendors/js/vendor.bundle.addons.js"></script>
  <script src="<?php print(SITELINK);?>control/js/template.js"></script>
  <script src="<?php print(SITELINK);?>control/js/dashboard.js"></script>
  <script src="<?php print(SITELINK);?>control/js/data-table.js"></script>
  <script src="<?php print(SITELINK);?>jquery-1.11.1.min.js"></script>
  <script type="text/javascript">

    function readURL(input){
        if(input.files && input.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            $('#preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

   $(function (){
      $(document).on("click", ".fetchImg", function(){
        $('input[type=file]').click();
          readURL(this);

      });
    });

   $(function (){
      $(document).on("change", ".upImg", function(){
      readURL(this);
      $("#imgcontainer").show();
      });
    });
  $("#result").hide();

   $(function (){
      $(document).on("click", ".emp", function(){
        $imgURL = $(this).data('id');
        $localUrl = $(this).data('di');
        $('#preview2').attr('src', $localUrl);
        //alert($imgURL);
        $.ajax({
          type:'POST',
          url:'<?php print(SITELINK);?>query',
          data: {
            action: 'getImgDetails',
            imgURL : $imgURL
          },
          success: function (data){
            //alert(data);
            $res = JSON.parse(data);
            $("#gender").val($res.gender);
            $("#age").val($res.age);
            $("#emotion").val($res.emotion);
            $("#face_width").val($res.face_width);
            $("#face_height").val($res.face_height);
            $("#top").val($res.top);
            $("#left").val($res.left);
            $("#result").show();
          }
        });
      });
    });

     $(function (){
      $(document).on("click", ".dmp", function(){
        $id = $(this).data('id');
        $.ajax({
          type:'POST',
          url:'<?php print(SITELINK);?>query',
          data: {
            action: 'deleteUser',
            id : $id
          },
          success: function (data){
            window.location.replace('<?php print(SITELINK);?>userlogs');
          }
        });
      });
    });

  </script>
</body>
</html>
