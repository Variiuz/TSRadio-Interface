<?php
include("inc/session.php");
include("inc/checkgroup.php");
include("plugins/data.php");
header ('Content-type: text/html; charset=utf-8');
$name = $_SESSION['username'];
$groupid = $_SESSION['groupid'];
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
        <link href="assets/dist/style-add.css" rel="stylesheet">
        <link href="assets/css/tables.css" rel="stylesheet">
        <title>TSRadioBot &middot Bot erstellen</title>
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
                        <?php echo '<img src="assets/upload/'.$_SESSION['groupidex'].'.png" class="user-photo" alt="Kein Profilfoto gefunden">'; ?>
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
                            <a href="orders.php" class="sidebar-nav-link">
        <i class="material-icons">shopping_cart</i> Bestellungen
      </a>
                        </div>
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
                </div>

                <div class="app-content">
                    <nav class="navbar navbar-expand navbar-light bg-white">
                        <button type="button" class="btn btn-sidebar" data-toggle="sidebar">
    <i class="fa fa-bars"></i>
  </button>
                        <div class="navbar-brand">
                            TSRadioBot &middot Bot erstellen
                        </div>
                    </nav>


                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="botcontrol.php">BotController</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bot erstellen</li>
                        </ol>
                    </nav>
                    <div class="container-fluid">
                        <h2>
                            Musikbot erstellen
                        </h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="white-box">
                                    <h3 class="text-muted vb" style="font-size: 25px;">Bot erstellen</h3>
                                    <hr />
                                    <form role="form" action="api.php?request=create&from=botadmin" method="post">
                                        <div class="form-group">
                                            <label for="form-text">Kundennummer</label>
                                            <small>Der Kunde zu dem der Bot gehören soll.</small>
                                            <input type="text" name="botkd" placeholder="Kundennummer..." class="form-text form-control" id="form-text" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-text">Port</label>
                                            <small>Freier API Port für den Bot (Freien Port unten suchen)</small>
                                            <input type="text" name="botport" placeholder="API Port..." class="form-text form-control" id="form-text" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-text">BotID</label>
                                            <small>Setzt sich aus der Kundennummer+Anzahl der Bots+1 (KundenID)11-3(Anzahl der Bots+1)</small>
                                            <input type="text" name="botid" placeholder="BotID..." class="form-text form-control" id="form-text" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-text">Node</label>
                                            <small>Landescode+NodeID  zB: DE-1</small>
                                            <input type="text" name="bothost" placeholder="Nodehoster" class="form-text form-control" id="form-text" required>
                                        </div>
                                        <button type="submit" class="btn" style="background-color: #1B9194;" align="center">Erstellen</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="tablebox" align="center">
                                <h2 class="box-title" align="center"><i class="material-icons">video_library</i> Port API</h2>
                                <hr />
                                <input type="text" id="inputsearch" onkeyup="search()" placeholder="Kunden suchen..." align="left">
                                <input type="text" id="inputsearch2" onkeyup="search2()" placeholder="ID suchen..." align="left">
                                <input type="text" id="inputsearch3" onkeyup="search4()" placeholder="Port suchen..." align="left">
                                <table class="tables" id="tables">
                                    <thead>
                                        <tr>
                                            <th style="width:50%;">Kundennummer</th>
                                            <th style="width:50%;">BotID</th>
                                            <th style="width:50%;">Port</th>
                                            <th style="width:50%;">Hosting System</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                    $result = mysqli_query($db,"SELECT * FROM Botlist");         
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";    
                                        echo "<td>".$row['groupid']."</td>";
                                        echo "<td>".$row['BotID']."</td>";
                                        echo "<td>" . $row['Port'] . "</td>";                                              
                                        $system = $row['System'];
                                        if($system=='DE-3'){
                                            $status= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-3">DE-3</a>';
                                                           }
                                        if($system=='DE-2'){
                                            $status= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-2">DE-2</a>';
                                        }
                                        if($system=='DE-1'){
                                            $status= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/Germany-icon.png" alt="IMG" /> <a href="status.php?node=de-1">DE-1</a>';
                                        }
                                        if($system=='FR-1'){
                                            $status= '<img src="http://icons.iconarchive.com/icons/custom-icon-design/flat-europe-flag/16/France-icon.png" alt="IMG" /> <a href="status.php?node=de-1">FR-1</a>';     
                                        }
                                        echo "<td>" .$status."</td>"; 
                                        echo "</tr>"; } mysqli_close($con); ?>
                                    </tbody>

                                </table>
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
                    if($_GET['answer'] == "created"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("Erfolgreich", "Du hast den Bot erstellt.", "success");</script>');
        }
                    if($_GET['answer'] == "sqlfailed"){
   echo('<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><script>swal("SQLFehler", "Es ist ein SQL Fehler aufgetreten!", "error");</script>');
        }
            ?>
    </body>

    </html>
