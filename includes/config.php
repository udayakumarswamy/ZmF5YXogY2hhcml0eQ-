<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	$con = mysql_connect("localhost", "root", "");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	$db_selected = mysql_select_db("sagpwa",$con);
?>