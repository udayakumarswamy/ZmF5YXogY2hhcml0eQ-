<?php include "admin_header.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Videos List</h1>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Video</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i= 1;
                        $video_sql = "SELECT VideoID, VideoURL, VideoName, VideoStatus FROM sw_videos";
                        $video_result = mysql_query($video_sql);
                        if(mysql_num_rows($video_result) > 0) {
                          while ($video_data = mysql_fetch_assoc($video_result)) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $video_data['VideoName']; ?></td>
                              <td><img src="http://img.youtube.com/vi/<?php echo $video_data['VideoURL']; ?>/default.jpg" ></td>
                              <td class="center"><?php echo $result = ($video_data['VideoStatus'] == '1' ) ? "Active" : "InActive"; ?></td>
                              <td class="center">
                                <a href="video-edit.php?VideoID=<?php echo $video_data['VideoID']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></a>
                                <a href="delete.php?VideoID=<?php echo $video_data['VideoID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
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