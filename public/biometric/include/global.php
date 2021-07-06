<?php
	/*ini_set("display_errors", 0);
	error_reporting(0);*/

	$base_path		= "http://localhost/votingapp/public/biometric/";
	$db_name		= "votingapp";
	$db_user		= "root";
	$db_pass		= "";
	$db_host		= "localhost";
	$time_limit_reg = "20";
	$time_limit_ver = "13";

	$conn = mysqli_connect($db_host, $db_user, $db_pass);
	if (!$conn) die("Connection for user $db_user refused!");
	mysqli_select_db($conn, $db_name) or die("Can not connect to database!");
?>