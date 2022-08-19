<?php
include 'connect.php';

$id = $_REQUEST["id"];
$action = $_REQUEST["action"];

switch ($action) {
    case "hide":
        try {
            // SQL to toggle 'hidden' field on a record by using NOT keyword
            // NOTE! does not use a prepared statement, vulnerable to SQL injection
            $statement = "UPDATE msg SET hidden = NOT hidden WHERE id = $id";
            // use exec() because no results are returned
            $conn->exec($statement);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        break;
    case "delete":
        try {
            // SQL to delete a record
            // NOTE! does not use a prepared statement, vulnerable to SQL injection
            $statement = "DELETE FROM msg WHERE id = $id";
            // use exec() because no results are returned
            $conn->exec($statement);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        break;
    default:
}