<?php
session_start();

// Connecting this page with the database page
include("./include/connect_DB.php");

if (isset($_POST["register_btn"]))
{

    // Getting the user's input
    $p_name = $_POST["p_name"];
    $p_desc = $_POST["p_desc"];
    $date_arrived = $_POST["date_arrived"];
    $exp_date = $_POST["exp_date"];
    $supplier_id = $_POST["supplier_id"];
    $min_stock = $_POST["min_stock"];
    $qty_in_stk = $_POST["qty_in_stk"];
    $reorder = $_POST["reorder"];


    if (empty($p_name) || empty($p_desc) || empty($date_arrived) || empty($exp_date) || empty($supplier_id) || empty($min_stock) || empty($qty_in_stk) || empty($reorder)) 
    {
        // Sending the user back to the register page if empty. 
        header("Location: warehouse.php");
        exit();
    } 
    else 
    {
            // Authentication to check if the email or phone number already exists
            $query = "SELECT * FROM warehouse_products WHERE warehouse_product_name = '$p_name' ";
            $query_result = mysqli_query($conn, $query);
        
            if (mysqli_num_rows($query_result) > 0) 
            {
                echo "<script> alert('PRODUCT NAME! already exists. Please choose another. !'); window.location='warehouse.php'</script>";
            }
            else
            {
                // Send/Insert the user input to the database.
                $insert_query = "INSERT INTO warehouse_products (warehouse_product_name, warehouse_product_description, warehouse_product_date_arrived, warehouse_product_exp_date, supplier_id, minimum_stock, quantity_in_stock, reorder_level)
                VALUES ('$p_name', '$p_desc', '$date_arrived', '$exp_date', '$supplier_id', '$min_stock', '$qty_in_stk', '$reorder')";

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