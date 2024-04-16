<?php


namespace App\Controllers;

class UserController {
    // ... altri metodi ...
public function register() {
    $successMessage = ''; // Inizializza il messaggio di successo vuoto

    // Verifica se l'utente ha inviato il modulo di registrazione
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $originalUsername = $_POST['username'];
        $email = $_POST['username'];
        $password = ($_POST['password'].time().$email.rand(100, 99999));
        $img =  base64_encode($_POST['iconSelection']);

        // Verifica se l'utente esiste già
        $existingUser = $this->getUserByEmail($email);
        if ($existingUser) {
            
            header('Location: /?route=register&alert=duplicate');
            return;
        }

        // Genera automaticamente un username unico
        $username = $this->generateUniqueUsername($originalUsername);

        // Hash della password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Crea un nuovo ID per il nuovo utente 
        $users = json_decode(file_get_contents('data/user.json'), true);
        $newUserId = count($users) + 1;

        // Crea un nuovo utente
        $newUser = [
            'id' => $newUserId,
            'username' => $username,
            'email' => $username,
            'hashed_password' => $hashedPassword,
            'img' => $img,
        ];

        // Verifica se l'utente con l'username generato esiste già
        $existingUsername = $this->getUserByUsername($username);
        if ($existingUsername) {
            $username = $this->generateUniqueUsername($originalUsername);
            $newUser['username'] = $username;
        }

        // Aggiungi il nuovo utente al file user.json
        $users[] = $newUser;
        file_put_contents('data/user.json', json_encode($users, JSON_PRETTY_PRINT));

$successMessage = '<table class="table" id="customers">
    <tr>
        <td style="color:green;">Registration was successful! Your new username is:' . $username . '</td>
    </tr>
    <tr>
        <td>Attention remember your username to be sure you don’t forget it.<br> Download it from the download button and keep it.</td>
    </tr>
    <tr>
        <td colspan="2"><a href="/download.php?email=' . urlencode($username) . '" class="darksoul-btn">Download username</a></td>
    </tr>
</table>';

$successMessage2 = '<table class="table" id="customers">
    <tr>
        <td style="color:green;">Registration was successful! Your new password is:' . $password . '</td>
    </tr>
    <tr>
        <td>Attention remember your password to be sure you don’t forget it.<br> Download it from the download button and keep it.</td>
    </tr>
    <tr>
        <td colspan="2"><a href="/download.php?email=' . urlencode($password) . '" class="darksoul-btn">Download password</a></td>
    </tr>
</table>';

echo $successMessage;
echo $successMessage2;
    }

    // Carica il form di registrazione
    include('app/Views/register.php');
}


// Funzione per generare un username unico
private function generateUniqueUsername($name) {
    $username = strtolower(str_replace(' ', '', $name));
    $username .= rand(100, 999999); // Aggiunge numeri casuali per rendere unico l'username
    return $username;
}



    public function login() {
        // Verifica se l'utente ha inviato il modulo di login
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Simulazione del recupero dell'utente dal file JSON
            $user = $this->getUserByEmail($email);

            // Verifica se l'utente esiste e la password è corretta
            if ($user && password_verify($password, $user['hashed_password'])) {
                // Inizia la sessione e salva l'ID dell'utente
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: /?route=profile&postall=ok&id=' . $user['id']);
                exit();
            } else {
                echo '<p style="color:red;">Invalid credentials.</p>';
            }
        }

        // Carica il form di login
        include('app/Views/login_form.php');
    }


