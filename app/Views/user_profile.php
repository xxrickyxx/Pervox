<?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user['id']): 


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
    ?>
    <!DOCTYPE html>
    <html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="A.I. Tech Innovations">
<title>PerVox <?php echo $user['username']; ?></title>
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
<link href="../../tema/css/messagebox.css" rel="stylesheet">
<script src="../../tema/javascript/jquery.1.11.1.min.js"></script>
<script src="../../tema/javascript/bootstrap.min.js"></script>
<script src="../../tema/javascript/custom.js"></script>
<script src="../../tema/javascript/messagebox.js"></script>
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
<ul class="nav navbar-nav navbar-right">

<li><a href="" class="nav-controller"><img src="../../tema/img/icon_home/blockchain_icon.png" alt="blockchain" style="width:50px; margin-top:-10px; margin-bottom:-10px;"></a></li>
</ul>
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
<li><a href="" class="group"><img src="../../tema/img/icon_home/blockchain_icon.png" alt="blockchain" style="max-width:60px; margin-left:10% ;margin-top:8px;" class="img-responsive"></a></li>
</ul>
</div>
<div class="cover-info">
<div class="avatar">

<span class="icon-container"><?php echo base64_decode($user['img']); ?></span>
<style type="text/css">
    .icon-container {
    font-size: 36px; /* Imposta la dimensione desiderata per l'icona */
    /* Altri stili CSS che desideri applicare all'elemento contenitore dell'icona */
}

</style>

</div>
<ul class="cover-nav">

<?php if (!$_GET['postall']) { ?>
<li><a href="?route=profile&id=<?php echo $user['id']; ?>&postall=ok"><i class="fa fa-fw fa-users"></i> All contents</a></li>
<?php } else { ?>
<li><a href="?route=profile&id=<?php echo $user['id']; ?>"><i class="fa fa-fw fa-users"></i> My content</a></li>
<?php } ?>
</ul>
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
<div class="name"><a href=""><?php echo $user['username']; ?></a></div>
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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" style="margin-bottom:10px;">
    <input type="hidden" name="route" value="profile"> <!-- Aggiungi un campo nascosto per route -->
    <input type="hidden" style="border:none; border-bottom:2px solid #2dc3e8;" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">
    <input type="text" style="border:none; border-bottom:2px solid #2dc3e8;" name="searchContent" placeholder="Search by content">
    <input type="text" style="border:none; border-bottom:2px solid #2dc3e8;" name="searchAuthor" placeholder="Search by author">
    <button class="btn btn-azure" style="height: 24px; line-height: 5px; vertical-align: middle;" type="submit">Search</button>
</form>


<div class="row">
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
    <div class="col-sm-8">
      <div class="address-text">
        <span class="text-muted"><?php echo $user['username']; ?></span>
      </div>
      <button onclick="copyAddressToClipboard()" class="btn btn-info">Copy</button>
      <a href="https://pervox.online?logout=true"  class="btn btn-warning">Logout</a>
      <a href="https://www.pervox.online?route=profile&postall=ok&id=<?php echo $_GET['id']; ?>" class="btn btn-warning" style="background:red !important;">Reset Page</a>
    </div>
  </div>
</li>

<li class="padding-v-5">
<div class="row">
<div class="col-sm-4"><span class="text-muted">PX coin</span></div>
<div class="col-sm-8"><?php echo $totalPxCoin;?></div>

</div>
</li>

</ul>
</div>
</div>


<div class="widget widget-friends">

<div class="widget-header">
<h3 class="widget-caption">Transfer <div id="messageContainer"></div></h3>
</div>
<div class="widget-body bordered-top  bordered-sky">
<div class="row">
<div class="col-md-12">
<ul class="img-grid" style="margin: 0 auto;">
<li>
  
        <div class="" style="width: 296px !important;">
            <div class="modal-body">
                <form id="transferForm">
                    <div class="form-group">
                        <label for="recipientUsername">Address Username:</label>
                        <input type="text" class="form-control" id="recipientUsername" required>
                    </div>
                    <div class="form-group">
                        <label for="transferAmount">Amount:</label>
                        <input type="number" class="form-control" id="transferAmount" min="1" required>
                    </div>
                </form>
            </div>
            <div class="">
                <button type="button" class="btn btn-primary" id="confirmTransferBtn">Confirm Transfer</button>
            </div>
        </div>
