<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['AdminUpdate'])) {
              $AdminName = addslashes($_POST['AdminName']);
              $AdminEmail = addslashes($_POST['AdminEmail']);
              $AdminPassword = addslashes($_POST['AdminPassword']);
              $ConfirmPassword = addslashes($_POST['ConfirmPassword']);
              $AdminStatus = addslashes($_POST['AdminStatus']);

              if($AdminName == '') {

              } elseif ($AdminEmail == '') {
                # code...
              } elseif ($AdminPassword == '' || $AdminPassword != $ConfirmPassword) {
                # code...
              } elseif ($AdminStatus == '') {
                # code...
              } else {
                $admin_sql = "UPDATE sw_admin SET AdminName='".$AdminName."', AdminEmail='".$AdminEmail."', AdminPassword = '".sha1($AdminPassword)."', AdminStatus='".$AdminStatus."' WHERE AdminID =".intval($_GET['AdminID']);
                $admin_result = mysql_query($admin_sql);
                if($admin_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Admin Updated Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Admin updating Failed.
                  </div>
                  <?php
                }
              }
            }

            $admin_sql = "SELECT AdminID, AdminName, AdminEmail, AdminStatus FROM sw_admin WHERE AdminID =".intval($_GET['AdminID']);
            $admin_result = mysql_query($admin_sql);
            if(mysql_num_rows($admin_result) > 0) {
              $admin_data = mysql_fetch_assoc($admin_result);
              ?>
            <h2 class="page-header">Edit Admin Details</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="AdminName" id="AdminName" placeholder="Enter Name" value="<?=stripslashes($admin_data['AdminName'])?>" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Email-ID</label>
                  <input class="form-control" placeholder="Enter Email-ID" name="AdminEmail" id="AdminEmail" value="<?=stripslashes($admin_data['AdminEmail'])?>">
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
                      <input type="radio" name="AdminStatus" id="Active" value="1" <?php echo ($admin_data['AdminStatus'] == '1') ? "checked" : ""; ?>>Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="AdminStatus" id="InActive" value="0" <?php echo ($admin_data['AdminStatus'] == '0') ? "checked" : ""; ?>>InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="AdminUpdate" id="AdminUpdate">Update</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>


              <?php
            }
          ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>