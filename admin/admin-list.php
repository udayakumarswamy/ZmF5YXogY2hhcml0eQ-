<?php include "admin_header.php"; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admins List</h1>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>S.No</th>
                              <th>Name</th>
                              <th>Email ID</th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php
                        $i= 1;
                        $admin_sql = "SELECT AdminID, AdminName, AdminEmail, AdminStatus FROM sw_admin";
                        $admin_result = mysql_query($admin_sql);
                        if(mysql_num_rows($admin_result) > 0) {
                          while ($admin_data = mysql_fetch_assoc($admin_result)) {
                            ?>
                            <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $admin_data['AdminName']; ?></td>
                              <td><?php echo $admin_data['AdminEmail']; ?></td>
                              <td class="center"><?php echo $result = ($admin_data['AdminStatus'] == '1' ) ? "Active" : "InActive"; ?></td>
                              <td class="center">
                                <a href="admin-edit.php?AdminID=<?php echo $admin_data['AdminID']; ?>" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></a>
                                <a href="delete.php?AdminID=<?php echo $admin_data['AdminID']; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></a>
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