</li>
</ul>
</div>
</div>
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
<embed src="https://www.pervox.online/?route=showServerStatus"></embed>
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

    <!-- Finestra di informazioni nascosta inizialmente -->
    <div class="finestra-informazioni" id="finestra">
        <iframe src="https://www.pervox.online/?route=verifyBlockchainFiles"></iframe>
        <button onclick="chiudiFinestra()">Chiudi</button>
    </div>

<div class="box profile-info n-border-top">
<!--<form>
<textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>-->
<!-- Aggiungi questo elemento per aprire il popup -->
<button id="openPopupBtn" class="btn btn-info">Whats in your mind today?</button>

<!-- Definisci il popup -->
<div id="popup">
        <form action="?route=uploadToBlockchain" method="POST" enctype="multipart/form-data">
  <textarea class="form-control input-lg p-text-area" id="xcode" name="xcode" rows="8" placeholder="Write your post (max 1000 characters)"></textarea>
  <p id="charCount">Remaining characters: 1000</p>

<div id="formatting-options">
  <button class="btn btn-primary" id="boldButton"><b>B</b></button>
  <button class="btn btn-primary" id="uppercaseButton">UPPER</button>
  <button class="btn btn-primary" id="underlineButton"><u>U</u></button>
  <button class="btn btn-primary" id="alignLeftButton">Left</button>
  <button class="btn btn-primary" id="alignCenterButton">Center</button>
  <button class="btn btn-primary" id="alignRightButton">Right</button>
<select id="fontFamilySelect">
  <option value="Arial">Arial</option>
  <option value="Times New Roman">Times New Roman</option>
  <option value="Verdana">Verdana</option>
</select>

<select id="fontSizeSelect">
  <option value="12px">12px</option>
  <option value="16px">16px</option>
  <option value="20px">20px</option>
</select>
<input class="btn btn-basic" type="color" id="colorPicker">

<span class="emoticon" onclick="addEmoticon('<iframe width=\'560\' height=\'315\' src=\'https://www.youtube.com/embed/edv_bNEaYTQ?si=Lzyfz_8wo7ww86ow\' title=\'YouTube video player\' frameborder=\'0\' allow=\'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\' allowfullscreen></iframe>')">
 🎥
</span>

</div>


