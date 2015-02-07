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
<?php
            $video_sql = "SELECT VideoID, VideoURL, VideoName, VideoStatus FROM sw_videos";
            $video_result = mysql_query($video_sql);
            if(mysql_num_rows($video_result) > 0) {
                $video_data = mysql_fetch_assoc($video_result);
                ?>	<div class="video-box"><a href="video-details.php?VideoID=<?php echo $video_data['VideoID']; ?>"><img src="http://img.youtube.com/vi/<?php echo $video_data['VideoURL']; ?>/mqdefault.jpg" style="    width: 100%;    height: 100%;"></a></div>
    <ul class="video-list">
<?php                while ($video_data = mysql_fetch_assoc($video_result)) {
                    ?> <li><a href="video-details.php?VideoID=<?php echo $video_data['VideoID']; ?>"><img src="http://img.youtube.com/vi/<?php echo $video_data['VideoURL']; ?>/default.jpg" ></a></li> <?php
                }
            }
?>
    </ul>
    <div class="more1 margin"><a href="gallery.php">More...</a></div>
</div>