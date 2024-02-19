<?php

namespace App\Controllers;

class ServerController {

public function verifyBlockchainFiles() {
    // Leggi la lista dei server dal file JSON
    $serverListFile = 'data/server_list.json';
    $serverListData = file_get_contents($serverListFile);

    if ($serverListData === false) {
        echo "Error reading server list file\n";
        return;
    }

    $serverList = json_decode($serverListData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Error decoding the servers JSON file\n";
        return;
    }

    // Leggi la blockchain locale una sola volta
    $localBlockchainFile = 'data/blockchain_verify.json';
    $localBlockchainData = file_get_contents($localBlockchainFile);
    $localBlockchain = json_decode($localBlockchainData, true);

    if ($localBlockchain === null) {
        echo "Error reading local blockchain\n";
        return;
    }

    // Loop attraverso i server
    foreach ($serverList['servers'] as $server) {
        $name = $server['name'];
        $host = $server['ip'];
        $port = $server['port'];

        // Esegui la funzione sendGetBlockchainRequest per ottenere la blockchain dal server
        $serverBlockchain = $this->sendGetBlockchainRequest($host, $port);

        if ($serverBlockchain === null) {
            $msgs= "Error requesting blockchain from $name\n";
            continue;
        }

        // Verifica se il file blockchain_verify.json è identico
        $verifyFile = 'data/blockchain_verify.json';
        $verifyData = json_encode($localBlockchain, JSON_PRETTY_PRINT);

        if ($verifyData === false) {
            $msg= "Error creating verification data\n";
            continue;
        }

        // Scrivi i dati di verifica nel file blockchain_verify.json
        $writeResult = file_put_contents($verifyFile, $verifyData);

        if ($writeResult === false) {
            $msg= "Error writing verification file\n";
            continue;
        }

        // Invia il file di verifica a questo server
        $verifyResult = $this->sendBlockchainVerifyFile($host, $port);

        if ($verifyResult !== true) {
            $msg= "Error sending verification file to $name\n";
        } else {
            $msg= "Verification completed successfully for $name\n";
        }
    }


$templateData = [
    'serverStatuses' => $msgs,
    'blockchainStatuses' => $msg,
];

    // Estrai le variabili dall'array
    extract($templateData);

    // Include la vista home.php
    include('app/Views/server_status.php');

}

private function sendBlockchainVerifyFile($host, $port) {
    // Implementa il codice per inviare il file blockchain_verify.json al server specificato
}


public function sendToMultipleServers() {
    // Leggi la lista dei server dal file JSON
    $serverListFile = 'data/server_list.json';
    $serverListData = file_get_contents($serverListFile);

    if ($serverListData === false) {
        echo "Errore nella lettura del file della lista dei server\n";
        return;
    }

    $serverList = json_decode($serverListData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Errore nella decodifica del file JSON dei server\n";
        return;
    }

    $serverStatuses = [];

    if ($serverList && isset($serverList['servers']) && is_array($serverList['servers'])) {
        foreach ($serverList['servers'] as $server) {
            $name = $server['name'];
            $address = $server['ip'];
            $port = $server['port'];

            // Verifica se l'indirizzo è un URL o un indirizzo IP
            if (filter_var($address, FILTER_VALIDATE_URL)) {
                $urlComponents = parse_url($address);
                $host = $urlComponents['host'];
                $port = isset($urlComponents['port']) ? $urlComponents['port'] : 443; // Porta HTTPS di default
            } else {
                $host = $address;
            }

            // Continua con il resto del codice per la connessione e il controllo dello stato del server come prima
            // ...
        }
    } else {
        echo "Errore nella lettura del file della lista dei server\n";
    }

    // Restituisci l'array degli stati dei server
    return $serverStatuses;
}


private function sendGetBlockchainRequest($host, $port)
{
    // Check if $host is a valid URL
    if (filter_var($host, FILTER_VALIDATE_URL)) {
        $urlComponents = parse_url($host);
        $scheme = isset($urlComponents['scheme']) ? $urlComponents['scheme'] : 'http'; // Default to HTTP if scheme is not provided
        $host = $urlComponents['host'];
        $port = isset($urlComponents['port']) ? $urlComponents['port'] : ($scheme === 'https' ? 443 : 80); // Default ports for HTTP and HTTPS
    } else {
        // If $host is not a URL, assume HTTP scheme
        $scheme = 'http';
    }

    // Construct the full URL with the scheme
    $url = $scheme . '://' . $host;
    if (!in_array($port, [80, 443])) {
        $url .= ':' . $port;
    }
    $url .= '/data/blockchain.json';

    // Initialize cURL
    $ch = curl_init();

    // Set the URL for the request
    curl_setopt($ch, CURLOPT_URL, $url);

    // Set option to receive the content as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the request
    $serverBlockchainData = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        return 'Errore nella richiesta HTTP: ' . curl_error($ch);
    }

