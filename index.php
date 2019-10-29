<?php
session_start();
if($_SESSION["logged_in"] != 1){
	$_SESSION["logged_in"] = 0;
	header('Location: login.php');
}else {
    header('Location: dashboard.php');
}
?>
