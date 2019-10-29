<?php 
include("session.php");
include("data.php");
$id = $_SESSION['groupid']; 
$out = ''; 
if($id == "#1337"){ 
    $out = ' <i class="material-icons" style="max-width: 80%;">verified_user</i>'; 
}?>
