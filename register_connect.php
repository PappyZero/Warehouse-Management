<?php
session_start();

// Connecting this page with the database page
include("./include/connect_DB.php");

if (isset($_POST["register_btn"]))
{

    // Getting the user's input
    $name = $_POST["name"];
    $num = $_POST["num"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $country = $_POST["country"];


    if (empty($name) || empty($num) || empty($email) || empty($password) || empty($address) || empty($city) || empty($country)) 
    {
        // Sending the user back to the register page if empty. 
        header("Location: register.php");
        exit();
    } 
    else 
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Authentication to check if the email or phone number already exists
        $query = "SELECT * FROM users WHERE phone_no = '$num' OR email = '$email' ";
        $query_result = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_result) > 0) 
        {
            echo "<script> alert('EMAIL or PHONE NUMBER already exists. Please choose another. !'); window.location='register.php'</script>";
        } 
        else 
        {
            // Send/Insert the user input to the database
            $insert_query = "INSERT INTO users (name, phone_no, email, password, address, city, country)
                VALUES ('$name', '$num', '$email', '$hashed_password', '$address', '$city', '$country')";

            // Query the insertion to send the information to the database
            if (mysqli_query($conn, $insert_query)) 
            {
                // send_email_verify("$lastName", "$firstName", "$email", "$verify_token");
                echo "<script> alert('USER REGISTRATION SUCCESSFUL! '); window.location='login.php'</script>";
                // Redirect to the login page after sign-up is confirmed
                // header("location: login.php");
            } 
            else 
            {
                echo "Error: " . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    } 

    }
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