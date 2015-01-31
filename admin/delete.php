<?php
  ob_start();
  include "includes/admin_config.php";
  include "includes/admin_login_check.php";
?>
<?php
if (isset($_GET['AdminID'])) {
	$admin_sql = "DELETE FROM sw_admin WHERE AdminID = ".intval($_GET['AdminID']);
  $admin_result = mysql_query($admin_sql);
} elseif (isset($_GET['EventID'])) {
  $event_sql = "DELETE FROM sw_events WHERE EventID = ".intval($_GET['EventID']);
  $event_result = mysql_query($event_sql);
} elseif (isset($_GET['ImageID'])) {
	$filename =  "../uploads/".$_GET['ImageName'];
    unlink($filename);
  $image_sql = "DELETE FROM sw_images WHERE ImageID = ".intval($_GET['ImageID']);
  $image_result = mysql_query($image_sql);
} elseif (isset($_GET['GalleryID'])) {
    
    $images_sql = "SELECT * FROM sw_images WHERE GalleryID = ".intval($_GET['GalleryID']);
    $images_result = mysql_query($images_sql);
    
    while ($image = mysql_fetch_row($images_result)) {
        $filename =  "../uploads/".$image['ImageName'];
        unlink($filename);
    }

    $gallery_sql = "DELETE FROM sw_galleries WHERE GalleryID = ".intval($_GET['GalleryID']);
    $gallery_result = mysql_query($gallery_sql);

    $image_sql = "DELETE FROM sw_images WHERE GalleryID = ".intval($_GET['GalleryID']);
    $image_result = mysql_query($image_sql);
}

$url = $_SERVER['HTTP_REFERER'];
header("Location:".$url);
?>