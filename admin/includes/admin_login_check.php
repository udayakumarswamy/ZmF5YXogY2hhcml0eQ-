<?php
	session_start();
	if(!isset($_SESSION['AdminID'])) {
		header("Location:admin_login.php");
	}
?>