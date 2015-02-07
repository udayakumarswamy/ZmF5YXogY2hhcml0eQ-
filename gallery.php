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
    <div class="page-title">Gallery</div>
    	
     <div class="image_grid">
    <ul class="da-thumbs"><?php
            $gallery_sql = "SELECT g.GalleryID, g.GalleryName, i.ImageName FROM sw_galleries g, sw_images i WHERE g.GalleryID = i.GalleryID AND GalleryStatus ='1' GROUP BY i.GalleryID ORDER BY GalleryID DESC";
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
    
    
    <div class="page-title">Videos</div>
    	
     <div class="image_grid">
    <ul class="da-thumbs"><?php
            $video_sql = "SELECT VideoID, VideoURL, VideoName, VideoStatus FROM sw_videos";
            $video_result = mysql_query($video_sql);
            if(mysql_num_rows($video_result) > 0) {
                while ($video_data = mysql_fetch_assoc($video_result)) {
                  ?>
                <li>
                    <img src="http://img.youtube.com/vi/<?php echo $video_data['VideoURL']; ?>/mqdefault.jpg" alt="portfolio" width="100%">
                    <article class="da-animate da-slideFromRight" style="display: block;">
                        <h3><a href="video-details.php?VideoID=<?php echo $video_data['VideoID']; ?>"><?php echo $video_data['VideoName']; ?></a></h3>
                    </article>
                </li>
                <?php
              }
            }
            ?>
    </ul>
    </div>
        
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
