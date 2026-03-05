<?php require 'config.php';
if (!isset($_SESSION['user_id'])) { echo "<script>window.location='login.php';</script>"; }
 
// Dummy content (in real app from DB)
$featured = [
    ['title' => 'Stranger Things', 'image' => 'https://via.placeholder.com/800x450?text=Stranger+Things', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4'],
    ['title' => 'The Witcher', 'image' => 'https://via.placeholder.com/800x450?text=The+Witcher', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4'],
    ['title' => 'Money Heist', 'image' => 'https://via.placeholder.com/800x450?text=Money+Heist', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4']
];
 
$trending = array_merge($featured, $featured); // duplicate for demo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamHub - Watch Movies & Shows</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:#141414;color:#fff;font-family:Arial,sans-serif}
        header{background:#000;padding:20px;position:fixed;width:100%;top:0;z-index:1000;display:flex;justify-content:space-between;align-items:center}
        header h1{color:#e50914;font-size:28px}
        nav a{color:#fff;text-decoration:none;margin:0 20px;font-weight:bold}
        main{margin-top:80px;padding:20px}
        .hero{background:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('https://via.placeholder.com/1920x1080?text=Featured');background-size:cover;height:80vh;display:flex;align-items:center;justify-content:center;text-align:center}
        .hero h1{font-size:60px;margin-bottom:20px}
        .hero p{font-size:24px;margin-bottom:40px}
        .btn{background:#e50914;color:#fff;padding:15px 40px;border:none;border-radius:5px;font-size:20px;cursor:pointer}
        .btn:hover{background:#f40612}
        .row{margin:60px 0}
        .row h2{margin-bottom:20px;font-size:32px}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:20px}
        .card{position:relative;overflow:hidden;border-radius:10px;cursor:pointer;transition:0.3s}
        .card:hover{transform:scale(1.05);z-index:10}
        .card img{width:100%;height:350px;object-fit:cover}
        .card-title{position:absolute;bottom:0;left:0;right:0;background:rgba(0,0,0,0.8);padding:15px;color:#fff}
        footer{background:#000;text-align:center;padding:30px;color:#777;margin-top:100px}
        @media(max-width:768px){.hero h1{font-size:40px}.grid{grid-template-columns:repeat(auto-fill,minmax(150px,1fr))}}
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
        <div class="hero">
            <div>
                <h1><?= $featured[0]['title'] ?></h1>
                <p>Watch the latest season now!</p>
                <a href="watch.php?video=<?= urlencode($featured[0]['video']) ?>" class="btn">Play Now</a>
            </div>
        </div>
 
        <div class="row">
            <h2>Trending Now</h2>
            <div class="grid">
                <?php foreach ($trending as $item): ?>
                    <div class="card" onclick="location.href='watch.php?video=<?= urlencode($item['video']) ?>'">
                        <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
                        <div class="card-title"><?= $item['title'] ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2026 StreamHub Clone. All rights reserved.</p>
    </footer>
</body>
</html>