<div id="emoticonsContainer">
  <!-- Categoria: Felicità -->
  <h3>Happiness</h3>
  <span class="emoticon" onclick="addEmoticon('😊')">😊</span>
  <span class="emoticon" onclick="addEmoticon('😄')">😄</span>
  <span class="emoticon" onclick="addEmoticon('😍')">😍</span>
  <span class="emoticon" onclick="addEmoticon('🎉')">🎉</span>
  <span class="emoticon" onclick="addEmoticon('🚀')">🚀</span>
  <span class="emoticon" onclick="addEmoticon('🌈')">🌈</span>
  <span class="emoticon" onclick="addEmoticon('🤗')">🤗</span>
  <span class="emoticon" onclick="addEmoticon('😎')">😎</span>
  <span class="emoticon" onclick="addEmoticon('👍')">👍</span>
  <span class="emoticon" onclick="addEmoticon('👏')">👏</span>
  <span class="emoticon" onclick="addEmoticon('🙌')">🙌</span>
  <span class="emoticon" onclick="addEmoticon('🤩')">🤩</span>
  <span class="emoticon" onclick="addEmoticon('😇')">😇</span>
  <span class="emoticon" onclick="addEmoticon('🥳')">🥳</span>
  <span class="emoticon" onclick="addEmoticon('🥰')">🥰</span>
  <span class="emoticon" onclick="addEmoticon('🤔')">🤔</span>
  <span class="emoticon" onclick="addEmoticon('😏')">😏</span>
  <span class="emoticon" onclick="addEmoticon('😋')">😋</span>
  <span class="emoticon" onclick="addEmoticon('😃')">😃</span>
  <span class="emoticon" onclick="addEmoticon('😆')">😆</span>
  <span class="emoticon" onclick="addEmoticon('🤭')">🤭</span>
  <span class="emoticon" onclick="addEmoticon('😌')">😌</span>
  <span class="emoticon" onclick="addEmoticon('😀')">😀</span>
  <span class="emoticon" onclick="addEmoticon('😁')">😁</span>
  <span class="emoticon" onclick="addEmoticon('😂')">😂</span>
  <span class="emoticon" onclick="addEmoticon('🤣')">🤣</span>
  <span class="emoticon" onclick="addEmoticon('😅')">😅</span>
  <span class="emoticon" onclick="addEmoticon('😆')">😆</span>
  <span class="emoticon" onclick="addEmoticon('😉')">😉</span>
  <span class="emoticon" onclick="addEmoticon('😋')">😋</span>
  <span class="emoticon" onclick="addEmoticon('😎')">😎</span>
  <span class="emoticon" onclick="addEmoticon('😍')">😍</span>
  <span class="emoticon" onclick="addEmoticon('😘')">😘</span>
  <span class="emoticon" onclick="addEmoticon('😗')">😗</span>
  <span class="emoticon" onclick="addEmoticon('😙')">😙</span>
  <span class="emoticon" onclick="addEmoticon('😚')">😚</span>
  <span class="emoticon" onclick="addEmoticon('🙂')">🙂</span>
  <span class="emoticon" onclick="addEmoticon('🤗')">🤗</span>
  <span class="emoticon" onclick="addEmoticon('🤩')">🤩</span>
  <span class="emoticon" onclick="addEmoticon('🥰')">🥰</span>
  <!-- Aggiungi altre emoticon felicità qui -->

  <!-- Categoria: Tristezza -->
  <h3>Sadness</h3>
  <span class="emoticon" onclick="addEmoticon('😢')">😢</span>
  <span class="emoticon" onclick="addEmoticon('😭')">😭</span>
  <span class="emoticon" onclick="addEmoticon('😥')">😥</span>
  <span class="emoticon" onclick="addEmoticon('😓')">😓</span>
  <span class="emoticon" onclick="addEmoticon('😞')">😞</span>
  <span class="emoticon" onclick="addEmoticon('😖')">😖</span>
  <span class="emoticon" onclick="addEmoticon('😤')">😤</span>
  <span class="emoticon" onclick="addEmoticon('😠')">😠</span>
  <!-- Aggiungi altre emoticon tristezza qui -->

  <!-- Categoria: Paura -->
  <h3>Fear</h3>
  <span class="emoticon" onclick="addEmoticon('😷')">😷</span>
  <span class="emoticon" onclick="addEmoticon('🤒')">🤒</span>
  <span class="emoticon" onclick="addEmoticon('🤕')">🤕</span>
  <span class="emoticon" onclick="addEmoticon('🤢')">🤢</span>
  <span class="emoticon" onclick="addEmoticon('🤮')">🤮</span>
  <span class="emoticon" onclick="addEmoticon('🤧')">🤧</span>
  <span class="emoticon" onclick="addEmoticon('🥵')">🥵</span>
  <span class="emoticon" onclick="addEmoticon('🥶')">🥶</span>
  <!-- Aggiungi altre emoticon paura qui -->

  <!-- Categoria: Fantasia -->
  <h3>Fantasy</h3>
  <span class="emoticon" onclick="addEmoticon('🤡')">🤡</span>
  <span class="emoticon" onclick="addEmoticon('💀')">💀</span>
  <span class="emoticon" onclick="addEmoticon('👻')">👻</span>
  <span class="emoticon" onclick="addEmoticon('👽')">👽</span>
  <span class="emoticon" onclick="addEmoticon('👾')">👾</span>
  <span class="emoticon" onclick="addEmoticon('🤖')">🤖</span>
  <span class="emoticon" onclick="addEmoticon('💩')">💩</span>
  <!-- Aggiungi altre emoticon fantasia qui -->

  <!-- Categoria: Sport -->
  <h3>Sport</h3>
  <span class="emoticon" onclick="addEmoticon('🤺')">🤺</span>
  <span class="emoticon" onclick="addEmoticon('🤼')">🤼</span>
  <span class="emoticon" onclick="addEmoticon('🤸')">🤸</span>
  <span class="emoticon" onclick="addEmoticon('🤾')">🤾</span>
  <span class="emoticon" onclick="addEmoticon('🏋️')">🏋️</span>
  <span class="emoticon" onclick="addEmoticon('🏌️')">🏌️</span>
  <span class="emoticon" onclick="addEmoticon('🏄')">🏄</span>
  <span class="emoticon" onclick="addEmoticon('🛹')">🛹</span>
  <!-- Aggiungi altre emoticon sport qui -->
  <h3>Birthday</h3>
  <span class="emoticon" onclick="addEmoticon('🎂')">🎂</span>
  <span class="emoticon" onclick="addEmoticon('🎈')">🎈</span>
  <span class="emoticon" onclick="addEmoticon('🎉')">🎉</span>
  <span class="emoticon" onclick="addEmoticon('🎁')">🎁</span>
  <span class="emoticon" onclick="addEmoticon('🍰')">🍰</span>
  <span class="emoticon" onclick="addEmoticon('🎊')">🎊</span>
  <span class="emoticon" onclick="addEmoticon('🥳')">🥳</span>
  <span class="emoticon" onclick="addEmoticon('🎶')">🎶</span>
  <span class="emoticon" onclick="addEmoticon('🎵')">🎵</span>
  <span class="emoticon" onclick="addEmoticon('🎤')">🎤</span>
  <span class="emoticon" onclick="addEmoticon('🎁')">🎁</span>
  <span class="emoticon" onclick="addEmoticon('🎊')">🎊</span>
  <span class="emoticon" onclick="addEmoticon('🎉')">🎉</span>
  <span class="emoticon" onclick="addEmoticon('🎈')">🎈</span>
  <span class="emoticon" onclick="addEmoticon('🎂')">🎂</span>
  <span class="emoticon" onclick="addEmoticon('🎈🎁')">🎈🎁</span>
  <span class="emoticon" onclick="addEmoticon('🎂🎉')">🎂🎉</span>
  <span class="emoticon" onclick="addEmoticon('🍰🎊')">🍰🎊</span>
  <span class="emoticon" onclick="addEmoticon('🎁🎶')">🎁🎶</span>
  <span class="emoticon" onclick="addEmoticon('🎉🎤')">🎉🎤</span>
  <span class="emoticon" onclick="addEmoticon('🎈🎂')">🎈🎂</span>
  <span class="emoticon" onclick="addEmoticon('🎵🎊')">🎵🎊</span>
  <span class="emoticon" onclick="addEmoticon('🥳🍰')">🥳🍰</span>
  <span class="emoticon" onclick="addEmoticon('🎉🎁')">🎉🎁</span>

  <!-- Categoria: Caratteri HTML Speciali -->
  <h3>HTML</h3>
  <span class="emoticon" onclick="addEmoticon('&hearts;')">&hearts;</span>
  <span class="emoticon" onclick="addEmoticon('&spades;')">&spades;</span>
  <span class="emoticon" onclick="addEmoticon('&clubs;')">&clubs;</span>
  <span class="emoticon" onclick="addEmoticon('&diams;')">&diams;</span>
  <span class="emoticon" onclick="addEmoticon('&check;')">&check;</span>
  <span class="emoticon" onclick="addEmoticon('&cross;')">&cross;</span>
  <span class="emoticon" onclick="addEmoticon('&starf;')">&starf;</span>
  <span class="emoticon" onclick="addEmoticon('&male;')">&male;</span>
  <span class="emoticon" onclick="addEmoticon('&female;')">&female;</span>
  <span class="emoticon" onclick="addEmoticon('&smile;')">&smile;</span>
  <span class="emoticon" onclick="addEmoticon('&laquo;')">&laquo;</span>
  <span class="emoticon" onclick="addEmoticon('&raquo;')">&raquo;</span>
  <span class="emoticon" onclick="addEmoticon('&copy;')">&copy;</span>
  <span class="emoticon" onclick="addEmoticon('&reg;')">&reg;</span>
  <span class="emoticon" onclick="addEmoticon('&trade;')">&trade;</span>
  <span class="emoticon" onclick="addEmoticon('&euro;')">&euro;</span>
  <span class="emoticon" onclick="addEmoticon('&pound;')">&pound;</span>
  <span class="emoticon" onclick="addEmoticon('&cent;')">&cent;</span>
  <span class="emoticon" onclick="addEmoticon('&yen;')">&yen;</span>
  <span class="emoticon" onclick="addEmoticon('&sect;')">&sect;</span>
  <span class="emoticon" onclick="addEmoticon('&para;')">&para;</span>
  <span class="emoticon" onclick="addEmoticon('&dagger;')">&dagger;</span>
  <span class="emoticon" onclick="addEmoticon('&Dagger;')">&Dagger;</span>
  <span class="emoticon" onclick="addEmoticon('&num;')">&num;</span>
  <span class="emoticon" onclick="addEmoticon('&plusmn;')">&plusmn;</span>
  <span class="emoticon" onclick="addEmoticon('&divide;')">&divide;</span>
  <span class="emoticon" onclick="addEmoticon('&times;')">&times;</span>



  <!-- Categoria: Tabelle -->
  <h3>Table</h3>
  <span class="emoticon" onclick="addEmoticon('<table>\n  <tr>\n    <td>Cella 1</td>\n    <td>Cella 2</td>\n  </tr>\n  <tr>\n    <td>Cella 3</td>\n    <td>Cella 4</td>\n  </tr>\n</table>')">
    🗃️
  </span>
  <span class="emoticon" onclick="addEmoticon('<table>\n  <tr>\n    <th>Intestazione 1</th>\n    <th>Intestazione 2</th>\n  </tr>\n  <tr>\n    <td>Cella 1</td>\n    <td>Cella 2</td>\n  </tr>\n  <tr>\n    <td>Cella 3</td>\n    <td>Cella 4</td>\n  </tr>\n</table>')">
    📊
  </span>

