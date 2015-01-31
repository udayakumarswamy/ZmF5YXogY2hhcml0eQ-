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
            $image_sql = "SELECT ImageID, ImageName, ImageStatus FROM sw_images WHERE GalleryID =".intval($_GET['GalleryID']);
            $image_result = mysql_query($image_sql);
            if(mysql_num_rows($image_result) > 0) {
              while ($image_data = mysql_fetch_assoc($image_result)) {
                ?>
                <li>
                    <img src="uploads/<?php echo $image_data['ImageName']; ?>" width="100%" alt="portfolio">
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
