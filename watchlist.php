<?php require 'config.php';
if (!isset($_SESSION['user_id'])) { echo "<script>window.location='login.php';</script>"; }
 
// Dummy watchlist videos
$watchlist = [
    'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
    'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
    'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4'
];
$titles = ['Big Buck Bunny', 'Elephants Dream', 'For Bigger Blazes'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My List - StreamHub</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:#141414;color:#fff;font-family:Arial,sans-serif}
        header{background:#000;padding:20px;position:fixed;width:100%;top:0;z-index:1000;display:flex;justify-content:space-between;align-items:center}
        header h1{color:#e50914;font-size:28px}
        nav a{color:#fff;text-decoration:none;margin:0 20px;font-weight:bold}
        main{margin-top:80px;padding:40px 20px}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:30px}
        .card{background:#222;border-radius:15px;overflow:hidden;cursor:pointer}
        .card img{width:100%;height:350px;object-fit:cover}
        .card h3{padding:20px;text-align:center}
        footer{background:#000;text-align:center;padding:30px;color:#777;margin-top:80px}
    </style>
</head>
<body>
    <header>
        <h1>StreamHub</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="browse.php">Browse</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
 
    <main>
        <h1 style="text-align:center;margin-bottom:40px;font-size:36px">My List</h1>
        <div class="grid">
            <?php foreach ($watchlist as $i => $video): ?>
                <div class="card" onclick="location.href='watch.php?video=<?= urlencode($video) ?>'">
                    <img src="https://via.placeholder.com/400x600?text=<?= urlencode($titles[$i]) ?>" alt="<?= $titles[$i] ?>">
                    <h3><?= $titles[$i] ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2026 StreamHub Clone</p>
    </footer>
</body>
</html>
