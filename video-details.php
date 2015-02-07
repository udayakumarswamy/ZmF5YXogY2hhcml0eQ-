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
        <div class="head-banner-bar"><img src="images/banner2.jpg" alt="#" /></div>
    </div>
    <div class="container">
    <div class="page-title">Video</div>
    	
     <div class="image_grid">
    <?php
            $video_sql = "SELECT VideoID, VideoURL, VideoName, VideoStatus FROM sw_videos WHERE VideoID =".intval($_GET['VideoID']);
            $video_result = mysql_query($video_sql);
            if(mysql_num_rows($video_result) > 0) {
              $video_data = mysql_fetch_assoc($video_result);
                ?>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_data['VideoURL']; ?>" frameborder="0" allowfullscreen></iframe>
                <?php
              }
            ?>
    </div>   
        
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
