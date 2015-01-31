<?php include "admin_header.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Galleries List</h1>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Details</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i= 1;
                        $gallery_sql = "SELECT GalleryID, GalleryName, GalleryDetails, GalleryStatus FROM sw_galleries";
                        $gallery_result = mysql_query($gallery_sql);
                        if(mysql_num_rows($gallery_result) > 0) {
                          while ($gallery_data = mysql_fetch_assoc($gallery_result)) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $gallery_data['GalleryName']; ?></td>
                              <td><?php echo $gallery_data['GalleryDetails']; ?></td>
                              <td class="center"><?php echo $result = ($gallery_data['GalleryStatus'] == '1' ) ? "Active" : "InActive"; ?></td>
                              <td class="center">
                                <a href="gallery-edit.php?GalleryID=<?php echo $gallery_data['GalleryID']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></a>
                                <a href="delete.php?GalleryID=<?php echo $gallery_data['GalleryID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
                              </td>
                            </tr>
                            <?php
                            $i++;
                          }
                        }
                      ?>
                      </tbody>
                  </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
<?php include "admin_footer.php"; ?>