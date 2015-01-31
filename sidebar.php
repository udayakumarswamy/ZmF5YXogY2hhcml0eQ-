<div class="rgt-bar-box">
	<div class="tit-box">News &amp; Events</div>
    <ul class="event-list">
    <?php
        $event_sql = "SELECT EventID, EventDate, EventName, EventStatus FROM sw_events WHERE EventStatus = '1' ORDER BY EventID DESC LIMIT 0,5";
        $event_result = mysql_query($event_sql);
        if(mysql_num_rows($event_result) > 0) {
            while ($event_data = mysql_fetch_assoc($event_result)) {
                ?>
    	<li><a href="#"><?php echo stripslashes($event_data['EventName']); ?></a><br>
        <span class="text">Event Held On <?php echo date("F j, Y", strtotime(stripslashes($event_data['EventDate']))); ?></span></li>
        <?php
    }
}
?>
        
   </ul>
    <div class="more1 margin"><a href="events.php">More...</a></div>
</div>
<div class="rgt-bar-box">
<div class="tit-box1">Videos</div>
	<div class="video-box"></div>
    <ul class="video-list">
    	<li><a href="#"><img src="images/portfolio2.jpg" alt="#"></a></li>
        <li><a href="#"><img src="images/portfolio2.jpg" alt="#"></a></li>
        <li><a href="#"><img src="images/portfolio2.jpg" alt="#"></a></li>
    </ul>
    <div class="more1 margin"><a href="gallery.php">More...</a></div>
</div>