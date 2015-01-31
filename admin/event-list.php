<?php include "admin_header.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Events List</h1>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>S.No</th>
                              <th>Date</th>
                              <th>Name</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i= 1;
                        $event_sql = "SELECT EventID, EventDate, EventName, EventStatus FROM sw_events";
                        $event_result = mysql_query($event_sql);
                        if(mysql_num_rows($event_result) > 0) {
                          while ($event_data = mysql_fetch_assoc($event_result)) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $event_data['EventDate']; ?></td>
                              <td><?php echo $event_data['EventName']; ?></td>
                              <td class="center"><?php echo $result = ($event_data['EventStatus'] == '1' ) ? "Active" : "InActive"; ?></td>
                              <td class="center">
                                <a href="event-edit.php?EventID=<?php echo $event_data['EventID']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></a>
                                <a href="delete.php?EventID=<?php echo $event_data['EventID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
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