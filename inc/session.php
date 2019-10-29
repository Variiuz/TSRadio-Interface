<?php
session_start();
if($_SESSION["logged_in"] != 1){
	header('Location: index.php');
}
if(isset($_SESSION['username'])){
    
}
?>
