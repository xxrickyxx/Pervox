<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // Eseguire eventuali operazioni di elaborazione del valore $email qui
    // Ad esempio, se vuoi fornire il valore come un file da scaricare:

    $filename = "email.txt"; // Nome del file
    $content = $email; // Contenuto del file

    // Impostare le intestazioni HTTP per il download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . strlen($content));

    // Output del contenuto del file
    echo $content;
    exit;
} else {
    // Gestire il caso in cui il parametro email non sia presente nell'URL
    echo "Email not found.";
}
?>
