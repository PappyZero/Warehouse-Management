<?php
session_start();

// Initialize variables for error and success messages
$error_message_1 = "";
$error_message_2 = "";
$success_message = "";

// Check if the form is submitted
if (isset($_POST["login"])) {
    // Get user input
    $login_email = $_POST["login_email"];
    $login_password = $_POST["login_password"];

    // Include the database connection
    include("./include/connect_DB.php");

    // Prepare and execute the database query
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $login_email);
        mysqli_stmt_execute($stmt);
    
        $result = mysqli_stmt_get_result($stmt);
    
        if (!$result) {
            $error_message_1 = "Database error: " . mysqli_error($conn);
        } else {
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($login_password, $row["password"])) {
                    // Start a session
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $success_message = "LOGIN SUCCESSFUL! Redirecting...";
                    header("refresh:2;url=index.php"); // Redirect to the home page
                } else {
                    $error_message_1 = "Incorrect Password";
                }
            } else {
                $error_message_2 = "User not found";
            }
        }
        mysqli_stmt_close($stmt);
    }
    

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/login.css">

    <!-- Brand Icon -->
    <link rel="shortcut icon" href="./image/wms_logo.jpeg" type="image/x-icon" />

    <title>LOGIN</title>

    <style>
        .error-message {
            text-align: center;
            margin-top: 20px;
        }

        .alert-danger {
            background-color: #ffcccb;
            color: #ff0000;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #caffbf;
            color: #000;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
        include_once("./header.php");
    ?>


    <div class="container">
        <div class="signin">
            <h1>USER LOGIN</h1>
            <div class="error-message">
                <?php
                    if (!empty($error_message_1)) {
                        echo "<div class='alert alert-danger'>$error_message_1</div>";
                    }
                    if (!empty($error_message_2)) {
                        echo "<div class='alert alert-danger'>$error_message_2</div>";
                    }
                    if (!empty($success_message)) {
                        echo "<div class='alert alert-success'>$success_message</div>";
                    }
                ?>
            </div>

            <!-- <?php 
                // if(isset($_SESSION['status']))
                // {
                //     ?>
                //     <div class="alert alert-success">
                //         <h5><?= $_SESSION['status']; ?></h5>
                //     </div>
                //     <?php
                //     unset($_SESSION['status']);
                // }
            ?> -->

            <form action="./login.php" method="post">
                <input type="email" placeholder="EMAIL" class="form-control" id="login_email" name="login_email" required />
                <input type="password" placeholder="PASSWORD" class="form-control" id="login_password" name="login_password" required />
                <br>
                <a href="#">Forgot password? </a>
                <input type="submit" value="LOGIN" name="login" />
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                <small>Don't have an account? <a href="./register.php">Register</a></small>
            </form>
        </div>
    </div>
</body>
</html>
