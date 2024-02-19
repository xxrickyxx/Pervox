<?php session_start();

function logout() {
    // Elimina tutte le variabili di sessione
    $_SESSION = array();

    // Cancella il cookie di sessione se presente
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Distrugge la sessione
    session_destroy();

    // Reindirizza alla pagina di login o ad altra destinazione
    header("Location: ?route=login");
    exit;
}

// Chiamata alla funzione logout
if (isset($_GET['logout'])) {
    logout();
}

if (!!$_SESSION['user_id']){

    header("Location: /?route=profile&postall=ok&id=".$_SESSION['user_id']);
}

 ?>

<!DOCTYPE html>
<!-- saved from url=(0058) -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="A.I. Tech Innovations">
<title>PerVox</title>
<link rel="apple-touch-icon" sizes="57x57" href="../../tema/img/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../../tema/img/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../../tema/img/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../../tema/img/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../../tema/img/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../../tema/img/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../../tema/img/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../../tema/img/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../../tema/img/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../../tema/img/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../tema/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../../tema/img/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../tema/img/favicon/favicon-16x16.png">
<link rel="manifest" href="../../tema/img/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="../../tema//ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="../../tema/css/bootstrap.min.css" rel="stylesheet">
<link href="../../tema/css/font-awesome.min.css" rel="stylesheet">
<link href="../../tema/css/animate.min.css" rel="stylesheet">
<link href="../../tema/css/index.css" rel="stylesheet">
<link href="../../tema/css/timeline.css" rel="stylesheet">
<link href="../../tema/css/cover.css" rel="stylesheet">
<link href="../../tema/css/forms.css" rel="stylesheet">
<link href="../../tema/css/buttons.css" rel="stylesheet">
<link href="../../tema/css/footer.css" rel="stylesheet">
<script src="../../tema/javascript/jquery.1.11.1.min.js"></script>
<script src="../../tema/javascript/bootstrap.min.js"></script>
<script src="../../tema/javascript/custom.js"></script>
<script src="../../tema/javascript/finestra_info.js"></script>
<script src="https://kit.fontawesome.com/591be47997.js" crossorigin="anonymous"></script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="animated fadeIn" marginwidth="0">

<nav class="navbar navbar-white navbar-fixed-top">
<div class="container">
<div class="navbar-header">

<img src="../../tema/img/favicon/apple-icon-72x72.png">
</div>
<div id="navbar" class="navbar-collapse collapse">
<div class="nav navbar-nav navbar-right">
<img src="../../tema/img/icon_home/blockchain_icon.png" alt="blockchain" style="width:50px; margin-top:10px; "></a>
</div>
</div>
</div>
</nav>

<div class="row page-content">
<div class="col-md-8 col-md-offset-2">
<div class="row">
<div class="col-md-12">
<div class="cover profile">
<div class="wrapper">
<div class="image">
<img src="../../tema/img/profile-cover.jpg" class="show-in-modal" alt="people">
</div>
<ul class="friends">
<li>
<a href="">
<img src="../../tema/img/guy-6.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-3.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-2.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-9.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-9.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-4.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-1.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-4.jpg" alt="people" class="img-responsive">
</a>
</li>
<li><a href="" class="group"><img src="../../tema/img/icon_home/blockchain_icon.png" alt="blockchain" style="max-width:60px; margin-left:10%; margin-top: 10px;" class="img-responsive"></a></li>
</ul>
</div>
<div class="cover-info">
<div class="avatar">
<img src="../../tema/img/anony.png" alt="people" style="background-color:white;">
</div>

</div>
</div>
</div>
<div class="col-md-12 col-md-22 hidden">
<div class="cover profile">
<div class="wrapper">
<div class="image">
<img src="../../tema/img/profile-cover.jpg" class="show-in-modal" alt="people">
</div>
<ul class="friends">
<li>
<a href="">
<img src="../../tema/img/guy-6.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-3.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-2.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-9.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-9.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-4.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/guy-1.jpg" alt="people" class="img-responsive">
</a>
</li>
<li>
<a href="">
<img src="../../tema/img/woman-4.jpg" alt="people" class="img-responsive">
</a>
</li>
<li><a href="" class="group"><img src="../../tema/img/icon_home/blockchain_icon.png" alt="blockchain" style="max-width:60px; margin-left:10%" class="img-responsive"></a></li>
</ul>
</div>
<div class="cover-info">
<div class="avatar">
<img src="../../tema/img/guy-3.jpg" alt="people">
</div>
<ul class="cover-nav">
<li class="active"><a href=""><i class="fa fa-fw fa-bars"></i> Timeline</a></li>
<li><a href="../../tema//template_demo/dayday/about.html"><i class="fa fa-fw fa-user"></i> About</a></li>
<li><a href="../../tema//template_demo/dayday/friends.html"><i class="fa fa-fw fa-users"></i> Supporter</a></li>
</ul>
</div>
</div>
</div>
</div>
<div align="center">
<nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-users"></i> Friends</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-envelope"></i> Messagge</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-image"></i> Photo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-video-camera"></i> Videos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-calendar"></i> Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-globe"></i> Explore</a>
            </li>
        </ul>
    </div>
