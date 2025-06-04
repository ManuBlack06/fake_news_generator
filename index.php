<?php
require 'vendor/autoload.php';
require "header.php";

$cursor = null;

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->fakenews;
    $collection = $db->selectCollection("notizie_generate");
    $cursor = $collection->find([], ['sort' => ['data_creazione' => -1]]);
} catch (Exception $e) {
    die('Errore connessione MongoDB: ' . $e->getMessage());
}

?>

<div class="container mt-4">
    <h1>Controlla l'Archivio delle nostre notizie!</h1>
    <hr class="mb-4">

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        foreach ($cursor as $document) {
            $id = (string) $document['_id']; // Convert ObjectId to string
            echo "<div class='col'>";
            echo "<a href='notizia.php?id=$id' class='text-reset text-decoration-none'>"; // Link to the article
            echo "<div class='card h-100'>";

            // Immagine
            $immagine = $document['immagine'] ?? '';
            if ($immagine) {
                echo "<img src='images/" . htmlspecialchars($immagine) . "' width='300px' height='168px' alt='immagine' class='card-img-top'>";
            } else {
                echo "<div class='bg-secondary text-white text-center p-3'>Immagine non disponibile</div>";
            }

            echo "<div class='card-body'>";

            // Titolo
            $titolo = $document['titolo'] ?? 'Titolo non disponibile';
            echo "<h5 class='card-title'>" . htmlspecialchars($titolo) . "</h5>";

            // Autore
            $autore = $document['autore'] ?? 'Sconosciuto';
            echo "<p class='card-text'><small class='text-muted'>Autore: " . htmlspecialchars($autore) . "</small></p>";

            // Data creazione
            if (isset($document['data_creazione'])) {
                if ($document['data_creazione'] instanceof MongoDB\BSON\UTCDateTime) {
                    $data = $document['data_creazione']->toDateTime()->format('d/m/Y H:i:s');
                } else {
                    $data = htmlspecialchars($document['data_creazione']);
                }
            } else {
                $data = 'Data non disponibile';
            }

            echo "<p class='card-text'><small class='text-muted'>Data: " . $data . "</small></p>";

            // Contenuto ridotto
            $contenuto = $document['contenuto'] ?? 'Contenuto non disponibile';
            $max_length = 150;
            $truncated_contenuto = strlen($contenuto) > $max_length ? substr($contenuto, 0, $max_length) . "..." : $contenuto;
            echo "<p class='card-text'>" . nl2br(htmlspecialchars($truncated_contenuto)) . "</p>";

            // Visite
            $visite = $document['visite'] ?? 0;
            echo "<p class='card-text'><small class='text-muted'>Visite: " . $visite . "</small></p>";

            echo "</div>"; // card-body
            echo "</div>"; // card
            echo "</a>";
            echo "</div>"; // col
        }
        ?>
    </div>
</div>
<?php require 'footer.php'; ?>
