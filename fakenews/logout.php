<?php
session_start();

// Elimina tutte le variabili di sessione
$_SESSION = array();

// Elimina la sessione
session_destroy();

// Reindirizza alla pagina di login
header("Location: index.php");
exit;
?>
