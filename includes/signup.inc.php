<?php
if (isset($_POST['signup-submit'])){

    require 'connect.inc.php';

    if(isset($_POST['uid'])) {
        $username = htmlentities($_POST['uid']);
    }
    if(isset($_POST['mail'])) {
        $email = htmlentities($_POST['mail']);
    }
    if(isset($_POST['pwd'])) {
        $password = htmlentities($_POST['pwd']);
    }
    if(isset($_POST['pwd-repeat'])) {
        $password_repeat = htmlentities($_POST['pwd-repeat']);
    }


    if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("Location: ../signup.php?error=invalidemail&uid=");
        exit();
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invaliduid&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("Location: ../signup.php?error=invalidpwd&uid=".$username);
        exit();
    }
    else if ($password !== $password_repeat) {
        header("Location: ../signup.php?error=invalidpwdcheck&uid=".$username."&email=".$email);
        exit();
    } else {

        $sql = "SELECT id FROM RegisUser WHERE id=?";
        $stmt = mysqli_stmt_init($db);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0) {
                header("Location: ../signup.php?error=userTaken&email=".$email);
                exit();
            }
            else {
            $sql = "INSERT INTO RegisUser (user_name, email, password ) VALUES (?, ?, ?)";
            mysqli_stmt_execute($stmt);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else {
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($db);
    }
}
else {
    header("Location: ../signup.php");
    exit();
}