<?php
session_start();

// Connecting this page with the database page
include("./include/connect_DB.php");

if (isset($_POST["register_btn"]))
{

    // Getting the user's input
    $showroom_product_name = $_POST["showroom_product_name"];
    $showroom_product_description = $_POST["showroom_product_description"];
    $showroom_product_unit = $_POST["showroom_product_unit"];
    $showroom_product_price = $_POST["showroom_product_price"];
    $showroom_product_reorder_level = $_POST["showroom_product_reorder_level"];
    $showroom_product_exp_date = $_POST["showroom_product_exp_date"];
    $showroom_product_stock_value = ($showroom_product_unit * $showroom_product_price);

    if (empty($showroom_product_name) || empty($showroom_product_description) || empty($showroom_product_unit) || empty($showroom_product_price) || empty($showroom_product_reorder_level) || empty($showroom_product_exp_date) || empty($showroom_product_stock_value)) 
    {
        // Sending the user back to the register page if empty. 
        header("Location: showroom.php");
        exit();
    } 
    else 
    {
            // Authentication to check if the email or phone number already exists
            $query = "SELECT * FROM showroom_product WHERE showroom_product_name = '$showroom_product_name' ";
            $query_result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($query_result) > 0) 
            {
                echo "<script> alert('PRODUCT NAME! already exists. Please choose another. !'); window.location='showroom.php'</script>";
            }
            else
            {
                // Send/Insert the user input to the database.
                $insert_query = "INSERT INTO showroom_product (showroom_product_name, showroom_product_description, showroom_product_unit, showroom_product_price, showroom_product_reorder_level, showroom_product_exp_date, showroom_product_stock_value)
                VALUES ('$showroom_product_name', '$showroom_product_description', '$showroom_product_unit', '$showroom_product_price', '$showroom_product_reorder_level', '$showroom_product_exp_date', '$showroom_product_stock_value')";

                // Query the insertion to send the information to the database.
                if (mysqli_query($conn, $insert_query)) 
                {
                    // send_email_verify("$lastName", "$firstName", "$email", "$verify_token");
                    echo "<script> alert('PRODUCT ADDED SUCCESSFULLY! '); window.location='index.php'</script>";
                } 
                else 
                {
                    echo "Error: " . mysqli_error($conn);
                }
            }

        }
        mysqli_close($conn);
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