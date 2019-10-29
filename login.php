<?php include("plugins/data.php");session_start();if($_SESSION["logged_in"]==1){header('Location: dashboard.php');} if($_SERVER["REQUEST_METHOD"]=="POST"){ $y9vMOKX1DNiP=mysqli_real_escape_string($db,$_POST['benutzerusername2313']); $y9vMOKX1DNpP=mysqli_real_escape_string($db,$_POST['userpassword7346']);  $y9OMOKX1DNiP=md5($y9vMOKX1DNpP);  $y9jMOKX1DNiP="SELECT id FROM tsweb WHERE user = '$y9vMOKX1DNiP' and pass = '$y9OMOKX1DNiP'"; $y9vMOKX1DYiP=mysqli_query($db,$y9jMOKX1DNiP); $y9dMOKX1DNiP=mysqli_num_rows($y9vMOKX1DYiP); echo "."; if($y9dMOKX1DNiP==1){ $y9vMODX1DNiP=mysqli_query($db,"SELECT groupid FROM tsweb WHERE user ='$y9vMOKX1DNiP'");while($y9vMORX1DNiP=mysqli_fetch_object($y9vMODX1DNiP)){$y9vMOKg1DNiP=$y9vMORX1DNiP->groupid;} $ymvMOKX1DNiP=mysqli_query($db,"SELECT IMGFile FROM tsweb WHERE user ='$y9vMOKX1DNiP'");while($y9vMORX1DNiP=mysqli_fetch_object($ymvMOKX1DNiP)){$y9vMOKX1nNiP=$y9vMORX1DNiP->IMGFile;} $y9vvOKX1DNiP=mysqli_query($db,"SELECT name FROM tsweb WHERE user ='$y9vMOKX1DNiP'");while($y9vMORX1DNiP=mysqli_fetch_object($y9vvOKX1DNiP)){$y9vMO4X1DNiP=$y9vMORX1DNiP->name;} $_SESSION['groupid']="#".$y9vMOKg1DNiP; $y9vMzKX1DNiP=$_SESSION['groupid']; $_SESSION['IMG']=$y9vMOKX1nNiP; $y9vMOKF1DNiP="SELECT BotID FROM Botlist WHERE groupid = '$y9vMzKX1DNiP'"; $y9vMOKf1DNiP=mysqli_query($db,$y9vMOKF1DNiP); $y9vvOKX1DBiP=mysqli_num_rows($y9vMOKf1DNiP); $_SESSION['groupidex']=$y9vMOKg1DNiP; $_SESSION['logged_in']=1; $_SESSION['totalbots']=$y9vvOKX1DBiP; $_SESSION['username']=$y9vMO4X1DNiP; header("Location: dashboard.php");}else if($y9dMOKX1DNiP==0){ header("Location: login.php?login=failed");}}?>
<!DOCTYPE html>
<html lang="de">

<head>
    <title>TSRadioBot &middot; Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="assets/images/img-01.png" alt="IMG">
                </div>

                <form role="form" action="" method="post" class="login100-form validate-form">
                    <span class="login100-form-title">
						Loginvorgang
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Bitte gebe ein gültigen Benutzernamen an.">
                        <input class="input100" type="text" name="benutzerusername2313" placeholder="Benutzername">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Bitte gebe ein gültiges Passwort an.">
                        <input class="input100" type="password" name="userpassword7346" placeholder="Passwort">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
							Login
						</button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">
							Hast du dein
						</span>
                        <a class="txt2" href="index.php">
							Benutzername oder Passwort
						</a>
                        <span class="txt1">
                            vergessen?
                        </span>
                    </div>

                    <div class="text-center p-t-136">
                        <a class="txt2" href="register.php">
							Erstelle einen neuen Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/popper.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })

    </script>
    <script src="assets/js/main.js"></script>
    <?php
        //header("Location: wartung.php");
        if($_GET['login'] == "failed"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Fehler", "Du hast ein Falsches Passwort oder einen falschen Benutzernamen angegeben.", "error");</script>');
        } ?>

</body>
<footer>
    <i class="copyrightlogin"><a href="https://www.twitter.com/TSRadioDE">TSRadiobot.de </a> &copy; 2018 All rights reserved. Made with &hearts; by VariusDev & Hibiikiii</i>
</footer>

</html>
