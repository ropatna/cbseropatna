<?php include 'includes/conn.php'; ?>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> CBSE RO PATNA </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <script src="https://use.fontawesome.com/c985c0bffb.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/cbse-logo.png" type="image/y-icon">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/css/mdb.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <link href="css/addons/datatables.min.css" rel="stylesheet">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
</head>

<body>
    <div class="header">
        <div class="topdiv" style="height:30px;color:black;">
            <div class="topbutton">
                <span><strong>Hello! <?php echo strtoupper($_SESSION["username"]); ?></strong></span>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="theme_base"><a class="lang" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i> Logout </a>
                </span>
            </div>
        </div>
        <div class="top_banner">
            <div class=" logo1">
                <img src="images/cbse-logo.png" style="height:120px;border-width:0px;">
            </div>
            <div class="banner_text visible-lg">
                <h1>
                    <span id="header_text">Central Board of Secondary Education</span>
                </h1>
                <h1>
                    <span id="header_text">Regional Office, Patna</span>
                </h1>


            </div>
            <div class="logo2">
                <img src="images/digitalindia.png" style="height:110px;border-width:0px;">
            </div>
        </div>
        <div class="nav_bar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php"> <i class="fa fa-home"></i> Home</a></li>
                <li><a href=""> <i class="fa fa-book"></i> Circular</a></li>
                <li><a href=""> <i class="fa fa-download"></i> Downloads</a></li>
                <li><a href=""> <i class="fa fa-users"></i> Employees</a></li>
                <li><a href=""> <i class="fa fa-phone"></i> Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <a href="index.php?school" class="<?php if(isset($_GET['school'])) { echo "active";} ?>"> <i class="fa fa-building"></i> Schools</a>
        <a href="index.php?loc" class="<?php if(isset($_GET['loc'])) { echo "active";} ?>"> <i class="fa fa-users"></i> Registration &amp; LOC</a>
        <a href="index.php?screen3" class="<?php if(isset($_GET['screen3'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Results</a>
        <a href="index.php?mmsection" class="<?php if(isset($_GET['mmsection'])) { echo "active";} ?>"> <i class="fa fa-clipboard"></i> MM Section </a>
        <a href="index.php?exmrepo" class="<?php if(isset($_GET['exmrepo'])) { echo "active";} ?>"> <i class="fa fa-clipboard"></i> Exam Report </a>
        <a href="index.php?examsection" class="<?php if(isset($_GET['examsection'])) { echo "active";} ?>"> <i class="fa fa-clipboard"></i> Exam Section </a>
        <a href="index.php?cen_noti" class="<?php if(isset($_GET['cen_noti'])) { echo "active";} ?>"> <i class="fa fa-bullhorn"></i> Center Notification </a>
        <a href="index.php?stats" class="<?php if(isset($_GET['stats'])) { echo "active";} ?>"> <i class="fa fa-line-chart"></i> Statistics </a>
        <a href="index.php?sub" class="<?php if(isset($_GET['sub'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Subjects </a>
        <a href="index.php?he" class="<?php if(isset($_GET['he'])) { echo "active";} ?>"> <i class="fa fa-list"></i> HE List </a>
        <a href="index.php?probs" class="<?php if(isset($_GET['probs'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Prac. Observer </a>
        <a href="index.php?teachersbank" class="<?php if(isset($_GET['teachersbank'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Teacher's Data Bank </a>
        <a href="index.php?spotev" class="<?php if(isset($_GET['spotev'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Spot Evaluation Status </a>
        <a href="index.php?corr" class="<?php if(isset($_GET['corr'])) { echo "active";} ?>"> <i class="fa fa-list"></i> Student Detail Correction </a>
    </div>
    <?php if(isset($_GET['school'])){ include 'school.php'; } ?>
    <?php if(isset($_GET['loc'])){ include 'loc.php'; } ?>
    <?php if(isset($_GET['screen3'])){ include 'screen3.php'; } ?>
    <?php if(isset($_GET['mmsection'])){ include 'mmsection.php'; } ?>
    <?php if(isset($_GET['mmsection2'])){ include 'mmsection2.php'; } ?>
    <?php if(isset($_GET['exmrepo'])){ include 'exmrepo.php'; } ?>
    <?php if(isset($_GET['examsection'])){ include 'examsection.php'; } ?>
    <?php if(isset($_GET['exammigx'])){ include 'exammigx.php'; } ?>
    <?php if(isset($_GET['cen_noti'])){ include 'cen_noti.php'; } ?>
    <?php if(isset($_GET['stats'])){ include 'stats.php'; } ?>
    <?php if(isset($_GET['sub'])){ include 'sub.php'; } ?>
    <?php if(isset($_GET['he'])){ include 'he.php'; } ?>
    <?php if(isset($_GET['probs'])){ include 'probs.php'; } ?>
    <?php if(isset($_GET['teachersbank'])){ include 'teachersbank.php'; } ?>
    <?php if(isset($_GET['spotev'])){ include 'spotev.php'; } ?>
    <?php if(isset($_GET['spotev2'])){ include 'spotev2.php'; } ?>
    <?php if(isset($_GET['spotev3'])){ include 'spotev3.php'; } ?>
    <?php if(isset($_GET['spotev4'])){ include 'spotev4.php'; } ?>
    <?php if(isset($_GET['corr'])){ include 'corr.php'; } ?>

    <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="js/addons/datatables.min.js"></script>
</body>

</html>