public function sendToMultipleServers() {
    // Leggi la lista dei server dal file JSON
    $serverListFile = 'data/server_list.json';
    $serverListData = file_get_contents($serverListFile);
    $serverList = json_decode($serverListData, true);

    $serverStatuses = [];

    if ($serverList && isset($serverList['servers']) && is_array($serverList['servers'])) {
        foreach ($serverList['servers'] as $server) {
            $name = $server['name'];
            $host = $server['ip'];
            $port = $server['port'];

            // Crea una connessione al server corrente
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

            if ($socket !== false) {
                // Imposta il timeout di connessione a 10 secondi
                socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, ["sec" => 10, "usec" => 0]);

                if (socket_connect($socket, $host, $port)) {
                    $data = "Dati da inviare a $name";
                    socket_write($socket, $data, strlen($data));

                    // Imposta un timeout di lettura a 10 secondi
                    socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, ["sec" => 10, "usec" => 0]);

                    $readResult = socket_read($socket, 1024);
                    if ($readResult === false) {
                        // Server non ha risposto entro il timeout
                        $serverStatuses[$name] = 'Offline';
                    } else {
                        // Server ha risposto
                        socket_close($socket);
                        echo "Dati inviati a $name: $data\n";
                        $serverStatuses[$name] = 'Online';
                    }
                } else {
                    echo "Impossibile connettersi a $name\n";
                    $serverStatuses[$name] = 'Offline';
                }
            } else {
                echo "Impossibile creare il socket per $name\n";
                $serverStatuses[$name] = 'Offline';
            }
        }
    } else {
        echo "Errore nella lettura del file della lista dei server\n";
    }

    // Restituisci l'array degli stati dei server
    return $serverStatuses;
}




public function showServerStatus() {
    // Esegui la funzione sendToMultipleServers per inviare dati a tutti i server
    $this->sendToMultipleServers();

    // Leggi la lista dei server dal file JSON
    $serverListFile = 'data/server_list.json';
    $serverListData = file_get_contents($serverListFile);
    $serverList = json_decode($serverListData, true);

    // Include la vista server_status.php passando la lista dei server
     include('app/Views/server_status.php');
}


public function likePost($postId, $userEmail) {
    // Carica i post dal file blockchain.json
    $posts = json_decode(file_get_contents('data/blockchain.json'), true);

    // Trova il post specifico basato su l'ID del post
    $likedPost = null;
    foreach ($posts as $index => $post) {
        if ($post['index'] == $postId) {
            $likedPost = &$posts[$index]; // Utilizza &$posts[$index] invece di &$post
            break;
        }
    }
    // Get the authenticated user's email from the session
    $userEmail = $this->getAuthenticatedUserEmail();
    
    if ($likedPost !== null) {
        // Verifica se l'utente ha già messo like a questo post basato sull'email dell'utente
        $likedPostsArray = $likedPost['data']['liked_posts'] ?? []; // Ottieni l'array dei liked_posts

        if (in_array($userEmail, $likedPostsArray)) { //  verifica  $userEmail
            echo json_encode(['message' => 'You have already liked this post.']);
            return;
        }

        // Aggiorna il post con il nuovo like basato sull'email dell'utente
    

        $likedPostsArray[] = $userEmail; // Aggiungi l'email dell'utente invece dell'ID del post
        $likedPost['data']['liked_posts'] = $likedPostsArray;
        $likedPost['data']['px_coin']++;

        // Salva le modifiche nel file blockchain.json
        file_put_contents('data/blockchain.json', json_encode($posts, JSON_PRETTY_PRINT));

        // Restituisci la risposta JSON
        echo json_encode(['message' => 'You have successfully liked the post!']);
    } else {
        // Restituisci la risposta JSON per il caso in cui il post non sia stato trovato
        echo json_encode(['message' => 'Post not found.']);
    }
}



// Metodo per ottenere un utente in base all'username
private function getUserByUsername($username) {
    $users = json_decode(file_get_contents('data/user.json'), true);
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            return $user;
        }
    }
    return null; // L'utente non esiste
}



private function calculateTotalPxCoin($authenticatedUserEmail) {
    $blockchainData = json_decode(file_get_contents('data/blockchain.json'), true);
    $totalPxCoin = 0;

    foreach ($blockchainData as $block) {
        if ($block['data']['author'] == $authenticatedUserEmail) {
            $totalPxCoin += intval($block['data']['px_coin'] ?? 0);
        }

        if ($block['data']['receives'] == $authenticatedUserEmail) {
            $totalPxCoin -= intval($block['data']['px_coin'] ?? 0);
        }
    }

    return $totalPxCoin;
}


