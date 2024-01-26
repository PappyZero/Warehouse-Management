<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    <!-- CSS File -->
    <link rel="stylesheet" href="./css/register.css">

    <!-- Brand Icon -->
    <link rel="shortcut icon" href="./image/wms_logo.jpeg" type="image/x-icon" />


    <title>REGISTER</title>
</head>

<body>

    <?php
        include_once("./header.php");
    ?>


    <!-- Register Form starts here. -->
    <div class="container">
        <div class="signup">
            <h1>USER REGISTRATION</h1>
            <form action="./register_connect.php" method="post">
                <input type="text" placeholder="NAME" class="form-control" id="name" name="name" required />
                <input type="number" placeholder="PHONE NUMBER" class="form-control" id="num" name="num" required />
                <input type="email" placeholder="EMAIL" class="form-control" id="email" name="email" required />
                <input type="password" placeholder="PASSWORD" class="form-control" id="password" name="password" required />
                <input type="text" placeholder="ADDRESS" class="form-control" id="address" name="address" required />
                <input type="text" placeholder="CITY" class="form-control" id="city" name="city" required />
                <input type="text" placeholder="COUNTRY" class="form-control" id="country" name="country" required />
                <br>
                <br>
                <small>By Clicking "SUBMIT", You agree to our <br>
                    <a class="text-deco text-pink" href="#">Terms and Conditions</a> and <a class="text-deco text-blue" href="#">Privacy Policy</a>
                </small>
                <input type="submit" value="SUBMIT" name="register_btn" />
                <small>ALREADY HAVE AN ACCOUNT ?
                    <a href="./login.php">LOGIN</a>
                </small>
            </form>
        </div>
    </div>
    <!-- Register Form ends here. -->

</body>

</html>