</nav></div>
<form action="" method="get" style="margin-bottom:10px;">
    <input type="text" style="border:none; border-bottom:2px solid #2dc3e8;" name="searchContent" placeholder="Search by content">
    <input type="text" style="border:none; border-bottom:2px solid #2dc3e8;" name="searchAuthor" placeholder="Search by author">
    <button class="btn btn-azure" style="height: 24px; line-height: 5px; vertical-align: middle;" type="submit">Search</button>
</form>


<div class="row">
<div class="row col-md-22 hidden">
<form action="" method="POST" autocomplete="off">
<input type="text" id="short" name="" placeholder="Username or email">
<input type="password" id="shortt" name="" placeholder="Password">

<a type="submit" href="" name="login" class="btn btn-danger">Login</a>
<span class="forgot-password-link">
<a href="">Forgot your password?</a><br>
</span>
</form>
</div>
<div class="col-md-5">
<div class="widget">
<div class="widget-header">
<h3 class="widget-caption"><img src="../../tema/img/wallet.jpg" style="width:30px;"></h3>
</div>
<div class="widget-body bordered-top bordered-sky">
<ul class="list-unstyled profile-about margin-none">

<li class="padding-v-5">
  <div class="row">
    <div class="col-sm-4"><span class="text-muted">Address</span></div>
    <div class="col-sm-8" style="width:300px;">
      <div class="address-text">
        <span class="text-muted"></span>
      </div>
      <a href="?route=register"  class="btn btn-info">Create Wallet</a>
      <a href="https://www.pervox.online?route=login" class="btn btn-warning">Login</a>
      <a href="https://www.pervox.online" class="btn btn-warning" style="background:red !important;">Reset Page</a>
    </div>
  </div>
</li>

<li class="padding-v-5">
<div class="row">
<div class="col-sm-4"><span class="text-muted">PX coin</span></div>
<div class="col-sm-8">?</div>
</div>
</li>
</ul>
</div>
</div>
<div class="widget widget-friends">


<div class="widget-header">
        <!-- Icona di informazioni -->
    <div class="info-icon" onclick="mostraFinestra()">
        <img src="../../tema/img/info.png" alt="Info" style="width:30px;">
    </div>

<img src="../../tema/img/giphy.gif" style="width:60px; float: left; margin-bottom: 10px; margin-top: 10px; margin-right:5px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
</div>
<div class="widget-body bordered-top  bordered-sky">
<div class="row">
<div class="col-md-12">
    <!-- Finestra di informazioni nascosta inizialmente -->
    <div class="finestra-informazioni" id="finestra">
        <iframe src="https://www.pervox.online/?route=verifyBlockchainFiles"></iframe>
        <button onclick="chiudiFinestra()">Close</button>
    </div>
<embed src="https://www.pervox.online/?route=showServerStatus"></embed>


</div>
</div>
</div>
</div>
<div class="widget">
<div class="widget-header">
<h3 class="widget-caption">Downloads</h3>
</div>
<div class="widget-body bordered-top bordered-sky">
<div class="card">
<div class="content">
<ul class="list-unstyled team-members">
<li>
<div class="row">
<div class="col-xs-3">
<div class="avatar">
<img src="../../tema/img/likes-1.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
</div>
</div>
<div class="col-xs-6">
Github
</div>
<div class="col-xs-3 text-right">
<btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
</div>
</div>
</li>
<li>
<div class="row">
<div class="col-xs-3">
<div class="avatar">
<img src="../../tema/img/likes-3.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
</div>
</div>
<div class="col-xs-6">
Css snippets
</div>
<div class="col-xs-3 text-right">
<btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
</div>
</div>
</li>
<li>
<div class="row">
<div class="col-xs-3">
<div class="avatar">
<img src="../../tema/img/likes-2.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
</div>
</div>
<div class="col-xs-6">
Html Action
</div>
<div class="col-xs-3 text-right">
<btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>

<div class="col-md-7">
<div class="row">

