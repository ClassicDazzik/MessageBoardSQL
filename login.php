<?php
session_start();
include 'connect.php';

// Check if fields are empty and make an error message
if(isset($_POST) & !empty($_POST)){
    if(empty($_POST['user'])){$errors[]="Username is empty"; }
    if(empty($_POST['passwd'])){$errors[]="Password is empty";}


// Check if Username exists in database
if(empty($errors)){
    $sql = ("SELECT * FROM accounts WHERE accname=?");
    $result = $conn->prepare($sql);
    $result->execute(array($_POST['user']));
    $count = $result->rowCount();
    $res = $result->fetch(PDO::FETCH_ASSOC);
    if($count == 1){
        }else{
            $errors[] = "That username does not exist";
        }
    }
// Verify the password
    if($count == 1){
        if(password_verify($_POST['passwd'], $res['pwd'])){
        }else{
            $errors[] = "Username and Password don't match";
        }
    }
    if(password_verify($_POST['passwd'], $res['pwd'])){
        session_regenerate_id();
        $_SESSION['login'] = true;
        $_SESSION['id'] = $res['id'];
        $_SESSION['last_login'] = time();
        header('Location: indexadmin.php');
    }
}
?>

<form role="form" method="post">
    <label for="user">Username</label><br>
    <input type="text" id="user" name="user"><br>
    <label for="passwd">Password</label><br>
    <input type="password" id="passwd" name="passwd"><br>
    <br><input type="submit" value="Login" name="login">
</form>
<?php
    // If there is an error,  print it.
    if(!empty($errors)){
        foreach ($errors as $error) {
            echo "<p>" . $error . "</p>";
    }
}
?>

