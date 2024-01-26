<?php
session_start();

// Connecting this page with the database page
include("./include/connect_DB.php");

if (isset($_POST["register_btn"]))
{

    // Getting the user's input
    $customer_name = $_POST["customer_name"];
    $customer_phone_no = $_POST["customer_phone_no"];
    $customer_email = $_POST["customer_email"];
    $password = $_POST["password"];
    $customer_address = $_POST["customer_address"];
    $customer_city = $_POST["customer_city"];
    $customer_country = $_POST["customer_country"];


    if (empty($customer_name) || empty($customer_phone_no) || empty($customer_email) || empty($password) || empty($customer_address) || empty($customer_city) || empty($customer_country)) 
    {
        // Sending the user back to the register page if empty. 
        header("Location: register.php");
        exit();
    } 
    else 
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Authentication to check if the email or phone number already exists
        $query = "SELECT * FROM customers WHERE customer_phone_no = '$customer_phone_no' OR customer_email = '$customer_email' ";
        $query_result = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_result) > 0) 
        {
            echo "<script> alert('EMAIL or PHONE NUMBER already exists. Please choose another. !'); window.location='register.php'</script>";
        } 
        else 
        {
            // Send/Insert the user input to the database
            $insert_query = "INSERT INTO customers (customer_name, customer_phone_no, customer_email, password, customer_address, customer_city, customer_country)
                VALUES ('$customer_name', '$customer_phone_no', '$customer_email', '$hashed_password', '$customer_address', '$customer_city', '$customer_country')";

            // Query the insertion to send the information to the database
            if (mysqli_query($conn, $insert_query)) 
            {
                // send_email_verify("$lastName", "$firstName", "$email", "$verify_token");
                echo "<script> alert('CUSTOMER REGISTRATION SUCCESSFUL! '); window.location='login.php'</script>";
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