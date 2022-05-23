<?php
include 'connect.php';

try {
    $sql = "SELECT id, sender, messag, thedate FROM msg;";

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