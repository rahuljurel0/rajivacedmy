<?php
session_start();
include("./admin/config/connect.php");

if (isset($_POST['user-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $login_run = mysqli_query($con, $login_sql);


    if ($login_run && mysqli_num_rows($login_run) > 0) {
        $user = mysqli_fetch_assoc($login_run);

        if (password_verify($password, $user['password'])) {
            if ($user['status'] == '1') {
                $_SESSION['message'] = 'Your account is blocked.';
                header("Location: login.php");
                exit();
            }

            $_SESSION['auth'] = true;
            $_SESSION['auth_role'] = $user['role_as']; // 0 = user, 1 = admin
            $_SESSION['auth_user'] = [
                'user_id' => $user['id'],
                'user_name' => $user['fname'] . ' ' . $user['lname'],
                'user_email' => $user['email'],
            ];

            if ($user['role_as'] == '1') { 
                $_SESSION['message'] = 'Welcome to the dashboard';
                header("Location: admin/index.php");
                exit();
            } elseif ($user['role_as'] == '0') { 
                $_SESSION['message'] = 'You are logged in';
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['message'] = "Invalid role.";
                header("Location: login.php");
                exit();
            }

        } else {
            $_SESSION['message'] = "Incorrect password.";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['message'] = "Email not found.";
        header("Location: login.php");
        exit();
    }

} else {
    $_SESSION['message'] = "Something went wrong!";
    header("Location: login.php");
    exit();
}
?>
