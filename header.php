<?php include 'includes/config.php'; ?>
<div class="head-top-bar">
	<div class="logo"><a href="index.php"><img src="images/logo.png" alt="sagpwa" title="sagpwa"></a></div>
    <div class="top-rgt-pan">
    <div class="social-icon">
    	<div class="social-box"><a href="http://www.facebook.com" target="_blank"><img src="images/facebook.png" alt="facebook" title="facebook"></a></div>
        <div class="social-box"><a href="http://www.twitter.com" target="_blank"><img src="images/twitter.png" alt="twitter" title="twitter"></a></div>
        <div class="social-box"><a href="http://www.plus.google.com" target="_blank"><img src="images/google-plus.png" alt="google plus" title="google plus"></a></div>
        <div class="social-box"><a href="http://www.youtube.com.com" target="_blank"><img src="images/youtube.png" alt="youtube" title="youtube"></a></div>
        <div class="donate-box"><a href="donation.php">Donate Today!</a></div>
    </div>
    <ul class="nav">
    	<li><a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? "active" : ""; ?>">Home</a>|</li>
        <li><a href="about-us.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'about-us.php') ? "active" : ""; ?>">About Us</a>|</li>
        <li><a href="get-involved.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'get-involved.php') ? "active" : ""; ?>">Get Involved</a>|</li>
        <li><a href="gallery.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'gallery.php') ? "active" : ""; ?>">Gallery</a>|</li>
        <li><a href="events.php" class="<?php echo (basename($_SERVER['PHP_SELF']) == 'events.php') ? "active" : ""; ?>">Events</a>|</li>
        <li><a href="#" class="<?php echo (basename($_SERVER['PHP_SELF']) == '#') ? "active" : ""; ?>">Contact Us</a></li>
    </ul>
    </div>
</div>