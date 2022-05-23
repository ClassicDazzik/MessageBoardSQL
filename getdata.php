<?php
include 'conn/connect.php';

$stmt = $conn->prepare("INSERT INTO msg (sender, messag, thedate)
VALUES (:sender, :messag, :thedate)");
    $stmt->bindParam(':sender', $sender);
    $stmt->bindParam(':messag', $messag);
    $stmt->bindParam(':thedate', $date);

    $sender = $_POST["sender"];
    $messag = $_POST["messag"];
    $date = date('y-n-d');
    $stmt->execute();
?>