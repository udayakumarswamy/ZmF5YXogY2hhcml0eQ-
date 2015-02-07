<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['VideoAdd'])) {
              $VideoName = addslashes($_POST['VideoName']);
              $VideoURL = addslashes($_POST['VideoURL']);
              $VideoStatus = addslashes($_POST['VideoStatus']);

              if ($VideoName == '') {
                # code...
              } elseif ($VideoURL == '') {
                # code...
              } elseif ($VideoStatus == '') {
                # code...
              } else {
                $video_sql = "INSERT INTO sw_videos (`VideoName`, `VideoURL`, `VideoStatus`) VALUES ('".$VideoName."', '".$VideoURL."', '".$VideoStatus."')";
                $video_result = mysql_query($video_sql);
                if($video_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Video Added Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Video Adding Failed.
                  </div>
                  <?php
                }
              }
            }
          ?>
            <h2 class="page-header"> Video Add New</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Video Name</label>
                  <input class="form-control" name="VideoName" id="VideoName" placeholder="Enter Name"  >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>URL</label>
                  <input class="form-control" name="VideoURL" id="VideoURL" placeholder="Enter URL"  >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="VideoStatus" id="Active" value="1" >Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="VideoStatus" id="InActive" value="0" >InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="VideoAdd" id="VideoAdd">Add</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>