<?php include "admin_header.php"; ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <?php
            if(isset($_POST['GalleryUpdate'])) {
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
                $gallery_sql = "UPDATE sw_galleries SET  GalleryName='".$GalleryName."', GalleryDetails = '".$GalleryDetails."', GalleryStatus='".$GalleryStatus."' WHERE GalleryID =".intval($_GET['GalleryID']);
                $gallery_result = mysql_query($gallery_sql);
                if($gallery_result) {
                  ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      Gallery Updated Successfully.
                  </div>
                  <?php
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
          if (isset($_POST['submit'])) {
              $j = 0;     // Variable for indexing uploaded image.
              
              for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                // Loop to get individual element from the array
                $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
                $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
                $file_extension = end($ext); // Store extensions in the variable.
                $target_path = "../uploads/";     // Declaring Path for uploaded images.
                $ImageName = md5(uniqid()) . "." . $ext[count($ext) - 1];
                $target_path = $target_path . $ImageName;     // Set the target path with a new name of image.
                $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
                if (($_FILES["file"]["size"][$i] < 1000000) && in_array($file_extension, $validextensions)) {
                  if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {

                    $image_sql = "INSERT INTO sw_images (`GalleryID`, `ImageName`, `ImageStatus`) VALUES ('".intval($_GET['GalleryID'])."', '".$ImageName."', '1')";
                    mysql_query($image_sql);
                  // If file moved to uploads folder.
                    // echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                  } else {     //  If File Was Not Moved.
                    echo $j. ').<span id="error">please try again!.</span><br/><br/>';
                  }
                } else {     //   If File Size And File Type Was Incorrect.
                  echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }
              }
            }

            $gallery_sql = "SELECT GalleryID, GalleryName, GalleryDetails, GalleryStatus FROM sw_galleries WHERE GalleryID =".intval($_GET['GalleryID']);
            $gallery_result = mysql_query($gallery_sql);
            if(mysql_num_rows($gallery_result) > 0) {
              $gallery_data = mysql_fetch_assoc($gallery_result);
          ?>
            <h2 class="page-header">Edit Gallery </h2>
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="GalleryName" id="GalleryName" placeholder="Enter Name" value="<?=stripslashes($gallery_data['GalleryName'])?>" >
                  <p class="help-block"></p>
              </div>
              <div class="form-group">
                  <label>Details</label>
                  <input class="form-control" placeholder="Gallery Details" name="GalleryDetails" id="GalleryDetails" value="<?=stripslashes($gallery_data['GalleryDetails'])?>">
              </div>
              <div class="form-group">
                  <label>Status</label>
                  <label class="radio-inline">
                      <input type="radio" name="GalleryStatus" id="Active" value="1" <?php echo ($gallery_data['GalleryStatus'] == '1') ? "checked" : ""; ?>>Active
                  </label>
                  <label class="radio-inline">
                      <input type="radio" name="GalleryStatus" id="InActive" value="0" <?php echo ($gallery_data['GalleryStatus'] == '0') ? "checked" : ""; ?>>InActive
                  </label>
              </div>

              <button type="submit" class="btn btn-default" name="GalleryUpdate" id="GalleryUpdate">Update</button>
              <button type="reset" class="btn btn-default">Cancel</button>
          </form>



              <div>
              <?php
              $image_sql = "SELECT ImageID, ImageName, ImageStatus FROM sw_images WHERE GalleryID =".intval($_GET['GalleryID']);
            $image_result = mysql_query($image_sql);
            if(mysql_num_rows($image_result) > 0) {
              while ($image_data = mysql_fetch_assoc($image_result)) {
                ?>
                <div style="width:120px;float:left;">
                  <img src="../uploads/<?php echo $image_data['ImageName']; ?>" width="100px"><br />
                  <a href="delete.php?ImageName=<?php echo $image_data['ImageName']; ?>&ImageID=<?php echo $image_data['ImageID']; ?>" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                </div>
                <?php
              }
            }
              ?>
              </div>
              <div style="width:100%;clear:both">
          <form enctype="multipart/form-data" action="" method="post">
            First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 1000KB.
            <div id="filediv"><input name="file[]" type="file" id="file" multiple="multiple"/></div>
            <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
          </form>
          </div>
          <?php
            }
          ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include "admin_footer.php"; ?>