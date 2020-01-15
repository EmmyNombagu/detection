<?php
include('nav.php');
?>
<style type="text/css">
  img{
    border: 0;
  }
  .emp, .dmp{
    height: 35px;
  }
</style>
<?php
if(isset($_POST['login'])){
  $userid = $_POST['userid'];
  $password = $_POST['password'];
  if(empty($userid)){
    echo "<script> alert('Provide UserID') </script>";
  }elseif(empty($password)){
    echo "<script> alert('Provide Password') </script>";
  }else{
    $sp = $query->countAdmin($userid,$password);
    if($sp > 0){
      $_SESSION['user'] = $userid;
      header("location:".SITELINK."dashboard");
    }else{
      echo "<script> alert('Invalid Login Details') </script>";
    }
  }
}
?>
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-md-8 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Admin Login</h4>
                        <form method="post">
                          <div class="form-group">
                            <label>UserID</label>
                            <input id="userid" class="form-control" type="text" name="userid" placeholder="Enter UserID">
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                          </div>

                        <div class="row">
                          <div class="form-group">
                            <button class="btn btn-outline-success" name="login">
                              <i class="mdi mdi-key"></i>
                              Login
                            </button>
                          </div>
                        </div>
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