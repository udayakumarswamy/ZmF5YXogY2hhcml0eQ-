<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['AdminAdd'])) {
              $AdminName = addslashes($_POST['AdminName']);
              $AdminEmail = addslashes($_POST['AdminEmail']);
              $AdminPassword = sha1(addslashes($_POST['AdminPassword']));
              $ConfirmPassword = sha1(addslashes($_POST['ConfirmPassword']));
              $AdminStatus = addslashes($_POST['AdminStatus']);

              if($AdminName == '') {

              } elseif ($AdminEmail == '') {
                # code...
              } elseif ($AdminPassword == '' && $AdminPassword != $ConfirmPassword) {
                # code...
              } elseif ($AdminStatus == '') {
                # code...
              } else {
                $admin_sql = "INSERT INTO sw_admin (`AdminName`, `AdminEmail`, `AdminPassword`, `AdminStatus`) VALUES ('".$AdminName."', '".$AdminEmail."', '".$AdminPassword."', '".$AdminStatus."')";
                $admin_result = mysql_query($admin_sql);
                if($admin_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Admin Added Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Admin Adding Failed.
                  </div>
                  <?php
                }
              }
            }
          ?>
            <h2 class="page-header">Admin Add New</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="AdminName" id="AdminName" placeholder="Enter Name" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Email-ID</label>
                  <input class="form-control" placeholder="Enter Email-ID" name="AdminEmail" id="AdminEmail">
              </div>
              <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Enter Password" name="AdminPassword" id="AdminPassword">
              </div>
              <div class="form-group">
                  <label>Re-Type Password</label>
                  <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPassword" id="ConfirmPassword">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="AdminStatus" id="Active" value="1" checked>Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="AdminStatus" id="InActive" value="0">InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="AdminAdd" id="AdminAdd">Add</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>