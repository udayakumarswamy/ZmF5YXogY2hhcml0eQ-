<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-v1.7.1.js"></script>
<script type="text/javascript" src="js/jquery-hover-effect.js"></script>
<script type="text/javascript">
//Image Hover
jQuery(document).ready(function(){
jQuery(function() {
	jQuery('ul.da-thumbs > li').hoverdir();
});
});
</script>
</head>

<body>
<div id="main-wrap">
	<div class="header">
    	<?php include 'header.php'; ?>
        <div class="clear"></div>
      <div class="head-banner-bar"><img src="images/banner.jpg" alt="#" /></div>
    </div>
    <div class="container">
    <?php
        $event_sql = "SELECT EventID, EventDate, EventName, EventStatus FROM sw_events WHERE EventStatus = '1' ORDER BY EventID DESC LIMIT 1";
        $event_result = mysql_query($event_sql);
        if(mysql_num_rows($event_result) > 0) {
            $event_data = mysql_fetch_assoc($event_result);
                ?>
    	<div class="event-box">
        	<div class="event-tit"><span class="next">Next</span>UPCOMING EVENT</div>
            <div class="event-name"><a href="#"><?php echo stripslashes($event_data['EventName']); ?></a><br /><span class="event-date"><?php echo date("F j, Y", strtotime(stripslashes($event_data['EventDate']))); ?></span></div>
            <div class="event-time-disply">
            	<div class="time">
            		<div class="time-box">0</div>
                    <div class="days">days</div>
                </div>
                <div class="time">
            		<div class="time-box">7</div>
                    <div class="days">hours</div>
                </div>
                <div class="time">
            		<div class="time-box">8</div>
                    <div class="days">mins</div>
                </div>
                <div class="time">
            		<div class="time-box">6</div>
                    <div class="days">sec</div>
                </div>
            </div>
            <div class="all-events"><a href="events.php">All Events</a></div>
      </div>
      <?php  } ?>
        <div class="introduction-box">
        	<div class="sml-tit">Welcome To</div>
        	<div class="title"><span>Sports And General People Welfare Association</span></div>
          <div class="content"><p>Sports and General Power Welfare Association (SAGPWA) is a voluntary social service organization registered under societies registration Act XXI of 1860 in the year 2000 vide registration No.19 of 2000 dated 03.02.2000 at Machilipatnam District Registrar’s office. </p>
            <div class="more"><a href="about-us.html">Read more...</a></div>
            </div>
        </div>
        <div class="home-glr-box">
         <div class="glr-tit">Gallery</div>
        	<div class="image_grid">
            <ul class="da-thumbs">
            <?php
            $gallery_sql = "SELECT g.GalleryID, g.GalleryName, i.ImageName FROM sw_galleries g, sw_images i WHERE g.GalleryID = i.GalleryID AND GalleryStatus ='1' GROUP BY i.GalleryID ORDER BY GalleryID DESC LIMIT 0,6";
            $gallery_result = mysql_query($gallery_sql);
            if(mysql_num_rows($gallery_result) > 0) {
              while ($gallery_data = mysql_fetch_assoc($gallery_result)) {
                ?>
                <li>
                    <img src="uploads/<?php echo $gallery_data['ImageName']; ?>" alt="portfolio" width="100%">
                    <article class="da-animate da-slideFromRight" style="display: block;">
                        <h3><a href="gallery-details.php?GalleryID=<?php echo $gallery_data['GalleryID']; ?>"><?php echo $gallery_data['GalleryName']; ?></a></h3>
                    </article>
                </li>
                <?php
              }
            }
            ?>
    </ul>
    </div>
            <div class="more1"><a href="gallery.php">More...</a></div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
