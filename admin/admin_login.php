<?php
  ob_start();
  session_start();
  if(isset($_SESSION['AdminID'])) {
    header("Location:index.php");
  }
  include "includes/admin_config.php";

  if(isset($_POST['LoginSubmit'])) {
    $AdminEmail = addslashes($_POST['AdminEmail']);
    $AdminPassword = sha1(addslashes($_POST['AdminPassword']));

    if($AdminEmail != '' && $AdminPassword != '') {

      $login_sql = "SELECT AdminID, AdminName, AdminEmail, AdminStatus FROM sw_admin WHERE AdminEmail = '".$AdminEmail."' AND AdminPassword='".$AdminPassword."'";
      $login_result = mysql_query($login_sql);
      if(mysql_num_rows($login_result) == 1) {
        $login_data = mysql_fetch_assoc($login_result);
        if($login_data['AdminStatus'] == '1') {
          $_SESSION['AdminID'] = $login_data['AdminID'];
          $_SESSION['AdminEmail'] = $login_data['AdminEmail'];
          header("Location:index.php");
        } else {
          $result = "You are temporarly blocked, please contact administrator.";
        }
      } else {
        $result = "Invalid Email / Password";
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sagpwa admin login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                      <?php 
                      if($result != '') {
                        ?>
                      <div class="alert alert-danger alert-dismissable">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $result; ?>
                      </div>
                          <?php
                      }
                      ?>
                        <form role="form" name="admin_login" id="admin_login" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="AdminEmail" id="AdminEmail" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="AdminPassword" id="AdminPassword" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="LoginSubmit" id="LoginSubmit" value="Login" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
    $('#admin_login').validate({ // initialize the plugin
        rules: {
            AdminEmail: {
                required: true,
                email: true                
            },
            AdminPassword: {
                required: true,
                minlength: 6,
                maxlength: 60
            }
        },
    });
});
</script>
</body>

</html>
