<?php
include("inc/session.php");
session_destroy();
header('Location: index.php');
?>