</div>

    <div id="previewContainer">
    <p><strong>Preview post:</strong></p>
    <div id="postPreview" style="display:none;"></div>
    <iframe id="htmlPreview" style="display: none;"></iframe>
  </div>
  <button id="closePopupBtn" class="btn btn-warning">Close</button>
  <input  type="submit" value="Save to the Blockchain" class="btn btn-success">

  <input type="hidden" id="geolocation" name="geolocation" value="">

</form>

<!--<form action="?route=uploadToBlockchain" method="POST" enctype="multipart/form-data" >
   <br> <span for="file" class="description" style="float:left !important;">Scegli un file HTML/CSS/JavaScript (max 10 MB):</span><br>
    <input type="file" id="code" name="code" accept=".html, .css, .js, .jpeg, .jpg, .pdf, .txt" required class="btn btn-success" style=" margin-left:3px;"><br>
    <input type="submit" value="Upload e Salva nella Blockchain" class="btn btn-success" style="float:left; margin-left:3px; ">
</form>-->

</div>

<!--</form>-->
<!--<div class="image-container" style="margin-top: 15px !important;">
  <div class="image-item">
    <img src="../../tema/img/post_video/tiktok.png" alt="Video TikTok">
  </div>
  <div class="image-item">
    <img src="../../tema/img/post_video/youtube.png" alt="Video YouTube">
  </div>
  <div class="image-item">
    <img src="../../tema/img/post_video/vimeo.png" alt="Video Vimeo">
  </div>
    <div class="image-item">
    <img src="../../tema/img/post_video/img.png" alt="image">
  </div>