public function transferPxCoin() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $recipientUsername = $_POST['recipientUsername'];
        $amount = intval($_POST['amount']);
        $id = $_POST['id'];

        // Verifica se l'utente autenticato ha abbastanza px_coin
        $authenticatedUserEmail = $this->getAuthenticatedUserEmail();
        $totalPxCoin = $this->calculateTotalPxCoin($authenticatedUserEmail);


        if ($totalPxCoin < $amount) {
            echo 'Insufficient Px coin for transfer.';
            return;
        }

        // Trova l'utente destinatario
        $recipientUser = $this->getUserById($id);

        if (!$recipientUser) {
            echo 'Recipient not found.';
            return;
        }

        // Esegui il trasferimento
        $blockchainData = json_decode(file_get_contents('data/blockchain.json'), true);

        if ($totalPxCoin >= $amount) {
            foreach ($blockchainData as &$block) {
                if ($block['data']['author'] == $authenticatedUserEmail && $amount > 0) {
                    // Esegui il trasferimento
                    $totalPxCoin -= $amount;

                    $recipientUserEmail = $_POST['recipientUsername']; // Utilizza l'email del destinatario

                            // Verifica se l'utente autenticato esiste nel file JSON user.json
                    if (!$this->getUserByUsername($recipientUserEmail)) {
                        echo  'User does not exist.';
                        return;
                    }

                    $recipientBlockchainData = $this->getBlockchainData($recipientUserEmail);

                    // Crea il nuovo blocco per la transazione
                    $newBlock = [
                        'index' => count($blockchainData), // Nuovo indice
                        'timestamp' => time(),
                        'data' => [
                            'type' => 'transfer',
                            'content' => 'Transfer of px_coin',
                            'author' => $recipientUserEmail,
                            'receives' => $authenticatedUserEmail,
                            'px_coin' => $amount,
                            'liked_posts' => [],
                        ],
                        'previous_hash' => isset($blockchainData[count($blockchainData) - 1]) ? $blockchainData[count($blockchainData) - 1]['hash'] : '0', // Hash del blocco precedente
                    ];

                    // Calcola l'hash del nuovo blocco
                    $newBlock['hash'] = md5(serialize($newBlock));

                    // Aggiungi il nuovo blocco alle blockchain dei due utenti
                    $blockchainData[] = $newBlock;
                    $recipientBlockchainData[] = $newBlock;

                    // Aggiorna i file JSON delle blockchain
                    file_put_contents('data/blockchain.json', json_encode($blockchainData, JSON_PRETTY_PRINT));
                //    file_put_contents('data/blockchain.json', json_encode($recipientBlockchainData, JSON_PRETTY_PRINT));

                    echo 'Px coin transfer successful.';
                    break;
                }
            }
        } else {
            echo 'Insufficient total Px coin for transfer';
        }
    }
}




