<?php

// Connecting this page with the database page
include("./include/connect_DB.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Getting the user's input.
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    // Authentication to check if the email exists.
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $login_email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            // Check for database query errors.
            $_SESSION['error_message'] = "Database error: " . mysqli_error($conn);
            // Redirect back to login.php
            header("Location: login.php");
            exit();
        } else {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($login_password, $row["password"])) {
                    session_start();
                    // Creating a login session.
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['success_message'] = "LOGIN SUCCESSFULL";
                    header("Location: index.php"); // Redirect to the home page
                    exit();
                } else {
                    $_SESSION['error_message_1'] = "Incorrect Password";
                    header("Location: login.php"); // Redirect back to login.php
                    exit();
                }
            } else {
                $_SESSION['error_message_2'] = "User not found";
                header("Location: login.php"); // Redirect back to login.php
                exit();
            }
        }
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection.
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Brand Icon -->
    <link rel="shortcut icon" href="./images/logo/14_Education.jpg" type="image/x-icon" />
    <title>Document</title>
</head>
<body>
    
</body>
</html>