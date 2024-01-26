<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" /> -->

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/showroom.css">

    <!-- Brand Icon -->
    <link rel="shortcut icon" href="./image/wms_logo.jpeg" type="image/x-icon" />


    <title>SHOWROOM PRODUCTS</title>
</head>

<body>

    <?php
        include_once("./header.php");
    ?>

    <!-- Register Form starts here. -->
    <div class="container">
        <div class="signup">
            <h1>SHOWROOM PRODUCT</h1>
            <form action="./showroom_connect.php" method="post">
                <input type="text" placeholder="PRODUCT NAME" class="form-control" id="showroom_product_name" name="showroom_product_name" required />
                <textarea placeholder="PRODUCT DESCRIPTION" name="showroom_product_description" cols="30" rows="3"></textarea>
                <input type="number" placeholder="PRODUCT UNIT" class="form-control" id="showroom_product_unit" name="showroom_product_unit" required />
                <input type="number" placeholder="PRODUCT PRICE" class="form-control" id="showroom_product_price" name="showroom_product_price" required />
                <input type="number" placeholder="REORDER LEVEL" class="form-control" id="showroom_product_reorder_level" name="showroom_product_reorder_level" required />
                <label for="exp_date">EXPIRY DATE</label>
                <input type="date" class="form-control" id="showroom_product_exp_date" name="showroom_product_exp_date" required />
                <input type="submit" value="SUBMIT" name="register_btn" />
            </form>
        </div>
    </div>
    <!-- Register Form ends here. -->

</body>

</html>