<?php require 'config.php'; $msg = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        echo "<script>window.location='index.php';</script>";
    } else { $msg = "Wrong email or password!"; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StreamHub</title>
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{background:#141414;color:#fff;display:flex;justify-content:center;align-items:center;min-height:100vh;font-family:Arial,sans-serif}
        .box{background:#000;padding:40px;border-radius:10px;width:400px;text-align:center}
        h2{color:#e50914;margin-bottom:30px;font-size:28px}
        input{width:100%;padding:15px;margin:10px 0;background:#333;border:none;border-radius:5px;color:#fff;font-size:16px}
        button{width:100%;background:#e50914;color:#fff;padding:15px;border:none;border-radius:5px;font-size:18px;cursor:pointer;margin-top:20px}
        button:hover{background:#f40612}
        .msg{color:#f00;margin:10px 0}
        a{color:#fff;text-decoration:none;margin-top:20px;display:block}
    </style>
</head>
<body>
    <div class="box">
        <h2>Welcome Back</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p class="msg"><?= $msg ?></p>
        <a href="register.php">No account? Sign Up</a>
    </div>
</body>
</html>
