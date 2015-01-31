<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>
<div id="main-wrap">
	<div class="header">
    	<?php include 'header.php'; ?>
        <div class="head-banner-bar"><img src="images/banner2.jpg" alt="#" /></div>
    </div>
    <div class="container">
        <?php
            $event_sql = "SELECT EventID, EventDate, EventName, EventDetails FROM sw_events WHERE EventID = '".intval($_GET['EventID'])."'";
            $event_result = mysql_query($event_sql);
            if(mysql_num_rows($event_result) > 0) {
                while ($event_data = mysql_fetch_assoc($event_result)) {
                    ?>
        <div class="page-title"><?php echo stripslashes($event_data['EventName']); ?></div>
    	<div class="left-pan">
            <div class="events">
               <div class="event-date-box"><?php echo date("F j, Y", strtotime(stripslashes($event_data['EventDate']))); ?></div>
            </div>
               <div class="events"><?php echo stripslashes($event_data['EventDetails']); ?></div>
        </div>
        <?php
                }
            }

        ?>
        <div class="rgt-pan">
        	<?php include 'sidebar.php'; ?>
        </div>
        
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
