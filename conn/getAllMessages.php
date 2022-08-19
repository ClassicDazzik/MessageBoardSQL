<?php
session_start();
include 'connect.php';

try {
    if(isset($_SESSION['login'])) {
        $sql = "SELECT id, sender, messag, thedate, `hidden` FROM msg;";
    } else {
        $sql = "SELECT id, sender, messag, thedate, `hidden` FROM msg WHERE `hidden` = '0';";
    }
    $stmt = $conn->prepare($sql);

    if ($stmt->execute() == false) {
        $result = array(
            "error" => "Error!"
        );
    } else {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    $result = array(
        "error" => "Something happened!"
    );
}

header("Content-type: application/json;charset=utf-8");
echo json_encode($result);