<?php
session_start();
include"db_connection.php";


if(isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] === true){
    header("Location: ownerdashboard.php");
    exit();
}

$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if($username === "admin" && $password === "1234"){
        $_SESSION['owner_logged_in'] = true;
        header("Location: ownerdashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Owner Login</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <h2>Administrator LogIn</h2>
</header>

<div class="container">

    <?php if($error != ""): ?>
        <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

</div>

</body>
</html>