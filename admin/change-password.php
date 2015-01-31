<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['UpdatePassword'])) {
              $OldPassword = sha1(addslashes($_POST['OldPassword']));
              $NewPassword = sha1(addslashes($_POST['NewPassword']));
              $ConfirmPassword = sha1(addslashes($_POST['ConfirmPassword']));

              if($OldPassword == '') {

              } elseif ($NewPassword == '' && $NewPassword != $ConfirmPassword) {
                # code...
              } else {
				  $admin_sql = "SELECT AdminID, AdminEmail, AdminPassword FROM ph_admin WHERE AdminID=".$_SESSION['AdminID'];
				  $admin_result = mysql_query($admin_sql);
				  $admin_data = mysql_fetch_assoc($admin_result);
				  if($admin_data['AdminPassword'] == $OldPassword) {
					  $password_sql = "UPDATE ph_admin SET AdminPassword = '".$NewPassword."' WHERE AdminID=".$_SESSION['AdminID'];
					  mysql_query($password_sql);
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Password successfully updated.
                  </div>
                  <?php
				  } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Invalid Old Password.
                  </div>
                  <?php
				  }
              }
            }
          ?>
            <h2 class="page-header">Change Password</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Old Password</label>
                  <input type="password" class="form-control" name="OldPassword" id="OldPassword" placeholder="Enter old password" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" placeholder="Enter new password" name="NewPassword" id="NewPassword">
              </div>
              <div class="form-group">
                  <label>Re-Type Password</label>
                  <input type="password" class="form-control" placeholder="Confirm Password" name="ConfirmPassword" id="ConfirmPassword">
              </div>
              <button type="submit" class="btn btn-default" name="UpdatePassword" id="UpdatePassword">Update Password</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>