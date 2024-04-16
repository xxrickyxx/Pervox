   <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login In Pervox</title>

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
<script src="../../tema/javascript/register.js"></script>
<link href="../../tema/css/login.css" rel="stylesheet">
<link href="../../tema/css/register.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="title">Pervox Login</h1>
    <div class="card">
        <form  method="post" action="/?route=login">
            <a href="#" class="register-link" onclick="home()">Home</a>
              <a href="#" class="register-link" onclick="registerlogin()">Register</a>
            <input type="text"  type="text" id="email" name="email" placeholder=" user id"  required >
            <input type="password"  type="password" id="password" name="password" placeholder=" Password"  required>
            <div class="buttons">

                <button type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</div>


    </body>
</html>