public function showProfile($userId, $searchContent = '', $searchAuthor = '') {
    // Simulazione del recupero dell'utente dal file JSON
    $user = $this->getUserById($userId);
    // Assicurati di avere accesso alle variabili $searchContent e $searchAuthor
    $searchContent = isset($_GET['searchContent']) ? $_GET['searchContent'] : '';
    $searchAuthor = isset($_GET['searchAuthor']) ? $_GET['searchAuthor'] : '';
    $jsonFilePath = 'https://www.pervox.online/data/blockchain.json';

    $jsonContent = file_get_contents($jsonFilePath);
    
    if ($jsonContent !== false) {
        $data = json_decode($jsonContent, true);
        

    }
     
    // Ottieni l'email dell'utente autenticato dalla sessione
    session_start();
    $authenticatedUserEmail = $this->getAuthenticatedUserEmail();

    $blockchainData = $this->getBlockchainData($authenticatedUserEmail);
    $totalPxCoin = $this->calculateTotalPxCoin($authenticatedUserEmail);

    // Simulazione della validazione con l'IA
    $aiValidationResult = $this->validateWithAI($user);

    // Filtra i post in base al contenuto
    if (!empty($searchContent)) {
        $blockchainData = array_filter($data, function ($block) use ($searchContent) {
            return stripos(base64_decode($block['data']['content']), $searchContent) !== false;
        });
    }

    // Filtra i post in base all'autore
    if (!empty($searchAuthor)) {
        $blockchainData = array_filter($data, function ($block) use ($searchAuthor) {
            return stripos($block['data']['author'], $searchAuthor) !== false;
        });
    } 

    // Passa i dati alla vista usando extract() prima dell'include
        extract(compact('user', 'aiValidationResult', 'blockchainData', 'totalPxCoin'));

    // Carica la vista del profilo utente con i dati dell'utente e il risultato dell'IA
    include('app/Views/user_profile.php');
}


    public function showHome() {

    // Assicurati di avere accesso alle variabili $searchContent e $searchAuthor
    $searchContent = isset($_GET['searchContent']) ? $_GET['searchContent'] : '';
    $searchAuthor = isset($_GET['searchAuthor']) ? $_GET['searchAuthor'] : '';
    $jsonFilePath = 'https://www.pervox.online/data/blockchain.json';

    $jsonContent = file_get_contents($jsonFilePath);
    
    if ($jsonContent !== false) {
        $data = json_decode($jsonContent, true);
        

    }
    $searchContent = isset($_GET['searchContent']) ? $_GET['searchContent'] : '';
    $searchAuthor = isset($_GET['searchAuthor']) ? $_GET['searchAuthor'] : '';
        // Filtra i post in base al contenuto
    if (!empty($searchContent)) {
        $blockchainData = array_filter($data, function ($block) use ($searchContent) {
            return stripos(base64_decode($block['data']['content']), $searchContent) !== false;
        });
    }

    // Filtra i post in base all'autore
    if (!empty($searchAuthor)) {
        $blockchainData = array_filter($data, function ($block) use ($searchAuthor) {
            return stripos($block['data']['author'], $searchAuthor) !== false;
        });
    } 

    // Passa i dati alla vista usando extract() prima dell'include
        extract(compact('blockchainData'));
        // Carica la vista del profilo utente con i dati dell'utente e il risultato dell'IA
        include('app/Views/home.php');
    }

    private function getUserById($userId) {
        $users = json_decode(file_get_contents('data/user.json'), true);

        foreach ($users as $user) {
            if ($user['id'] == $userId) {
                return $user;
            }
        }
        return null;
    }

        private function getAuthenticatedUserEmail() {
        // Implementa il recupero dell'email dell'utente autenticato dalla sessione
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            // Utilizza il metodo getUserById o simile per ottenere l'email
            $user = $this->getUserById($userId);
            return $user['email'];
        }
        return null;
    }


    private function validateWithAI($user) {
        // Implementazione della validazione con l'IA
        // Restituisci un risultato di validazione (es. true/false)
        return true;
    }

    private function getUserByEmail($email) {
        $users = json_decode(file_get_contents('data/user.json'), true);
        foreach ($users as $user) {
            if ($user['email'] == $email) {
                return $user;
            }
        }
        return null;
    }

private function getBlockchainData($authenticatedUserEmail) {
    $blockchainData = json_decode(file_get_contents('data/blockchain.json'), true);
    $filteredData = array(); // Inizializza l'array vuoto

    foreach ($blockchainData as $block) {
        if ($block['data']['author'] == $authenticatedUserEmail) {
            $filteredData[] = $block;
        }
    }

    return $filteredData;
}
/*
public function upload() {
    session_start();
    $userId = $_SESSION['user_id'];
    //  recupero dell'utente dal file JSON
    $user = $this->getUserById($userId);

    $authenticatedUserEmail = $this->getAuthenticatedUserEmail();
    $blockchainData = $this->getBlockchainData($authenticatedUserEmail);
    // Simulazione della validazione con l'IA
    $aiValidationResult = $this->validateWithAI($user);
    // Passa i dati alla vista usando extract() prima dell'include
    extract(compact('user', 'aiValidationResult',  'blockchainData'));

    // Carica la vista per l'upload sulla blockchain
    //include('app/Views/upload_page.php');
    include('app/Views/user_profile.php');
}*/

