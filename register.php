<?php
include("plugins/data.php");
session_start(); if ($_SESSION["logged_in"] == 1) { header('Location: dashboard.php'); }
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($db,$_POST['username1']);
        $mdpasswordlogin = mysqli_real_escape_string($db,$_POST['userpasswd1']);
        $mdpasswordlogin2 = mysqli_real_escape_string($db,$_POST['userpasswd2']);
        $mail = mysqli_real_escape_string($db,$_POST['emailholder']);
        
        
        $mdpassword = md5($mdpasswordlogin);
        $mdpassword2 = md5($mdpasswordlogin2);
        if($mdpassword != $mdpassword2){
          header("Location: register.php?f=DfE12");
            exit;
        }else{
            if(strlen($mdpasswordlogin) < 8){
                header("Location: register.php?f=DfE13");
                exit;
            }
        $sql = "SELECT id FROM tsweb WHERE user = '$username'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        echo ".";
        if ($count == 1) {
            header("Location: register.php?f=DfE34");
            exit;
        } else if ($count == 0) {
            $insert = mysqli_query($db,"INSERT INTO tsweb (wort, adder) VALUES ('$word','$adder')") or header('Location: ../wartung.php?status=failsql'); 
        }            
        }
        

    }
?>
    <!DOCTYPE html>
    <html lang="de">

    <head>
        <title>TSRadioBot &middot; Registrieren</title>
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
						Registrierungsvorgang
					</span>

                        <div class="wrap-input100 validate-input" data-validate="Bitte gebe ein gültigen Benutzernamen an.">
                            <input class="input100" type="text" name="username1" placeholder="Dein Benutzername">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Bitte gebe ein Passwort ein.">
                            <input class="input100" type="password" name="userpasswd1" placeholder="Passwort">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Bitte gebe ein Passwort ein.">
                            <input class="input100" type="password" name="userpasswd2" placeholder="Passwort wiederholen">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Bitte gebe eine gültige Email an.">
                            <input class="input100" type="email" name="emailholder" placeholder="Deine Email">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
							Registrieren
						</button>
                        </div>

                        <div class="text-center p-t-136">
                            <a class="txt2" href="index.php">
							Du hast bereits einen Account?
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
        if($_GET['f'] == "DfE12"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Fehler", "Die Passwörter stimmen nicht überein.", "error");</script>');
        }        if($_GET['f'] == "DfE13"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Fehler", "Das Passwort ist zu kurz (8 Zeichen Minimum)", "error");</script>');
        }        if($_GET['f'] == "DfE34"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Fehler", "Dieser Benutzername existiert bereits...", "error");</script>');
        }        if($_GET['step'] == "two"){
            header("Location: await.php?y=DgH4");
        } ?>

    </body>
    <footer>
        <i class="copyrightlogin"><a href="https://www.twitter.com/TSRadioDE">TSRadiobot.de </a> &copy; 2018 All rights reserved. Made with &hearts; by VariusDev & Hibiikiii</i>
    </footer>

    </html>
