<?php
session_start();
include("./admin/config/connect.php");

if (isset($_POST['register-btn'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {

        $email = mysqli_real_escape_string($con, $email);
        $fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);

        $checkemail = "SELECT * FROM users WHERE email = '$email'";
        $checkemail_run = mysqli_query($con, $checkemail);

        if ($checkemail_run) { 

            if (mysqli_num_rows($checkemail_run) > 0) {
                $_SESSION['message'] = "Email already exists.";
                header("location: register.php");
                exit(0);
            } else {

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                $user_query = "INSERT INTO users (fname, lname, email, password) 
                               VALUES ('$fname', '$lname', '$email', '$hashed_password')";
                $user_query_run = mysqli_query($con, $user_query);

                if ($user_query_run) {
                    $_SESSION['message'] = "Registration successful.";
                    header("location: login.php");
                    exit(0);
                } else {
                    $_SESSION['message'] = "Something went wrong: " . mysqli_error($con);
                    header("location: register.php");
                    exit(0);
                }
            }

        } else {
            $_SESSION['message'] = "Query failed: " . mysqli_error($con);
            header("location: register.php");
            exit(0);
        }

    } else {
        $_SESSION['message'] = "Password and Confirm Password do not match.";
        header("location: register.php");
        exit(0);
    }
} else {
    header("location: register.php");
    exit(0);
}
?>
