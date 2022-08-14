<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $userName = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];


    if (empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../signup.php?error=emptyfileds&uid=".$userName."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
        header("Location: ../signup.php?error=invalidmail&uid");
        exit();
    }

    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail&uid=".$userName);
            exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/",$userName)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }

    elseif ($password != $passwordRepeat) {
        header("Location: ../signup.php?error=passwordchek&mail=".$email ."uid=".$userName);
        exit();
    }

    else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usernametaken&mail=".$email);
                exit();
            }
            else {
                $sql = "INSERT INTO users(uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
            }
            else {
                $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $password);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                    exit();

            }

        }
    }

}
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else {
    header("Location: ../signup.php");
    exit();
}