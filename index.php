<?php
session_start();
include 'conn/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Messages</title>
    <?php
    if (!isset($_SESSION['login'])) {
        echo "<a role=button href='login.php'>Login</a>";
    } else {
        echo "<a role=button href='logout.php'>Logout</a>";
        echo "<a role=button href='admin/index.php'>Admin</a>";
    }
    ?>
    <a role=button href='register.php'>Register</a>
</head>
<body>
    <h1>MessageBoard</h1>
    <button id="namesBtn">Show Names</button>
    <button id="messagesBtn">Show Messages</button>
        <div id="messageDiv"></div>
    <script src="main.js"></script>
</body>
</html>