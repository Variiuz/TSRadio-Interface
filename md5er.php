<?php
$passworttomd5=$_GET["crypt"];
$out = md5($passworttomd5);
echo("Passwort Hash: ".$out);
 ?>