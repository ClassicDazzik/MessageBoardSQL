<?php
$password = "Koira";
$hashedpass = password_hash($password, PASSWORD_BCRYPT);
var_dump($hashedpass);?>