    // Close the cURL resource
    curl_close($ch);

    // Decode the received JSON data
    $serverBlockchain = json_decode($serverBlockchainData, true);

    // Check if JSON decoding was successful
    if ($serverBlockchain === null) {
        return 'Errore nella lettura della blockchain dal server';
    }

    // Continue with the rest of your code...

    return $serverBlockchain; // Return the server's blockchain data
}



public function showServerStatus() {
    // Leggi la lista dei server dal file JSON
    $serverListFile = 'data/server_list.json';
    $serverListData = file_get_contents($serverListFile);

    if ($serverListData === false) {
        echo "Errore nella lettura del file della lista dei server\n";
        return;
    }

    $serverList = json_decode($serverListData, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "Errore nella decodifica del file JSON dei server\n";
        return;
    }

    // Esegui la funzione sendToMultipleServers per inviare dati a tutti i server
    $serverStatuses = $this->sendToMultipleServers();

    // Inizializza l'array di blockchainStatuses
    $blockchainStatuses = [];

    // Leggi la blockchain locale una sola volta
    $localBlockchainFile = 'data/blockchain.json';
    $localBlockchainData = file_get_contents($localBlockchainFile);
    $localBlockchain = json_decode($localBlockchainData, true);

    if ($localBlockchain === null) {
        echo "Errore nella lettura della blockchain locale\n";
        return;
    }

    // Loop attraverso i server
    foreach ($serverList['servers'] as $server) {
        $name = $server['name'];
        $host = $server['ip'];
        $port = $server['port'];

        // Esegui la funzione sendGetBlockchainRequest per ottenere la blockchain dal server
        $serverBlockchain = $this->sendGetBlockchainRequest($host, $port);

        if ($serverBlockchain === null) {
            $blockchainStatuses[$name] = 'Errore durante la richiesta blockchain';
            continue;
        }

        // Verifica la sincronizzazione e la correttezza dei blocchi
        $isSynchronized = ($localBlockchain == $serverBlockchain);

        if ($isSynchronized) {
            $blockCount = count($serverBlockchain);

            for ($i = 1; $i < $blockCount; $i++) {
                $block = $serverBlockchain[$i];
                $previousBlock = $serverBlockchain[$i - 1];

                // Verifica l'hash del blocco
             /*   $computedHash = hash('sha256', json_encode($block));
                if ($computedHash !== $block['hash']) {
                    $blockchainStatuses[$name] = 'Blockchain compromessa';
                    break; // Esci dal ciclo al primo blocco compromesso
                }*/

                // Verifica l'hash precedente, ma considera il blocco genesi
                if ($i !== 1 && $block['previous_hash'] !== $previousBlock['hash']) {
                    $blockchainStatuses[$name] = 'Corrupt blockchain 🚫';
                    break; // Esci dal ciclo al primo blocco compromesso
                } else {
                     $blockchainStatuses[$name] = 'Blockchain  ✅';
                }
            }
        } else {
            $blockchainStatuses[$name] = 'Not synchronized ☠';
        }

    }

    // Creazione di un array associativo con le variabili da rendere disponibili nel template
    $templateData = [
        'serverStatuses' => $serverStatuses,
        'blockchainStatuses' => $blockchainStatuses,
    ];

    // Estrai le variabili dall'array
    extract($templateData);

    // Include la vista home.php
    include('app/Views/server_status.php');
}






}