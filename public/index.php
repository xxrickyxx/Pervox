<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';  // Configurare il database
require_once __DIR__ . '/../config/blockchain.php';  // Configurare la blockchain
require_once __DIR__ . '/../config/ai.php';  // Configurare l'IA

use App\Controllers\UserController;  
use App\Controllers\ServerController;  
// Routing semplice
$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'profile':
        $userController = new UserController();
        $userController->showProfile($_GET['id'], $_GET['searchContent'], $_GET['searchAuthor']);
        break;
    case 'login':
        $userController = new UserController();
        $userController->login();
        break;
        case 'upload':
        $userController = new UserController();
        $userController->upload();
        break;
        case 'uploadToBlockchain':
        $userController = new UserController();
        $userController->uploadToBlockchain();
        break;
        case 'register':
        $userController = new UserController();
        $userController->register();
        break;
        case 'likePost':
        $userController = new UserController();
        $userController->likePost($_GET['postid'], $_GET['useremail']);
        break;
        case 'transferPxCoin':
        $userController = new UserController();
        $userController->transferPxCoin();
        break;
        case 'merge':
        $userController = new UserController();
        $userController->mergeJsonFiles();
        break;
        case 'showServerStatus':
        $ServerController = new ServerController();
        $ServerController->showServerStatus();
        break;
        case 'verifyBlockchainFiles':
        $ServerController = new ServerController();
        $ServerController->verifyBlockchainFiles();
        break;
    // Aggiungi altri casi per il routing
    default:
        $userController = new UserController();
        $userController->showHome($_GET['searchContent'], $_GET['searchAuthor']);

}


