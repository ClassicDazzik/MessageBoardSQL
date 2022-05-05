<?php 
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
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
    <!--div class="sender">
        <p>Sent by <b>Masa</b> at <b>2022-5-4</b></p>
        <div class="message">Juu moi tää on testiviesti jutska</div>
    </div>
    <div class="sender">
        <p></p>
        <div class="message"></div-->
    </div>
    <script src="main.js"></script>
</body>
</html>