<?php require 'config.php';
if (!isset($_SESSION['user_id'])) { echo "<script>window.location='login.php';</script>"; }
 
$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
 
// Dummy content
$all_content = [
    ['title' => 'Breaking Bad', 'image' => 'https://via.placeholder.com/400x600?text=Breaking+Bad', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4', 'category' => 'Drama'],
    ['title' => 'Inception', 'image' => 'https://via.placeholder.com/400x600?text=Inception', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4', 'category' => 'Sci-Fi'],
    ['title' => 'The Office', 'image' => 'https://via.placeholder.com/400x600?text=The+Office', 'video' => 'https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerBlazes.mp4', 'category' => 'Comedy'],
    // Add more...
];
$all_content = array_merge($all_content, $all_content, $all_content); // more items
 
$filtered = $all_content;
if ($search) {
    $filtered = array_filter($filtered, fn($i) => stripos($i['title'], $search) !== false);
}
if ($category) {
    $filtered = array_filter($filtered, fn($i) => $i['category'] === $category);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse - StreamHub</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:#141414;color:#fff;font-family:Arial,sans-serif}
        header{background:#000;padding:20px;position:fixed;width:100%;top:0;z-index:1000;display:flex;justify-content:space-between;align-items:center}
        header h1{color:#e50914;font-size:28px}
        nav a{color:#fff;text-decoration:none;margin:0 20px;font-weight:bold}
        main{margin-top:80px;padding:40px 20px}
        .search{max-width:600px;margin:0 auto 40px;display:flex}
        .search input{flex:1;padding:15px;background:#333;border:none;border-radius:5px 0 0 5px;color:#fff}
        .search button{background:#e50914;padding:15px 30px;border:none;color:#fff;cursor:pointer;border-radius:0 5px 5px 0}
        .categories{display:flex;justify-content:center;gap:15px;margin-bottom:40px;flex-wrap:wrap}
        .cat-btn{background:#333;color:#fff;padding:10px 20px;border-radius:30px;text-decoration:none}
        .cat-btn:hover{background:#e50914}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:20px}
        .card{background:#222;border-radius:10px;overflow:hidden;cursor:pointer}
        .card img{width:100%;height:300px;object-fit:cover}
        .card h3{padding:15px;text-align:center}
        footer{background:#000;text-align:center;padding:30px;color:#777;margin-top:80px}
    </style>
</head>
<body>
    <header>
        <h1>StreamHub</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="watchlist.php">My List</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
 
    <main>
        <div class="search">
            <form style="width:100%">
                <input type="text" name="search" placeholder="Search movies & shows..." value="<?= htmlspecialchars($search) ?>">
                <button type="submit">Search</button>
            </form>
        </div>
 
        <div class="categories">
            <a href="browse.php" class="cat-btn">All</a>
            <a href="browse.php?category=Drama" class="cat-btn">Drama</a>
            <a href="browse.php?category=Comedy" class="cat-btn">Comedy</a>
            <a href="browse.php?category=Sci-Fi" class="cat-btn">Sci-Fi</a>
            <a href="browse.php?category=Action" class="cat-btn">Action</a>
        </div>
 
        <div class="grid">
            <?php foreach ($filtered as $item): ?>
                <div class="card" onclick="location.href='watch.php?video=<?= urlencode($item['video']) ?>'">
                    <img src="<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
                    <h3><?= $item['title'] ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
 
    <footer>
        <p>&copy; 2026 StreamHub Clone</p>
    </footer>
</body>
</html>
