<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/warehouse.css">

    <!-- Brand Icon -->
    <link rel="shortcut icon" href="./image/wms_logo.jpeg" type="image/x-icon" />


    <title>WAREHOUSE PRODUCTS</title>
</head>

<body>

    <?php
        include_once("./header.php");
    ?>

    <!-- Register Form starts here. -->
    <div class="container">
        <div class="signup">
            <h1>WAREHOUSE PRODUCT</h1>
            <form action="./warehouse_connect.php" method="post">
                <input type="text" placeholder="PRODUCT NAME" class="form-control" id="p_name" name="p_name" required />
                <textarea placeholder="PRODUCT DESCRIPTION" name="p_desc" cols="30" rows="3"></textarea>
                <br>
                <label for="date_arrived">DATE ARRIVED</label>
                <input type="date" class="form-control" id="date_arrived" name="date_arrived" required />
                <br>
                <label for="exp_date">EXPIRY DATE</label>
                <input type="date" class="form-control" id="exp_date" name="exp_date" required />
                <input type="number" placeholder="SUPPLIER ID" class="form-control" id="supplier_id" name="supplier_id" required />
                <input type="number" placeholder="MINIMUM STOCK" class="form-control" id="min_stock" name="min_stock" required />
                <input type="number" placeholder="QUANTITY IN STOCK" class="form-control" id="qty_in_stk" name="qty_in_stk" required />
                <input type="number" placeholder="REORDER LEVEL" class="form-control" id="reorder" name="reorder" required />               
                <input type="submit" value="SUBMIT" name="register_btn" />
            </form>
        </div>
    </div>
    <!-- Register Form ends here. -->

</body>

</html>