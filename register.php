<?php
session_start();
include 'connect.php';
include 'sessions.php';

if(isset($_POST['Register'])) {
    $usernm = $_POST("usernam");
    $pass = $_POST("pwd2");
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO accounts (accname, pwd)
    VALUES (:accname, :pwd)");
        $stmt->bindParam(':accname', $usernm);
        $stmt->bindParam(':pwd', $passwordHash);
    $stmt->execute();
}
// if(isset($_POST['Register'])){
//     $usernam = !empty($_POST['usernam']) ? trim($_POST['usernam']) : null;
//     $pass = !empty($_POST['pwd']) ? trim($_POST['pwd']) : null;

//     $sql = "SELECT COUNT(accname) AS num FROM accounts WHERE accname = :accname";
//     $stmt = $pdo->prepare($sql);

//     $stmt->bindValue(':accname', $usernam);
//     $stmt->execute();

//     $row = $stmt->fetch(PDO::FETCH_ASSOC);
//     if($row['num'] > 0){
//         die('Username already exists.');
//     }

//     $passwordHash = password_hash($pass, PASSWORD_BCRYPT);

//     $sql = "INSERT INTO accounts (accname, pwd) VALUES (:accname, :pwd)";
//     $stmt = $pdo->prepare($sql);

//     $stmt->bindValue(':accname', $usernam);
//     $stmt->bindValue(':pwd', $passwordHash);

//     $result = $stmt->execute();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<h1>Create an Admin account</h1>
<body>
    <form action="register.php" method="post">
        <label for="usernam">Username</label>
        <input type="text" name="usernam" id="usernam" required>
        <label for="pwd">Password</label>
        <input type="password" name="pwd" id="pwd">
        <label for="pwd2">Repeat Password</label>
        <input type="password" name="pwd2" id="pwd2">
        <input type="submit" value="Register" name="submit">
    </form>
</body>
<!-- script language="javascript" type="text/javascript">
    function check(input) {
        if (document.getElementById('pwd2').value != document.getElementById('pwd').value){
            input.setCustomValidity('Passwords dont match!');
        } else {
            input.setCustomValidity();
        }
    }
</script--> 
</html>