public function mergeJsonFiles() {
    // Leggi il contenuto dei file JSON
    $blockchainData = json_decode(file_get_contents('data/blockchain.json'), true);
    $userData = json_decode(file_get_contents('data/user.json'), true);

    // Unisci i due array
    $mergedData = array_merge($blockchainData, $userData);

    // Scrivi il nuovo array combinato nel file blockchain.json
    file_put_contents('data/blockchain_verify.json', json_encode($mergedData, JSON_PRETTY_PRINT));

    echo "File JSON merge with success!";
}



public function uploadToBlockchain() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    $geolocation = $_POST['geolocation'];
    $id_comment=$_POST['id_comment'];
    // Carica la blockchain esistente
    $blockchain = json_decode(file_get_contents('data/blockchain.json'), true);

    // Recupera l'autore del commento (ad esempio, l'utente autenticato)
    $commentAuthor = $this->getAuthenticatedUserEmail();
    $fa_author = $_POST['fa_author'];
    $verify_commenti=$_POST['verify_commenti'];

    if (is_array($blockchain)) {
        // Trova il blocco a cui desideri aggiungere il commento (puoi usare un criterio specifico per identificarlo)
        $blockIndex = $id_comment; 

    if (isset($blockchain[$blockIndex])) {


            // Verifica la dimensione del contenuto (massimo 200 caratteri)
    $contentLength = $comment;


    if(strlen($contentLength) > 200 OR strlen($contentLength) < 3){

        session_start();
        $id = $_SESSION['user_id'];

        header("Location: /?route=profile&postall=ok&upload=commentko&id=" . $id);
        exit();
    }

    if($verify_commenti >= 20){

        session_start();
        $id = $_SESSION['user_id'];

        header("Location: /?route=profile&postall=ok&upload=maxcomment&id=" . $id);
        exit();
    }
            // Aggiungi il commento all'array dei commenti del blocco esistente
            $blockchain[$blockIndex]['data']['comments'][] = [
                'author' => $commentAuthor,
                'comment' => $comment,
                'timestamp' =>time(),
                'fa_author' => $fa_author,
            ];

            // Aumenta di 1 il valore di px_coin
            $blockchain[$blockIndex]['data']['px_coin'] += 1;

            // Aggiorna l'hash del blocco
            $blockchain[$blockIndex]['hash'] = md5(serialize($blockchain[$blockIndex]));

            // Salva la blockchain aggiornata
            file_put_contents('data/blockchain.json', json_encode($blockchain, JSON_PRETTY_PRINT));

            // Reindirizza alla pagina di conferma dell'upload o a qualsiasi altra destinazione desiderata
            header('Location: app/Views/upload_confirmation.php');
            exit();
        }
    }
}


        if (isset($_POST['xcode'])) {
            // Caricamento tramite campo di testo
            $code = $_POST['xcode'];
            
            // Converti il codice in Base64
            $base64Code = base64_encode($code);

            // Verifica la dimensione del contenuto (massimo 10MB)
            $contentSizeMB = strlen($base64Code) / 1024 / 1024; // Converti in megabyte
            // Verifica la dimensione del contenuto (massimo 10 kilobyte)
            $contentSizeKB = strlen($base64Code) / 1024; // Converti in kilobyte
   
            if ($contentSizeMB > 10 OR $contentSizeKB < 0.1) {
                session_start();
                $id=$_SESSION['user_id'];

                header("Location: /?route=profile&postall=ok&upload=ko&id=".$id);

                exit();
            }

            //caricamento della blockchain esistente
            $blockchain = json_decode(file_get_contents('data/blockchain.json'), true);
            $geolocation = $_POST['geolocation'];

            // Costruisco il nuovo blocco
            $newBlock = [
                'index' => count($blockchain), // Nuovo indice
                'timestamp' => time(),
                'data' => [
                    'type' => 'text',  // Aggiungi il tipo di contenuto (puoi personalizzare)
                    'content' => $base64Code,
                    'author' => $this->getAuthenticatedUserEmail(),
                    'px_coin' => 0,
                    'liked_posts' => [
                                '0'
                             ],
                    'comments' => [],   // Aggiunto campo 'comments' inizializzato come un array vuoto
                    'no_like' => 0,     // Aggiunto campo 'no_like' inizializzato a 0
                    'geoloc' => $geolocation    // Aggiunto campo 'geoloc' inizializzato come stringa vuota                     
                ],
                'previous_hash' => isset($blockchain[count($blockchain) - 1]) ? $blockchain[count($blockchain) - 1]['hash'] : '0', // Hash del blocco precedente
                'hash' => md5(serialize($newBlock)) // calcolo dell'hash
            ];

            // Aggiungo il nuovo blocco alla blockchain
            $blockchain[] = $newBlock;

            // Salvo la blockchain aggiornata
            file_put_contents('data/blockchain.json', json_encode($blockchain, JSON_PRETTY_PRINT));

            // Reindirizzo alla pagina di conferma dell'upload
            header('Location: app/Views/upload_confirmation.php');
            exit();
        } elseif (isset($_FILES['code']) && $_FILES['code']['error'] === UPLOAD_ERR_OK) {
            // Caricamento tramite upload di file
            $fileContent = file_get_contents($_FILES['code']['tmp_name']);
            // Converti il codice in Base64
            $base64Code = base64_encode($fileContent);

            // Verifica la dimensione del contenuto (massimo 10MB)
            $contentSizeMB = strlen($base64Code) / 1024 / 1024; // Converti in megabyte
            // Verifica la dimensione del contenuto (massimo 10 kilobyte)
            $contentSizeKB = strlen($base64Code) / 1024; // Converti in kilobyte
           
            if ($contentSizeMB > 10 OR $contentSizeKB < 0.1) {
                session_start();
                $id=$_SESSION['user_id'];

                header("Location: /?route=profile&postall=ok&upload=ko&id=".$id);
                exit();
            }

            // Simulazione del caricamento della blockchain esistente
            $blockchain = json_decode(file_get_contents('data/blockchain.json'), true);

            // Costruisco il nuovo blocco
            $newBlock = [
                'index' => count($blockchain), // Nuovo indice
                'timestamp' => time(),
                'data' => [
                    'type' => 'text',  // Aggiungi il tipo di contenuto (puoi personalizzare)
                    'content' => $base64Code,
                    'author' => $this->getAuthenticatedUserEmail(),
                    'px_coin' => 0,
                    'liked_posts' => [
                                '0'
                             ],    

                    'comments' => [],   // Aggiunto campo 'comments' inizializzato come un array vuoto
                    'no_like' => 0,     // Aggiunto campo 'no_like' inizializzato a 0
                    'geoloc' => $geolocation     // Aggiunto campo 'geoloc' inizializzato come stringa vuota

                ],
                'previous_hash' => isset($blockchain[count($blockchain) - 1]) ? $blockchain[count($blockchain) - 1]['hash'] : '0', // Hash del blocco precedente
                'hash' => md5(serialize($newBlock)) // calcolo dell'hash
            ];

            // Aggiungo il nuovo blocco alla blockchain
            $blockchain[] = $newBlock;

            // Salvo la blockchain aggiornata
            file_put_contents('data/blockchain.json', json_encode($blockchain, JSON_PRETTY_PRINT));

            // Reindirizzo alla pagina di conferma dell'upload
            header('Location: app/Views/upload_confirmation.php');
            exit();
        } else {
                session_start();
                $id=$_SESSION['user_id'];

                header("Location: /?route=profile&postall=ok&upload=errorecode&id=".$id);
        }





    }
}





}
