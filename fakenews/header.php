<?php session_start(); ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake News BLM®</title>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="script.js"></script>
    <style>
        body { font-family: 'Lexend', sans-serif; font-size: 1rem; margin: 0; }
        html { font-size: 18px; }
        h1, h2, h3 { font-size: 2rem; }
        p { font-size: 1.2rem; }
        .navbar { padding: 0.5rem 1rem; }
        .navbar-brand { font-size: 1.6rem; display: flex; align-items: center; }
        .navbar-brand img { width: 30px; height: auto; margin-right: 10px; }
        .navbar-nav .nav-link { font-size: 1rem; }
        .navbar-nav { margin-left: auto; }
        .navbar-nav .nav-item { padding-left: 15px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Logo"> Fake News BLM®
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="bi bi-newspaper"></i> Sfoglia notizie</a></li>
                <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"]): ?>
                <li class="nav-item"><a class="nav-link" href="generate_news.php"><i class="bi bi-plus-circle-fill"></i> Genera notizie</a></li>
                <li class="nav-item"><a class="nav-link" href="admin.php"><i class="bi bi-graph-up"></i> Statistiche</a></li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item"><span class="nav-link"><i class="bi bi-person-fill"></i> <?php echo htmlspecialchars($_SESSION['username']); ?></span></li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                <?php else: ?>
                <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                <li class="nav-item"><a class="nav-link" href="register.php"><i class="bi bi-person-plus-fill"></i> Registrati</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

