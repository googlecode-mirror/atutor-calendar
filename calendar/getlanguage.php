<?php
	define('AT_INCLUDE_PATH', '../../include/');
	require (AT_INCLUDE_PATH.'vitals.inc.php');
	$token = $_GET["token"];
	echo _AT( $token );
?>