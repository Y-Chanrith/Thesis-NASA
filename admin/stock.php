<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT
product.*,
category.*,
product_stock.created_at AS stock_added_at,
product_stock.qty AS stock_amount,
product_stock.price AS stock_price
FROM
product_stock
INNER JOIN
product ON product_stock.product_id = product.id
 JOIN category ON category.category_id=product.category_id
ORDER BY
product_stock.created_at ASC;
';
$result = mysqli_query($con, $sql);



include '../include/navigation.php';

include '../include/header.php';
?>

<!------main-content-start----------->

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            <h2 class="ml-lg-2">Manage Stocks</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a class="btn btn-success" href="insert_stock.php">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add Stock</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <table class="table table-striped table-hover mt-2 " style="overflow: auto; height:300px;">
                    <!-- <div class="col-md-5 col-lg-3 order-3 order-md-2 mt-2">
                        <div class="xp-searchbar">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group" style="left: 331%;">
                                    <input type="search" class="form-control" name="search" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <thead>
                        <tr>
                            <th width="10%">Image</th>
                            <th width="25%">Product Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock Added At</th>
                            <th>Stock</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // print_r($row);
                        ?>
                            <tr>
                                <td><img src="../image/<?php echo $row['image']; ?>" alt="" height="30px" width="40px"></td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['c_name']; ?></td>
                                <td><?php echo $row['stock_price']; ?></td>
                                <td><?php echo $row['stock_added_at']; ?></td>
                                <td><?php echo $row['stock_amount']; ?> Pcs</td>

                            </tr>

                        <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>

                <!-- <div class="clearfix">
                    <div class="hint-text">showing <b>5</b> out of <b>10</b></div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item active"><a href="#" class="page-link">1</a></li>
                        <li class="page-item "><a href="#" class="page-link">2</a></li>
                        <li class="page-item "><a href="#" class="page-link">3</a></li>
                        <li class="page-item "><a href="#" class="page-link">4</a></li>
                        <li class="page-item "><a href="#" class="page-link">5</a></li>
                        <li class="page-item "><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!------main-content-end----------->
<?php
include '../include/footer.php';
?>

</div>
</div>
<!-------complete html----------->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
</script>

</body>

</html>