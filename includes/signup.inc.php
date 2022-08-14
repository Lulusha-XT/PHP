<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];


    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfileds&uid=".$userName."&mail=".$email);
    }

}
