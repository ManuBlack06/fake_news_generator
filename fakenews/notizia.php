<?php
require 'vendor/autoload.php';
require 'header.php';
$cursor = null;
$id = null;

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->fakenews;
    $collection = $db->selectCollection("notizie_generate");

    if (!isset($_GET['id'])) {
        die('ID non specificato');
    }

    $id = $_GET['id'];
    $objectId = new MongoDB\BSON\ObjectId($id);
    $cursor = $collection->findOne(['_id' => $objectId]);

    if (!$cursor) {
        die('Notizia non trovata');
    }

    $collection->updateOne(['_id' => $objectId], ['$inc' => ['visite' => 1]]);
    $cursor['visite'] = ($cursor['visite'] ?? 0) + 1;

} catch (Exception $e) {
    die('Errore connessione MongoDB: ' . $e->getMessage());
}
?>

<div class="container my-5">
    <h1 class="mb-4 text-center">Archivio Notizie</h1>
    <article class="border rounded p-4 shadow-sm bg-light">
        <h2 class="mb-3"><?php echo htmlspecialchars($cursor['titolo']); ?></h2>
       
        <?php if (!empty($cursor['immagine'])): ?>
            <img src="images/<?php echo htmlspecialchars($cursor['immagine']); ?>" alt="Immagine notizia" class="img-fluid my-3" style="max-width: 400px;">
        <?php endif; ?>
        <p><?php echo nl2br(htmlspecialchars($cursor['contenuto'] ?? 'Contenuto non disponibile')); ?></p>
        <p><strong>Autore:</strong> <?php echo htmlspecialchars($cursor['autore'] ?? 'Sconosciuto'); ?></p>
            <strong>Data:</strong>
            <?php
                if (isset($cursor['data_creazione'])) {
                    if ($cursor['data_creazione'] instanceof MongoDB\BSON\UTCDateTime) {
                        echo $cursor['data_creazione']->toDateTime()->format('d/m/Y H:i:s');
                    } else {
                        echo htmlspecialchars($cursor['data_creazione']);
                    }
                } else {
                    echo 'Data non disponibile';
                }
            ?>
        </p>
        <p><strong>Visite:</strong> <?php echo $cursor['visite']; ?></p>
    </article>
</div>

<?php require 'footer.php'; ?>

