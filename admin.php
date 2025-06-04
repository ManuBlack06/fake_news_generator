<?php
require "connMongoDB.php";
require "header.php"; 
require_login(); 
function getStatistics($collection) {
    $totalNews = $collection->countDocuments();
    $mostViewed = $collection->findOne([], ['sort' => ['visite' => -1]]);
    $authors = $collection->aggregate([
        ['$group' => ['_id' => '$autore', 'count' => ['$sum' => 1]]],
        ['$sort' => ['count' => -1]],
        ['$limit' => 1]
    ]);
    $mostProlificAuthor = $authors->toArray()[0] ?? null;

    return [
        'totalNews' => $totalNews,
        'mostViewed' => $mostViewed,
        'mostProlificAuthor' => $mostProlificAuthor
    ];
}

function deleteNews($collection, $newsId) {
    try {
        $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($newsId)]);
        return $result->getDeletedCount() > 0;
    } catch (Exception $e) {
        return false;
    }
}

$collection = $db->notizie_generate;

//Gestione delle richieste POST per cancellare una notizia
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    $deleteSuccess = deleteNews($collection, $deleteId);
    $message = $deleteSuccess ? "Notizia cancellata con successo!" : "Errore nella cancellazione della notizia.";
}

// Ottenere le statistiche
$stats = getStatistics($collection);
?>
    <div class="container mt-5">
        <h1>Admin - Statistiche</h1>
        <div class="mt-4">
            <h3>Statistiche</h3>
            <p><strong>Numero totale di notizie generate:</strong> <?php echo $stats['totalNews']; ?></p>
            <p><strong>Notizia più visualizzata:</strong> 
                <?php echo $stats['mostViewed'] ? $stats['mostViewed']['titolo'] . " (" . $stats['mostViewed']['visite'] . " visite)" : "Nessuna notizia trovata"; ?>
            </p>
            <p><strong>Autore più prolifico:</strong> 
                <?php echo $stats['mostProlificAuthor'] ? $stats['mostProlificAuthor']['_id'] . " (" . $stats['mostProlificAuthor']['count'] . " notizie)" : "Nessun autore trovato"; ?>
            </p>
        </div>

        <div class="mt-4">
            <h3>Cancella Notizie</h3>
            <?php if (isset($message)): ?>
                <div class="alert alert-info"><?php echo $message; ?></div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="delete_id" class="form-label">ID della notizia da cancellare:</label>
                    <input type="text" class="form-control" id="delete_id" name="delete_id" required>
                </div>
                <button type="submit" class="btn btn-danger">Cancella</button>
            </form>
        </div>
    </div>
</body>
</html>