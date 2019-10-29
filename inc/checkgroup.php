<?php 
include("session.php");
include("data.php");
$id = $_SESSION['groupid'];
if($id != "#1337"){
    header("Location: index.php");
}
?>
