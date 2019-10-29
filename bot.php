<?php 
include("inc/session.php");
include("plugins/data.php");
$name = $_SESSION['username'];
$groupid = $_SESSION['groupid'];
$groupdex = $_SESSION['groupidreal'];
$botid = null;
$port = null;
$ipchange = null;
$outer = null;
if(!isset($_GET['p'])){
if(isset($_POST['bot'])){
    $botid = $_POST['bot'];
}else { header("Location: bots.php?request=failed"); }
if(isset($_POST['port'])){
    $port = $_POST['port'];
}else { header("Location: bots.php?request=failed"); }
}else {
    $port = $_GET['p'];
    $botid = $_GET['id'];
    if($botid == null){
       header("Location: bots.php?request=failed"); 
    }
    if($port == null){
        header("Location: bots.php?request=failed");
    }
     $ee = mysqli_query($db, "SELECT groupid FROM Botlist WHERE BotID ='$botid'");
    while($row = mysqli_fetch_object($ee)){
        $ori = $row->groupid;
    }
if($ori != $groupid){
    header("Location: bots.php?request=botnotgroup");
    exit;
}
    
}


$botname = null;
$system = null;
$address = null;
$portbot = null;
                   $a = mysqli_query($db, "SELECT System FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($a)){ $system = $row->System; }
                   $b = mysqli_query($db, "SELECT Port FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($b)){ $port = $row->Port; }
                   $c = mysqli_query($db, "SELECT UiD FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($c)){ $uid = $row->UiD; }
                   $g = mysqli_query($db, "SELECT ServerPWD FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($g)){ $serverpassword = $row->ServerPWD; }
                   $e = mysqli_query($db, "SELECT BotName FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($e)){ $botname = $row->BotName; }
                   $f = mysqli_query($db, "SELECT DefaultChannel FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($f)){ $defaultchannel = $row->DefaultChannel; }
                   $d = mysqli_query($db, "SELECT IP FROM Botlist WHERE BotID ='$botid'"); while($row = mysqli_fetch_object($d)){ $address = $row->IP; }
 $z = mysqli_query($db, "SELECT BotID FROM Botlist WHERE BotID ='$botid'");
    while($row = mysqli_fetch_object($z)){
        $bot = $row->BotID;
    }
    if(!isset($bot)){
        header("Location: bots.php?request=nobot");
    }
    $e = mysqli_query($db, "SELECT Port FROM Botlist WHERE BotID ='$botid'");
    while($row = mysqli_fetch_object($e)){
        $portbot = $row->Port;
    }
    if($port != $portbot){
        header("Location: bots.php?request=noport");
    }


$outer = 'Status: <span class="badge badge-warning">Unbekannt</span>'; $ipadress = strtolower($system).".tsradiobot.de"; $fp = fsockopen($ipadress, $port, $errno, $errstr, 30); if (!$fp) { $outer = 'Status: <span class="badge badge-danger">Offline</span>';$offline = 1; } else { $outer = 'Status: <span class="badge badge-success">Online</span>';$offline = 0; }
?>
<!doctype html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link href="assets/css/tables.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link href="assets/dist/admin4b.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/dist/admin4b-highlight.min.css" rel="stylesheet">
    <link href="assets/dist/style-add.css" rel="stylesheet">
    <title>TSRadio &middot Bot
        <?php echo $botid; ?>
    </title>
</head>

<body>
    <div class="app">
        <div class="app-body">
            <div class="app-sidebar sidebar-dark sidebar-slide-left">
                <div class="text-right">
                    <button type="button" class="btn btn-sidebar" data-dismiss="sidebar">
      <span class="x"></span>
    </button>
                </div>
                <div class="sidebar-header">
                    <?php echo '<img src="assets/upload/'.$_SESSION['IMG'].'" class="user-photo" alt="Kein Profilfoto gefunden">'; ?>
                    <p class="username">
                        <?php 
                            include("inc/verifer.php");
                            echo $name.$out;
                            echo '<br /><small>'.$groupid.'</small>';
                            ?>
                    </p>
                </div>
                <div id="sidebar-nav" class="sidebar-nav" data-children=".sidebar-nav-group">
                    <a href="dashboard.php" class="sidebar-nav-link">
      <i class="material-icons">dashboard</i> Dashboard
    </a>
                    <div class="sidebar-nav">
                        <a href="bots.php" class="sidebar-nav-link">
        <i class="material-icons">format_list_bulleted</i> Musikbots
      </a>
                    </div>
                    <?php
                        if($groupid == "#1337"){
                            echo '<div class="sidebar-nav">';
                            echo '<a href="botcontrol.php" class="sidebar-nav-link">';
                            echo '<i class="material-icons">queue</i> Bot Control';
                            echo '</a>';
                            echo '</div>';
                        }
                    ?>



                </div>
                <div class="sidebar-footer">
                    <a href="email.php?v=fehlermelden&data=frmn" data-toggle="tooltip" title="Fehler melden">
      <i class="material-icons">bug_report</i>
    </a>
                    <a href="profile.php" data-toggle="tooltip" title="Account Einstellungen">
      <i class="material-icons">settings</i>
    </a>
                    <a href="logout.php" data-toggle="tooltip" title="Ausloggen">
      <i class="material-icons">power_settings_new</i>
    </a>
                </div>
                <hr />
            </div>

            <div class="app-content">
                <nav class="navbar navbar-expand navbar-light bg-white">
                    <button type="button" class="btn btn-sidebar" data-toggle="sidebar">
    <i class="fa fa-bars"></i>
  </button>
                    <div class="navbar-brand">
                        TSRadio &middot Bot
                        <?php echo $botid; ?>
                    </div>
                </nav>


                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="bots.php">Bots</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bot Interface </li>
                    </ol>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                            <div class="white-box">
                                <h5 class="text-muted vb" style="font-size: 25px;"><i class="material-icons">library_music</i> Bot Informationen</h5>
                                <span id="state"><?php echo $outer; ?></span>
                                <span> ● IPAdresse: <?php echo '<a href="ts3server://'.$address.'">'.urldecode($address).'</a>'; ?></span><br />
                                <span>Nickname: <?php echo $botname; ?></span>
                                <span> ● ID: <?php echo $botid; ?></span><br />
                                <?php 
 if($system=='DE-3'){ $s= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-3">DE-3</a>'; } if($system=='DE-2'){ $s= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-2">DE-2</a>'; } if($system=='DE-1'){ $s= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-1">DE-1</a>'; }
                                                                        if($system=='FR-1'){
                                            $s= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/France-icon.png" alt="IMG" /> <a href="status.php?node=de-1">FR-1</a>';     
                                        }
                                ?>
                                <span>Host: <?php echo $s ?></span>
                                <?php
    if($defaultchannel != ""){
        echo '<span> ● DefaultChannel:  '.$defaultchannel.'</span>';
    }
                                
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <div class="white-box">
                                <h1>Namen ändern</h1>
                                <?php
                                echo '<div class="form-bottom">
                                <form role="form" action="api.php?request=namechange&from=botuser" method="post" class="input-form">
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="id" value='.$botid.'>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-text">Botname</label>
                                        <input type="text" name="botname" placeholder="Neuer Botname..." class="form-text form-control" id="form-text" required autofocus>
                                    </div>';
                                  if($offline == 1){
                                        echo '<button type="submit" class="btn" align="center" disabled>Ändern</button>';
                                    }else {
                                    echo '<button type="submit" class="btn" align="center">Ändern</button>';    
                                    }
                                echo '</form>
                            </div>';
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <h1>Aktionen</h1>
                                <?php
                                echo '
                                <div class="row">
                                <div class="spacer-h"></div>
                                <form role="form" action="api.php?request=shutdown&from=botuser" method="post">
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="id" value='.$botid.'>
                                    <div class="form-group">';
                                if($offline == 1){
                                   echo '<button type="submit" class="btn" align="center" disabled>Stoppen</button>';
                                   }else {
                                   echo '<button type="submit" class="btn" align="center">Stoppen</button>';
                                   }
                                echo'
                                    </div>
                                </form>
                                <div class="spacer"></div>
                                <form role="form" action="http://'.strtolower($system).'.tsradiobot.de/api/v2/apiv2.php" method="post">
                                <input type="hidden" name="request" value="restartuser">
                                <input type="hidden" name="Auth" value="radioonsucks">
                                <input type="hidden" name="botid" value='.$botid.'>
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="system" value='.$system.'>
                                <input type="hidden" name="botname" value="'.$botname.'">
                                <input type="hidden" name="uid" value='.$uid.'>
                                <input type="hidden" name="serverpassword" value='.$serverpassword.'>
                                <input type="hidden" name="ip" value='.$address.'>
                                <input type="hidden" name="default" value='.$defaultchannel.'>
                                    <div class="form-group">';
                                if($offline == 1){
                                    echo '<button type="submit" class="btn" style="background-color: #1B9194;" align="center" disabled>Neustarten</button>';
                                }else {
                                    echo '<button type="submit" class="btn" style="background-color: #1B9194;" align="center">Neustarten</button>'; 
                                }
                                   
                                    echo '</div>
                                </form>
                                <div class="spacer"></div>
                                <form role="form" action="http://'.strtolower($system).'.tsradiobot.de/api/v2/apiv2.php" method="post">
                                <input type="hidden" name="request" value="startuser">
                                <input type="hidden" name="Auth" value="radioonsucks">
                                <input type="hidden" name="botid" value='.$botid.'>
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="system" value='.$system.'>
                                <input type="hidden" name="botname" value="'.$botname.'">
                                <input type="hidden" name="uid" value='.$uid.'>
                                <input type="hidden" name="serverpassword" value='.$serverpassword.'>
                                <input type="hidden" name="ip" value='.$address.'>
                                <input type="hidden" name="default" value='.$defaultchannel.'>
                                <div class="form-group">';
                                   if($offline == 1){
                                   echo '<button type="submit" class="btn btn-3" style="background-color: #28a745;" align="center">Starten</button>';
                                   }else {
                                   echo '<button type="submit" class="btn btn-3" style="background-color: #28a745;" align="center" disabled>Starten</button>';
                                   }
                                   
                                    echo '</div>
                                    </form>
                                </div>';
 ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="white-box">
                                <h1>Streaming</h1>
                                <?php
                                echo '
                                <div style="margin-top: 10px;"></div>
                                <h3>Streamlink</h3>
                                <form role="form" action="api.php?request=stream&from=botuser" method="post">
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="id" value='.$botid.'>
                                    <div class="form-group">
                                        <select style="max-width: 170px" name="streammode" placeholder="Auswählen... *" class="form-text form-control" id="form-text" autocomplete="off" required>
                                        <option>TSRadio</option>
                                        <option>TSRadio2</option>';
                                if($groupid == '#100'){
                                    echo '<option>Mangoradio</option>';
                                }else if($groupid == '#101'){
                                    echo '<option>SloneFM</option>';
                                }else if($groupid == '#102'){
                                    echo '<option>Like2PlayFM</option>';
                                }else if($groupid == '#103'){
                                    echo '<option>--</option>';
                                }else if($groupid == '#104'){
                                    echo '<option>--</option>';
                                }else if($groupid == '#105'){
                                    echo '<option>Homeradio</option>';
                                }else if($groupid == '#106'){
                                    echo '<option>Homerap</option>';
                                }else if($groupid == '#107'){
                                    echo '<option>--</option>';
                                }else if($groupid == '#108'){
                                    echo '<option>--</option>';
                                }else if($groupid == '#109'){
                                    echo '<option>--</option>';
                                }else if($groupid == '#110'){
                                    echo '<option>--</option>';
                                }
                                        echo '</select>
                                        ';
                                    if($offline == 1){
                                   echo '    <br /><div class="spacer"></div><button type="submit" class="btn" align="center" style="background-color: #1B9194;" disabled>Stream ändern</button>
                                    ';
                                   }else {
                                   echo '    <br /><div class="spacer"></div><button type="submit" class="btn" align="center" style="background-color: #1B9194;">Stream ändern</button>
                                    ';
                                   }

                                    echo '</div>
                                </form>';
                                echo '
                                <div style="margin-top: 10px;"></div>
                                <h3>Lautstärke</h3>
                                <form role="form" action="api.php?request=volume&from=botuser" method="post">
                                 <input type="hidden" name="port" value='.$port.'>
                                 <input type="hidden" name="id" value='.$botid.'>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-text">Bot Volume</label>
                                        <input name="botvol" type="number" min="1" max="30" step="1" value="10" required>
                                    </div>';
                                    if($offline == 1){
                                   echo '    <br />
                                   <div class="spacer">
                                   </div><button type="submit" class="btn" align="center" style="background-color: #1B9194;" disabled>Lautstärke ändern</button>
                                    ';
                                   }else {
                                   echo '    <br />
                                   <div class="spacer">
                                   </div><button type="submit" class="btn" align="right" style="background-color: #1B9194;">Lautstärke ändern</button>
                                    ';
                                   }

                                    echo '</form>';

 ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <div class="white-box">
                                <?php
                                echo '
                                <div style="margin-top: 10px;"></div>
                                <h3>Server Adresse</h3>
                                <form role="form" action="api.php?request=ServerIP&from=botuser" method="post">
                                 <input type="hidden" name="port" value='.$port.'>
                                 <input type="hidden" name="botid" value='.$botid.'>
                                 <div class="form-group">
                                        <label class="sr-only" for="form-text">Server Adresse</label>
                                        <input style="border-color" type="text" name="ip" placeholder="Server Adresse" value="'.urldecode($address).'" class="form-text-2 form-control" id="form-text" required>
                                    </div><br /><div class="spacer">
                                   </div><button type="submit" class="btn" align="center" style="background-color: #1B9194;">Ändern</button><br />
                                    </form>
                                <div style="margin-top: 20px;"></div>
                                <h3>Default Channel</h3>
                                <form role="form" action="api.php?request=DEFCH&from=botuser" method="post">
                                <input type="hidden" name="port" value='.$port.'>
                                <input type="hidden" name="botid" value='.$botid.'>
                                    <div class="form-group">
                                    <label class="sr-only" for="form-text">Default Channel ID</label>
                                        <input style="border-color" type="text" name="defch" placeholder="Channel ID" class="form-text-2 form-control" id="form-text" required>
                                         <br />
                                         </div>
                                         <button type="submit" class="btn" align="center" style="background-color: #1B9194;">Ändern</button>
                                         <div class="spacer">
                                         </div>
                                </form>';
 ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="assets/dist/admin4b.min.js"></script>
    <script src="assets/js/admin4b.docs.js"></script>
    <?php
        if($_GET['answer'] == "edit"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Die Einstellungen wurden aktualisiert!", "info");</script>');
        }
        if($_GET['answer'] == "namechange"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Du hast den Namen von deinem Bot geändert.", "success");</script>');
        }
            if($_GET['answer'] == "volume"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Du hast die Lautstärke des Bots verändert.", "success");</script>');
        }
            if($_GET['answer'] == "stream"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Du hast dein Stream vom Bot geändert.", "info");</script>');
        }
                if($_GET['answer'] == "start"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Der Bot wurde gestartet.", "success");</script>');
        }
                    if($_GET['answer'] == "killed"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Der Bot wurde erfolgreich getötet.", "success");</script>');
        }
                    if($_GET['answer'] == "restart"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Der Bot wurde neugestartet.", "success");</script>');
        }
                if($_GET['answer'] == "shutdown"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Der Bot wurde heruntergefahren.", "success");</script>');
        }
    
    ?>
</body>

</html>
