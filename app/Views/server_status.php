<!DOCTYPE html>
<!-- saved from url=(0058) -->
<html lang="en" style="overflow: hidden;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >

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
<script src="../../tema/javascript/jquery.1.11.1.min.js"></script>
<script src="../../tema/javascript/bootstrap.min.js"></script>
<script src="../../tema/javascript/custom.js"></script>
<script src="https://kit.fontawesome.com/591be47997.js" crossorigin="anonymous"></script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="animated fadeIn" marginwidth="0">
<?php if ($_GET['route']=="showServerStatus") { ?>

<div  style="max-width: 400px; max-height: 400px; overflow: hidden;">
<table class="table">

    <thead>
        <tr>
            <th>Server</th>
            <th>State</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($blockchainStatuses as $server => $status): ?>
            <tr>
                <td><?php echo $server; ?></td>
                <td style="font-size: 16px;"><?php echo $status; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</div>

<?php } ?>

<?php if ($_GET['route']=="verifyBlockchainFiles") { ?>

<p><?php echo $serverStatuses; ?></p>
<p style="font-size: 16px;"><?php echo $blockchainStatuses; ?></p>




<?php } ?>


</body></html>