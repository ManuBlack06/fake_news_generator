    <?php
    function require_login() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }
    }
    require 'vendor/autoload.php'; // Carica il file autoloader di Composer

    $client = new MongoDB\Client("mongodb://localhost:27017"); // Assicurati di sostituire <user>, <password>, <host> e <port> con le tue credenziali e l'indirizzo del tuo server MongoDB

    $db = $client->fakenews; // connessione a database "fakenews"
    $collection = $db->notizie_generate; // accedi alla collection "notizie_generate"
    
    ?>
    