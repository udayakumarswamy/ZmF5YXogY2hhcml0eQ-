<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['GalleryAdd'])) {
              $GalleryName = addslashes($_POST['GalleryName']);
              $GalleryDetails = addslashes($_POST['GalleryDetails']);
              $GalleryStatus = addslashes($_POST['GalleryStatus']);

              if ($GalleryName == '') {
                # code...
              } elseif ($GalleryDetails == '') {
                # code...
              } elseif ($GalleryStatus == '') {
                # code...
              } else {
                $gallery_sql = "INSERT INTO sw_galleries (`GalleryName`, `GalleryDetails`, `GalleryStatus`) VALUES ('".$GalleryName."', '".$GalleryDetails."', '".$GalleryStatus."')";
                $gallery_result = mysql_query($gallery_sql);
                if($gallery_result) {
                  $GalleryID = mysql_insert_id();
                  $url = "gallery-edit.php?GalleryID=".$GalleryID;
                  header('Location:'.$url);
                } else {
                  ?>
                  <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Gallery Adding Failed.
                  </div>
                  <?php
                }
              }
            }
          ?>
            <h2 class="page-header">Gallery Add New</h2>
            <form role="form" method="post">
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="GalleryName" id="GalleryName" placeholder="Enter Name"  >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Details</label>
                  <input class="form-control" placeholder="Gallery Details" name="GalleryDetails" id="GalleryDetails" >
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="GalleryStatus" id="Active" value="1" >Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="GalleryStatus" id="InActive" value="0" >InActive
                  </label>
              </div>
              <button type="submit" class="btn btn-default" name="GalleryAdd" id="GalleryAdd">Add</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>