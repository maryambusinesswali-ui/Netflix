<?php require 'config.php';
if (!isset($_SESSION['user_id'])) { echo "<script>window.location='login.php';</script>"; }
$video = $_GET['video'] ?? 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watching - StreamHub</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:#000;color:#fff;font-family:Arial,sans-serif}
        header{background:#000;padding:20px;position:fixed;width:100%;top:0;z-index:1000;display:flex;justify-content:space-between;align-items:center}
        header h1{color:#e50914;font-size:28px}
        nav a{color:#fff;text-decoration:none;margin:0 20px;font-weight:bold}
        main{margin-top:80px;display:flex;flex-direction:column;align-items:center;padding:20px}
        video{width:100%;max-width:1200px;border-radius:15px;box-shadow:0 20px 40px rgba(0,0,0,0.8)}
        .controls{margin-top:20px;display:flex;gap:20px}
        .btn{background:#e50914;color:#fff;padding:12px 25px;border:none;border-radius:50px;cursor:pointer;font-weight:bold}
        .btn:hover{background:#f40612}
        footer{background:#000;text-align:center;padding:30px;color:#777;margin-top:80px}
    </style>
</head>
<body>
    <header>
        <h1>StreamHub</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="browse.php">Browse</a>
            <a href="watchlist.php">My List</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
 
    <main>
        <video controls autoplay>
            <source src="<?= htmlspecialchars($video) ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
 
        <div class="controls">
            <a href="add_to_watchlist.php?video=<?= urlencode($video) ?>" class="btn">Add to My List</a>
            <a href="index.php" class="btn">Back to Home</a>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2026 StreamHub Clone</p>
    </footer>
</body>
</html>
