<?php
session_start();
$id=$_SESSION['user_id'];
// Esempio di reindirizzamento
header("Location: /?route=profile&postall=ok&upload=ok&id=".$id);
exit; // Assicurati di usare exit() dopo il reindirizzamento per terminare lo script corrente
?>


<!DOCTYPE html>
<html>
<head>
    <title>Upload alla Blockchain - Conferma</title>
</head>
<body>
    <h1>Upload to Blockchain - Confirm</h1>
    <p>Your data has been uploaded and saved to the blockchain successfully!</p>
    <p><a href="/?route=profile">Upload another code</a></p>
</body>
</html>
