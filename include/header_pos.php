<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./fontawesome/css/fontawesome.min.css">
    <script src="sweetalert-2.1.2/package/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Point of Sales</title>
</head>

<body>

    <!------main-content-start----------->

    <div id="content">
        <div class="container-fluid" style="background-color: aliceblue; box-shadow: 1px 1px 10px;">
            <div class="row">
                <div class="p-3">
                    <a href="dashboard.php" class="p-3" style="text-decoration: none; font-family: Arial Black;">
                        <img src="../image/Nsc.jpg" style="width:40px; border-radius:50%; border: 1px solid #BABABA ;" />
                        <span class="p-3"><span class="text text-danger">NASA</span> COMPUTER</span>
                    </a>
                    <a href="sale.php" class="btn btn-md btn-outline-primary" >BACK SALE</a>

                    <a class="nav-link" href="#" data-toggle="dropdown" style="float: right;">
                        <span class="pr-2 text text-secondary"><?php echo $_SESSION['username']; ?> | </span>
                        <img src="../image/Nsc.jpg" style="width:40px; border-radius:50%; border: 1px solid #BABABA ;" />
                        <span class="xp-user-live"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>