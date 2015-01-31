<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['EventAdd'])) {
              $EventDate = date('Y-m-d', strtotime(addslashes($_POST['EventDate'])));
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
                $event_sql = "INSERT INTO sw_events (`EventDate`, `EventName`, `EventDetails`, `EventStatus`) VALUES ('".$EventDate."', '".$EventName."', '".$EventDetails."', '".$EventStatus."')";
                $event_result = mysql_query($event_sql);
                if($event_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Event Added Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Event Adding Failed.
                  </div>
                  <?php
                }
              }
            }
          ?>
            <h2 class="page-header">Event Add New</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Date</label>
                  <input class="form-control" name="EventDate" id="EventDate" placeholder="Enter Date"  >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="EventName" id="EventName" placeholder="Enter Name"  >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Details</label>
                  <input class="form-control" placeholder="EventDetails" name="EventDetails" id="EventDetails" >
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="EventStatus" id="Active" value="1" >Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="EventStatus" id="InActive" value="0" >InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="EventAdd" id="EventAdd">Add</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>