<div class="col-md-12">
<div class="row">
<div class="col-md-12">


<?php 
    

    $jsonFilePath = 'https://www.pervox.online/data/blockchain.json';

    $jsonContent = file_get_contents($jsonFilePath);
    
    if (!!$_GET['searchContent'] or !!$_GET['searchAuthor']) {
        $data = $blockchainData;
    } else {
        $data = json_decode($jsonContent, true);
    }

?>

            <?php  if (!empty($data)): // Verifica se $filteredData non è vuoto  ?>
                <?php foreach (array_reverse($data) as $block):  ?>

<?php if ($block['data']['type']!='transfer') { ?>

<?php
$timestamp = $block['timestamp'];
$timezone = new DateTimeZone('Europe/Rome');
$currentTimestamp = time(); // Timestamp attuale

// Calcola la differenza tra i due timestamp in termini di anni, mesi e giorni
$datetime1 = new DateTime("@$timestamp", $timezone);
$datetime2 = new DateTime("@$currentTimestamp", $timezone);
$interval = $datetime1->diff($datetime2);

// Ottieni il numero di anni, mesi e giorni dalla differenza
$years = $interval->y;
$months = $interval->m;
$days = $interval->d;

// Trasforma il numero di mesi in anni e mesi completi
$yearsFromMonths = floor($months / 12);
$remainingMonths = $months % 12;

// Output a parole
$output = '';
if ($years > 0) {
    $output .= $years . ' years ';
}
if ($yearsFromMonths > 0) {
    $output .= $yearsFromMonths . ' years ';
}
if ($remainingMonths > 0) {
    $output .= $remainingMonths . ' months ';
}
if ($days > 0) {
    $output .= $days . ' days';
}

?>

<?php 
$timestamp = $block['timestamp'];
$timezone = new DateTimeZone('Europe/Rome'); // Imposta il fuso orario su Roma

// Crea un oggetto DateTime utilizzando il timestamp e il fuso orario
$date = new DateTime("@$timestamp");
$date->setTimezone($timezone); // Imposta il fuso orario a Roma

// Formatta la data e l'ora nel formato desiderato
$formatted_date = $date->format('Y-m-d H:i:s'); // Modifica il formato come desideri

?>

<div class="box box-widget">
<div class="box-header with-border">
<div class="user-block">
<?php

foreach($data_user as $immagini_user){



  if ($immagini_user['email']==$block['data']['author']) {
 ?>
<span class="icon-container"><?php  echo base64_decode($immagini_user['img']); ?></span>

  <?php } else { ?>


    <span></span>

 <?php  }
 }

?>

<div id="infoContainer" style="float:right;">
    <strong style="font-size:6px; float:left !important; margin-left:3px; max-width: 270px;" class="description">
        Hash: <span id="hashText<?=$x?>"><?php echo $block['hash']; ?></span>
        <br><button onclick="copyToClipboard('hashText<?=$x?>')">Copy</button>
    </strong>
    <br>
    <strong style="font-size:6px; float:left !important; margin-left:3px; max-width: 270px;" class="description">
        Previous Hash: <span id="prevHashText<?=$x?>"><?php echo $block['previous_hash']; ?></span>
        <br><button onclick="copyToClipboard('prevHashText<?=$x?>')">Copy</button>
    </strong>
</div>

<script>
    function copyToClipboard(elementId) {
        var copyText = document.getElementById(elementId);
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert("Text copied in the notes: " + copyText.textContent);
    }
</script>

<style type="text/css">
    .icon-container {
    font-size: 36px; /* Imposta la dimensione desiderata per l'icona */
    /* Altri stili CSS che desideri applicare all'elemento contenitore dell'icona */
    float: left !important;
}

</style>
<!--<span class="description"><?php if ($aiValidationResult): ?>
            <p>Validation with AI: Compliant</p>
        <?php else: ?>
            <p>Validation with AI: Not Compliant</p>
        <?php endif; ?></span>-->
<span class="username"><a href=""><?php echo $block['data']['author']; ?> </a></span>
<span class="description"><?php echo $output;  ?></span><span class="description" style="font-size:10px;"><?php echo $formatted_date; ?></span>
</div>
</div>
<div class="box-body" style="display: block;">

   <?php if ($block['data']['type'] === 'text'): ?>
                           
                 <?php echo base64_decode($block['data']['content']); ?>

                 <?php elseif (in_array($block['data']['type'], ['image', 'jpeg', 'jpg', 'png'])): ?>
                            
                            <img src="data:image/jpeg;base64,<?php echo $block['data']['content']; ?>" style="max-width: 400px; max-height: 600px;">

                 <?php elseif (in_array($block['data']['type'], ['html', 'css', 'js'])): ?>
       
                 <?php echo base64_decode($block['data']['content']); ?>

                        <?php elseif ($block['data']['type'] === 'pdf'): ?>
                         
                            <embed src="data:application/pdf;base64,<?php echo $block['data']['content']; ?>" width="400" height="600" type="application/pdf">

                        <?php else: ?>

                 <?php echo base64_decode($block['data']['content']); ?>

                        <?php endif; ?>


</br></br>                        

    <span class="pull-right text-muted like-count"><?= count($block['data']['liked_posts']); ?> likes</span>
    <span class="pull-right text-muted"><?= count($block['data']['comments']); ?> Comments</span>
</br></br>  
</div>
<?php if (!!$block['data']['comments']) { ?>
<div class="box-footer box-comments" style="display: block;">
<?php foreach (array_reverse($block['data']['comments']) as $commento) { ?>
<?php if ($commento['author'] == $block['data']['author']) { $verify_commenti += 1;  } ?>
<?php
$timestamp = $commento['timestamp'];
$timezone = new DateTimeZone('Europe/Rome'); // Imposta il fuso orario su Roma

// Crea un oggetto DateTime utilizzando il timestamp e il fuso orario
$date = new DateTime("@$timestamp");
$date->setTimezone($timezone); // Imposta il fuso orario a Roma

// Formatta la data e l'ora nel formato desiderato
$formatted_date_commento = $date->format('Y-m-d H:i:s'); // Modifica il formato come desideri

?>


<div class="box-comment">
<div class="comment-text" style="margin-left:-2px;">
<span class="username">
<div class="img-responsive img-circle img-sm"><?php echo $commento['fa_author']; ?></div>
<?php echo $commento['author'];  ?>
<span class="text-muted pull-right"><?=$formatted_date_commento?></span>
</span>
<?php echo $commento['comment'];  ?>
</div>
</div>
<?php } ?>
</div>
<?php } ?>
<div class="box-footer" style="display: block;">

</div>
</div>

                <?php } ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Nessun dato da visualizzare.</p>
            <?php endif; ?>

