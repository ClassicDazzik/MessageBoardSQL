<?php
session_start();
include './../conn/connect.php';
if(!isset($_SESSION['login'])) {
    header('Location: ./../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<a role=button href='../index.php'>Index</a>
<a role=button href='../add.html'>Add Message</a>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Message Manage</title>
</head>
<body>
    <h1>MessageBoard Admin</h1>
    <button id="namesBtn">Show Names</button>
    <button id="messagesBtn">Show Messages</button>
        <div id="messageDiv"></div>
    <script src="./main.js"></script>
</body>
</html>