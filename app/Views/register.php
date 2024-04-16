<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register In Pervox</title>

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
<link href="../../tema/css/bootstrap.min.css" rel="stylesheet">
<link href="../../tema/css/font-awesome.min.css" rel="stylesheet">
<link href="../../tema/css/animate.min.css" rel="stylesheet">
<script src="../../tema/javascript/jquery.1.11.1.min.js"></script>
<script src="../../tema/javascript/bootstrap.min.js"></script>
<script src="../../tema/javascript/custom.js"></script>
<script src="https://kit.fontawesome.com/591be47997.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <h1 class="title">Pervox Register</h1>
<?php if (!!$_GET['alert']){ 
echo '<p style="color:red; font-size:12px;">A user with this username already exists.</p>';
} ?>
    <div class="card">
        <form   action="?route=register" method="post">
                  	<a href="#"  class="login-button" onclick="login_register()">Login</button>
            	
                <a href="#" class="login-button" onclick="home()">Home</a>
            <input type="text"  type="text" name="username" placeholder=" username"  required >
            <input  type="password" name="password" placeholder=" Password"  required>
			<select class="darksoul-input" name="iconSelection" id="iconSelection">
							<option value="☠️">Pirate ☠️</option>
							<option value="🦸‍♂️">Superhero 🦸‍♂️</option>
							<option value="👨‍🚀">Astronaut 👨‍🚀</option>
							<option value="🤠">Cowboy 🤠</option>
							<option value="🎩">Butler 🎩</option>
							<option value="🕵️‍♀️">Detective 🕵️‍♀️</option>
							<option value="🗺️">Adventurer 🗺️</option>
							<option value="🧪">Scientist 🧪</option>
							<option value="🤖">Robot 🤖</option>
							<option value="🤺">Knight 🤺</option>
							<option value="🧙‍♂️">Wizard 🧙‍♂️</option>
							<option value="⚔️">Viking ⚔️</option>
							<option value="🏴‍☠️">Caribbean Pirate 🏴‍☠️</option>
							<option value="🦺">Lighthouse Keeper 🦺</option>
							<option value="🎵">Musician 🎵</option>
							<option value="💃">Dancer 💃</option>
							<option value="👨‍⚕️">Doctor 👨‍⚕️</option>
							<option value="👨‍🍳">Chef 👨‍🍳</option>
							<option value="👩‍🚀">Astronaut 👩‍🚀</option>
							<option value="🧛‍♂️">Vampire 🧛‍♂️</option>
							<option value="🤡">Clown 🤡</option>
							<option value="🚒">Firefighter 🚒</option>
							<option value="👮‍♂️">Police Officer 👮‍♂️</option>
							<option value="👷‍♂️">Construction Worker 👷‍♂️</option>
							<option value="🏃‍♂️">Athlete 🏃‍♂️</option>
							<option value="👩‍🏫">Teacher 👩‍🏫</option>
							<option value="🎨">Artist 🎨</option>
							<option value="✈️">Pilot ✈️</option>
							<option value="⛵">Sailor ⛵</option>
							<option value="🌄">Explorer 🌄</option>
							<option value="🔧">Mechanic 🔧</option>
							<option value="👩‍⚕️">Nurse 👩‍⚕️</option>
							<option value="👯‍♀️">Ballerina 👯‍♀️</option>
							<option value="🧚‍♀️">Fairy 🧚‍♀️</option>
							<option value="🧜‍♀️">Mermaid 🧜‍♀️</option>
							<option value="👸">Princess 👸</option>
							<option value="👩‍🏫">Teacher 👩‍🏫</option>
							<option value="👗">Fashion Designer 👗</option>
							<option value="🐶">Veterinarian 🐶</option>
							<option value="✈️">Pilot ✈️</option>
							<option value="👩‍🍳">Chef 👩‍🍳</option>
							<option value="✍️">Writer ✍️</option>
							<option value="💃">Dancer 💃</option>
							<option value="🏃‍♀️">Athlete 🏃‍♀️</option>
							<option value="🎨">Artist 🎨</option>

			</select>
            <div class="buttons">

                <button class="login-button" type="submit" name="submit">Register</button>
            </div>
        </form>
    </div>
</div>



    </body>
</html>