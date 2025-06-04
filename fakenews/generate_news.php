<?php
require "connMongoDB.php";
require "connMySQL.php";
require "header.php";

require_login(); 

$newsData = [];


function generate() {
    global $conn;
    $news = [];
    $stmt = $conn->prepare("SELECT MAX(gruppo) AS max_gruppo FROM titoli");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        $max_gruppo = $result['max_gruppo'];
        if ($max_gruppo > 0) {
            $group = rand(1, $max_gruppo);
            $stmt_titolo = $conn->prepare("SELECT testo FROM titoli WHERE gruppo = ? ORDER BY RAND() LIMIT 1");
            $stmt_titolo->execute([$group]);
            $titolo = $stmt_titolo->fetch(PDO::FETCH_ASSOC);
            $stmt_contenuto = $conn->prepare("SELECT testo FROM contenuti WHERE gruppo = ? ORDER BY RAND() LIMIT 1");
            $stmt_contenuto->execute([$group]);
            $contenuto = $stmt_contenuto->fetch(PDO::FETCH_ASSOC);
            $stmt_immagine = $conn->prepare("SELECT url FROM immagini WHERE gruppo = ? ORDER BY RAND() LIMIT 1");
            $stmt_immagine->execute([$group]);
            $immagine = $stmt_immagine->fetch(PDO::FETCH_ASSOC);
            if ($titolo && $contenuto && $immagine) {
                $news = ['titolo' => $titolo['testo'], 'contenuto' => $contenuto['testo'], 'immagine' => $immagine['url']];
            }
            if (!empty($news)) {
                return $news;
            } else {
                echo "Nessun dato trovato per il gruppo selezionato.";
            }
        } else {
            echo "Il campo 'gruppo' non contiene valori.";
        }
    } else {
        echo "Errore nella query.";
    }
    return []; // Assicurati che la funzione ritorni sempre un array
}

function saveToMongo($newsData){
    global $db;
    $collection = $db->notizie_generate;

    $notizia = [
        'titolo' => $newsData["titolo"],
        'contenuto' => $newsData["contenuto"],
        'immagine' => $newsData["immagine"],
        'data_creazione' => date("Y-m-d H:i:s"),
        'autore' => $_SESSION["username"],
        'visite' => 0
    ];

    try {
        $risultato = $collection->insertOne($notizia);
//        echo json_encode(['success' => true, 'message' => 'Notizia salvata con successo!']);
    } catch (Exception $e) {
//        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["genera"])) {
        $newsData = generate();
    }
    if (isset($_POST["memorizza"]) && isset($_POST["news_data"])) {
        $newsData = json_decode($_POST["news_data"], true);
        saveToMongo($newsData);
    }
}
?>

    <div class="container mt-5">
        <div class="card max-w-50">
            <div class="card-head">
                <h2>Generatore di fakeNews</h2>
            </div>
            <div class="card-body">
                <h4>Genera la tua fakenews, ADESSO!. <br> In modo facile, veloce, fas***b</h4>
                <br>
                <form method="POST" action="">
                    <button class="btn btn-primary" name="genera" type="submit">genera</button>
                    <input type="hidden" name="news_data" value="<?php echo htmlspecialchars(json_encode($newsData)); ?>">
                    <button class="btn btn-primary" name="memorizza" type="submit" <?php if (empty($newsData)) echo 'disabled'; ?>>memorizza</button>
                </form>
                <?php if (!empty($newsData)): ?>
                <div class="mt-4">
                    <h5>Notizia Generata:</h5>
                    <p><strong>Titolo:</strong> <?php echo htmlspecialchars($newsData['titolo']); ?></p>
                    <p><strong>Contenuto:</strong> <?php echo htmlspecialchars($newsData['contenuto']); ?></p>
                    <p><strong>Immagine:</strong> <img src="images/<?php echo htmlspecialchars($newsData['immagine']); ?>" alt="Immagine" width="200"></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php require 'footer.php'; ?>