</div>-->

</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel">Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="messageText"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php if ($_GET['upload']=="ok") {  ?>

<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  Post or comment creation successful!
</div>

<?php } ?>
<?php if ($_GET['upload']=="ko") {  ?>

<div class="alert_red">
  <span class="closebtn_red" onclick="this.parentElement.style.display='none';">&times;</span>
  The content exceeds the maximum size allowed (10MB) or is empty!
</div>

<?php } ?>
<?php if ($_GET['upload']=="errorecode") {  ?>

<div class="alert_red">
  <span class="closebtn_red" onclick="this.parentElement.style.display='none';">&times;</span>
  Error loading file or inserting code.
</div>

<?php } ?>
<?php if ($_GET['upload']=="maxcomment") {  ?>

<div class="alert_red">
  <span class="closebtn_red" onclick="this.parentElement.style.display='none';">&times;</span>
  Error loading comment you have reached the maximum number of comments.
</div>

<?php } ?>
<?php if ($_GET['upload']=="commentko") {  ?>

<div class="alert_red">
  <span class="closebtn_red" onclick="this.parentElement.style.display='none';">&times;</span>
  Error loading comment you have reached the maximum number of characters (200) or less than (3) characters.
</div>

<?php } ?>

<?php 
    
   // Simulazione dell'ottenimento degli ultimi 100 blocchi dalla blockchain

    $jsonFilePath = 'https://www.pervox.online/data/blockchain.json';
    $jsonFilePath_user = 'https://www.pervox.online/data/user.json';

    $jsonContent = file_get_contents($jsonFilePath);
    $jsonContent_user = file_get_contents($jsonFilePath_user);
    
    if ($jsonContent !== false) {
        $data = json_decode($jsonContent, true);
        

    }
    
    if ($jsonContent_user !== false) {
        $data_user = json_decode($jsonContent_user, true);
        

    }

