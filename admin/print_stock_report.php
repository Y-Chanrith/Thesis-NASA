<?php
session_start();
include("../check-login.php");
include("../connection.php");
$dateFrom = $_POST['fromdate'];
$dateTo = $_POST['todate'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Stock Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <style type="text/css">
        a {
            text-decoration: none;
            color: white;
        }

        @media print {
            #print {
                display: none;
            }
            #back{
                display: none;
            }
        }
        
    </style>
</head>

<body>
    <div class="container">
        <center>
            <img src="../image/Nsc.jpg" width="120">
            <h4>NASA Computer</h4>
            <hr>
        </center>
        <div><button onclick="reprint()" id="print" class="btn btn-info" style="float: right;"><i class="fas fa-print"> Print</i></button>
        <a href="stock_report.php" id="back" class="btn btn-secondary mr-2" style="float: right; margin-left:5px;"><i class="fas fa-chevron-circle-left"> Back</i></a>
    </div>
        <h5>Prepared on: <?php echo date('l-F-Y'); ?></h5>

        <div>
            <center>Data From: <?php echo $dateFrom; ?> To: <?php echo $dateTo; ?></center>
        </div>
        <table class="table table-bordered">
            <tr style="background-color: #DAF5FF">
                <th scope="col">No</th>
                <th scope="col">Product Name</th>
                <th scope="col">In Stock</th>
                <th scope="col">Price Per Unit</th>
                <th scope="col">Total Price</th>
                <th scope="col">Date Post</th>
            </tr>

            <?php
            $no = 1;
            $sum_qty = 0;
            $sum_total_price = 0;

            $report = "SELECT * FROM product";
            $result = mysqli_query($con, $report);

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['created_at'] >= $dateFrom and $row['created_at'] <= $dateTo) {
                    $sum_qty += $row['stock'];

                    $total = $row['stock'] * $row['price'];
                    $sum_total_price += $total;
            ?>

                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['pro_name']; ?></td>
                        <td><?= $row['stock']; ?> Pcs</td>
                        <td><?= number_format($row['price'], 2); ?> ដុល្លា</td>
                        <td><?= number_format($total, 2); ?> ដុល្លា</td>
                        <td width=20% style="font-size: 15px;"><?= $row['created_at']; ?></td>
                    </tr>

            <?php
                    $no++;
                } //close filter

            } //close while loop database

            ?>
            <tr>
                <td colspan="5" align="right">Total Quantity From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
                <td style="font-size: 16px;" class="text text-info"><?php echo $sum_qty . " ទំនិញ"; ?></td>
            </tr>
            <tr>
                <td colspan="5" align="right">Total Amount From <?php echo  $dateFrom; ?> to <?php echo  $dateTo; ?></td>
                <td style="font-size: 16px;" class="text text-primary"><?php echo number_format($sum_total_price, 2) . " ដុល្លា"; ?></td>
            </tr>

            <?php
            ?>

        </table>
        <!-- <div><button onclick="reprint()" id="print" class="btn btn-outline-primary" style="float: right;">Print</button></div> -->
        <div>
            <center>Printed by: <?php echo $_SESSION['username']; ?></center>
        </div>
    </div>
    <script>
        function reprint() {
            window.print();
        }
    </script>
</body>

</html>