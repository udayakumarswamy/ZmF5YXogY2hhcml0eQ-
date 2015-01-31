<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['EventUpdate'])) {
              $EventDate = addslashes($_POST['EventDate']);
              $EventName = addslashes($_POST['EventName']);
              $EventDetails = addslashes($_POST['EventDetails']);
              $EventStatus = addslashes($_POST['EventStatus']);

              if($EventDate == '') {

              } elseif ($EventName == '') {
                # code...
              } elseif ($EventDetails == '') {
                # code...
              } elseif ($EventStatus == '') {
                # code...
              } else {
                $event_sql = "UPDATE sw_events SET EventDate='".$EventDate."', EventName='".$EventName."', EventDetails = '".$EventDetails."', EventStatus='".$EventStatus."' WHERE EventID =".intval($_GET['EventID']);
                $event_result = mysql_query($event_sql);
                if($event_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Event Updated Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Event updating Failed.
                  </div>
                  <?php
                }
              }
            }

            $event_sql = "SELECT EventID, EventDate, EventName, EventDetails, EventStatus FROM sw_events WHERE EventID =".intval($_GET['EventID']);
            $event_result = mysql_query($event_sql);
            if(mysql_num_rows($event_result) > 0) {
              $event_data = mysql_fetch_assoc($event_result);
              ?>
            <h2 class="page-header">Edit Event Details</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Date</label>
                  <input class="form-control" name="EventDate" id="EventDate" placeholder="Enter Date" value="<?=stripslashes($event_data['EventDate'])?>" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="EventName" id="EventName" placeholder="Enter Name" value="<?=stripslashes($event_data['EventName'])?>" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Details</label>
                  <input class="form-control" placeholder="EventDetails" name="EventDetails" id="EventDetails" value="<?=stripslashes($event_data['EventDetails'])?>">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="EventStatus" id="Active" value="1" <?php echo ($event_data['EventStatus'] == '1') ? "checked" : ""; ?>>Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="EventStatus" id="InActive" value="0" <?php echo ($event_data['EventStatus'] == '0') ? "checked" : ""; ?>>InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="EventUpdate" id="EventUpdate">Update</button>
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