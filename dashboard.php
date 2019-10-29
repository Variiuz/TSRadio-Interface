<?php
include("inc/session.php");
include("plugins/data.php");
header ('Content-type: text/html; charset=utf-8');
$name = $_SESSION['username'];
$groupid = $_SESSION['groupid'];
if($groupid == "#110"){
	header("Location: teamspeak.php");
	session_destroy();
	exit;
}
?>
    <!doctype html>
    <html lang="de">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
        <link href="assets/dist/admin4b.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/dist/admin4b-highlight.min.css" rel="stylesheet">
        <title>TSRadioBot &middot Dashboard</title>
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
                        <a href="#" class="sidebar-nav-link">
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
                    <i class="betap"><center></center></i>
                    <?php
                    if($groupid == '#1337'){
                        echo '<div style="margin-top: 300px;"></div>';
                    }else {
                        echo '<div style="margin-top: 340px;"></div>';
                    }
                    ?>
                        <hr />
                        <i class="cp">TSRadiobot &copy; 2018 &nbsp;<br /><a href="https://www.twitter.com/variiuz">Coded with &hearts; by VariusDev</a></i>
                </div>

                <div class="app-content">
                    <nav class="navbar navbar-expand navbar-light bg-white">
                        <button type="button" class="btn btn-sidebar" data-toggle="sidebar">
    <i class="fa fa-bars"></i>
  </button>
                        <div class="navbar-brand">
                            TSRadioBot &middot Dashboard
                        </div>
                    </nav>


                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <div class="container-fluid">
                        <h2>
                            Dashboard - Willkommen

                        </h2>
                        <hr />
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="white-box">
                                    <h5 class="text-muted vb" style="font-size: 25px;"><i class="material-icons">directions_run</i> Kundennummer</h5>
                                    <span><?php echo '<small>'.$groupid.'</small>'; ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="white-box">
                                    <h5 class="text-muted vb" style="font-size: 25px;"><i class="material-icons">library_music</i> Deine Musikbots</h5>
                                    <span><?php echo $_SESSION['totalbots'];?></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="white-box">
                                    <h5 class="text-muted vb" style="font-size: 25px;"><i class="material-icons">library_music</i> Lizenzen</h5>
                                    <?php
                                    $result = mysqli_query($db, "SELECT * FROM tslicense WHERE groupid ='$groupid'");         
                                    while($row = mysqli_fetch_array($result)){ 
                                        echo "<span>".$row["License"]."</span>";
                                        echo "<br />";
                                    } mysqli_close($con);
                                    ?>
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
    </body>

    </html>
