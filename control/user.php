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
                      <h4 class="card-title">Registered Users</h4>
                      <div class="col-12 table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>User Identifier</th>
                            <th>Image</th>
                            <th></th>
                            <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sn=1;
                        $users = $query->fetch_users();
                        if(!empty($users)){ 
                          foreach($users as $user){ ?>
                        <tr>
                            <td><?php print($sn++);?></td>
                            <td><?php print(ucwords($user['label']));?></td>
                            <td><img src="<?php print($user['localUrl']);?>" style="width: 50px; height: 50px;"></td>
                            <td>
                              <button class="btn btn-outline-primary emp" data-di="<?php print($user['localUrl']);?>" data-id="<?php print($user['imgLink']);?>">
                                <i class="mdi mdi-account-search"></i>
                                View Details
                              </button>
                            </td>
                            <td>
                              <button class="btn btn-outline-danger dmp" data-id="<?php print($user['id']);?>" ><i class="mdi mdi-delete"></i></button>
                            </td>
                        </tr>
                      <?php } } ?>
                      </tbody>
                    </table>
                  </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="row flex-grow">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Users Analysis</h4>
                      <div id="result">
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