if (!!$_GET['postall']){

    $xxx=$data;

} else {


    $xxx=$blockchainData;
}

?>


            <?php if (!empty($xxx)): // Verifica se $filteredData non è vuoto ?>
                <?php $x=0; foreach (array_reverse($xxx) as $block): ?>
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


<div class="box box-widget" id="section<?php echo $x; ?>">
<div class="box-header with-border">
<div class="user-block">

<?php if (!$_GET['postall']) { ?>

<span class="icon-container" style="float:left !important;"><?php echo base64_decode($user['img']); ?></span>

<?php } else { 


foreach($data_user as $immagini_user){

$superdata[]=$immagini_user['username'];

  if ($immagini_user['email']==$block['data']['author']) {
 ?>
<span class="icon-container" style="float:left !important;"><?php  echo base64_decode($immagini_user['img']); ?></span>

  <?php } else { ?>


    <span></span>

 <?php  }
 }
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

<!--<span class="description"><?php if ($aiValidationResult): ?>
            <p>Validation with AI: Compliant</p>
        <?php else: ?>
            <p>Validation with AI: Not Compliant</p>
        <?php endif; ?></span>-->
<div  id="aut" style="font-size:14px; color:black;"><?php echo $block['data']['author']; ?></div>
<span class="description">Shared publicly <?php echo $output;  ?></span><span style="font-size:10px;" class="description"><?php echo $formatted_date; ?></span>

<!-- Contenitore per le informazioni (inizialmente nascosto) -->


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

<br>
<select style="margin-top: 15px;" id="socialMedia<?=$x?>">
  <option value="twitter">Twitter 🐦</option>
  <option value="reddit">Reddit 📣</option>
  <option value="linkedin">LinkedIn 🔗</option>
</select>
<br><br>
<button type="button" class="btn btn-default btn-xs like-btn like-count" id="like-count" data-post-id="<?= $block['index'] ?>">
        <i class="fa fa-thumbs-o-up"></i> Like
    </button>

    <span class="pull-right text-muted like-count"><?= count($block['data']['liked_posts']); ?> likes</span>
    <span class="pull-right text-muted"><?= count($block['data']['comments']); ?> Comments</span>
<button type="button" id="sharepost<?=$x?>" class="btn btn-default btn-xs" style="float: left; margin-right:5px;"><i class="fa fa-share"></i>


 Share</button>
<?php

// Rimuovi i tag HTML
$content = base64_decode($block['data']['content']);

$content=strip_tags($content);

// Rimuovi i caratteri speciali e mantieni solo lettere, numeri e spazi
$content = preg_replace('/[^a-zA-Z0-9\s]/', '', $content);

$content=str_replace('"', '', $content);

// Limita il testo a 150 caratteri
$content = substr($content, 0, 150);

?>
<script>
document.getElementById("sharepost<?=$x?>").addEventListener("click", function() {
  // Ottieni il contenuto e l'autore del post
  var content = '<?php echo $content; ?>';
  var author = "<?php echo $block['data']['author']; ?>";

  // Rimuovi tutti i tag HTML e limita il testo a 150 caratteri
  content = content.replace(/<[^>]+>/g, ''); // Rimuovi i tag HTML
  content = content.substring(0, 150); // Limita il testo a 150 caratteri
  // Rimuovi tutti i caratteri speciali tranne lettere, numeri e spazi
  content = content.replace(/[^\w\s]/gi, '');
  // Ottieni il social media selezionato dall'utente
  var selectedSocialMedia = document.getElementById("socialMedia<?=$x?>").value;

  // Crea il testo del post da condividere
  var postText = "Check out this post by " + author + ":\n" + content;

  // Apri il social media selezionato
  if (selectedSocialMedia === "twitter") {
    window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(postText));
  } else if (selectedSocialMedia === "reddit") {
    window.open("https://www.reddit.com/submit?url=" + encodeURIComponent(window.location.href) + "&title=" + encodeURIComponent(postText));
  } else if (selectedSocialMedia === "linkedin") {
    window.open("https://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(window.location.href) + "&title=" + encodeURIComponent(postText));
  }
  // Puoi aggiungere altri social media informativi qui utilizzando ulteriori condizioni if/else.
});
</script>

</div>
<?php if (!!$block['data']['comments']) { ?>
<div class="box-footer box-comments" style="display: block;">
<?php
// Timestamp del giorno corrente
$currentDayTimestamp = strtotime('today');

// Inizializza la variabile per il conteggio dei commenti
$verify_commenti = 0;

foreach (array_reverse($block['data']['comments']) as $commento) {
    // Verifica se l'autore del commento è lo stesso dell'utente del post
    if ($commento['author'] == $block['data']['author']) {
        // Verifica se il timestamp del commento è nell'intervallo di un giorno
        if ($commento['timestamp'] >= $currentDayTimestamp) {
            $verify_commenti += 1;
        }
    }

?>

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

<div class="img-responsive img-circle img-sm"><?php echo base64_decode($user['img']); ?></div>
<div class="img-push">
    <form action="?route=uploadToBlockchain#section<?php echo $x; ?>" method="POST" enctype="multipart/form-data">
<input type="text" class="form-control input-sm" id="comment" name="comment" placeholder="Press enter to post comment">
<input type="hidden" name="id_comment" value="<?=$block['index']?>">
<input type="hidden" name="fa_author" value="<?php echo base64_decode($user['img']); ?>">
<input type="hidden" name="verify_commenti" value="<?= $verify_commenti ?>">
</form>
</div>

</div>
</div>

                <?php } ?>
                <?php $x++; endforeach; ?>
            <?php else: ?>
                <p>No data to display.</p>
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

<textarea class="form-control input-lg p-text-area" rows="2" placeholder="Whats in your mind today?"></textarea>

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
<script src="../../tema/javascript/user_profile.js"></script>
<script src="../../tema/javascript/index.js"></script>
<script src="../../tema/javascript/finestra_info.js"></script>
<style type="text/css">
    .cover.profile .cover-info .cover-nav > li > a i {
    font-size: 20px;
    vertical-align: middle;
    margin-right: 10px;
    color: #e4e4e4;
}
</style>
</body>
       
        
    </html>
<?php else: 
      
     header("Location: ?route=login");

 endif; ?>
