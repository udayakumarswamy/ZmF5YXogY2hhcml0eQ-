<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['VideoUpdate'])) {
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
                $video_sql = "UPDATE sw_videos SET VideoURL='".$VideoURL."', VideoName='".$VideoName."', VideoStatus='".$VideoStatus."' WHERE VideoID =".intval($_GET['VideoID']);
                $video_result = mysql_query($video_sql);
                if($video_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Video Updated Successfully.
                  </div>
                  <?php
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Video updating Failed.
                  </div>
                  <?php
                }
              }
            }

            $video_sql = "SELECT VideoID, VideoURL, VideoName, VideoStatus FROM sw_videos WHERE VideoID =".intval($_GET['VideoID']);
            $video_result = mysql_query($video_sql);
            if(mysql_num_rows($video_result) > 0) {
              $video_data = mysql_fetch_assoc($video_result);
              ?>
            <h2 class="page-header">Edit Video Details</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="VideoName" id="VideoName" placeholder="Enter Name" value="<?=stripslashes($video_data['VideoName'])?>" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Video ID</label>
                  <input class="form-control" placeholder="Video URL" name="VideoURL" id="VideoURL" value="<?=stripslashes($video_data['VideoURL'])?>">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="VideoStatus" id="Active" value="1" <?php echo ($video_data['VideoStatus'] == '1') ? "checked" : ""; ?>>Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="VideoStatus" id="InActive" value="0" <?php echo ($video_data['VideoStatus'] == '0') ? "checked" : ""; ?>>InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="VideoUpdate" id="VideoUpdate">Update</button>
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