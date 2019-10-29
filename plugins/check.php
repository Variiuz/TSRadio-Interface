<?php
session_start();
if($_SESSION["access_allowed"] != 1){
	header('Location: index.php');
}
?>