</div>
</div>
</div>
</div>
</div>

<div class="col-md-7 col-md-22 hidden">
<div class="row">

<div class="col-md-12">
<div class="row">
<div class="col-md-12">

<div class="box profile-info n-border-top">
<form>
<textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>
</form>
<div class="box-footer box-form">
<button type="button" class="btn btn-azure pull-right">Post</button>
<ul class="nav nav-pills">
<li><a href=""><i class="fa fa-map-marker"></i></a></li>
<li><a href=""><i class="fa fa-camera"></i></a></li>
<li><a href=""><i class=" fa fa-film"></i></a></li>
<li><a href=""><i class="fa fa-microphone"></i></a></li>
</ul>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title" id="myModalLabel">Modal title</h4>
</div>
<div class="modal-body text-centers">
...
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div class="footer">
            <div class="container">     
                <div class="row">                       
                    <div class="col-lg-4 col-sm-4 col-xs-12">
                        <div class="single_footer">
                            <h4>Services</h4>
                            <ul>                           
                                <li><a href="https://pervox.online/download.html">Download</a></li>
                                <li><a href="https://pervox.online/help.html">Help</a></li>
                                <li><a href="https://pervox.online/blockchain.html">Blockchain</a></li>
                            </ul>
                        </div>
                    </div><!--- END COL --> 
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Page Link</h4>
                            <ul>
                                <li><a href="https://pervox.online/privacy_policy.html">Privacy Policy </a></li>
                                <li><a href="https://pervox.online/whitepaper.html">White Paper</a></li>
                                <li><a href="https://pervox.online/terms.html">Terms</a></li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single_footer single_footer_address">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="https://pervox.online/info.html">Info</a></li>
                                <li><a href="https://pervox.online/pxcoin.html">PX Coin</a></li>
                                <li><a href="https://pervox.online/verify.html">Verify Post</a></li>
                            </ul>
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW --> 
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <p class="copyright"><img src="https://www.pervox.online/tema/img/icon_home/blockchain_icon.png" style="width:20px;"> Copyright © 2023 A.I. Tech Innovations - All rights reserved. PerVox.online Beta 1.0.</p>
                    </div><!--- END COL -->                 
                </div><!--- END ROW -->                 
            </div><!--- END CONTAINER -->
        </div>


<style type="text/css">
  .cover-info {
    display: none !important;
}
</style>

</body></html>