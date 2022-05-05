<?php
include 'connect.php';
$id = 0;

try {
    // sql to delete a record
    $sql = "DELETE FROM accounts WHERE id=$id";
  
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
?>