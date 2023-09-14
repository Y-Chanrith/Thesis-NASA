<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT id, pro_name, stock, c_name, date_in_stock FROM product p
join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY id';
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
                            <h2 class="ml-lg-2">Inventory Page</h2>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <table class="table table-striped table-hover mt-2">
                    <div class="col-md-5 col-lg-3 order-3 order-md-2 mt-2">
                        <div class="xp-searchbar">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group" style="left: 333%;">
                                    <input type="search" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Go
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Date Stock In</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                         <!-- ============ search php code ============== -->
                         <?php

                            if(isset($_POST['search'])){
                                $searchkey = $_POST['search'];
                                $sql = "SELECT * FROM product join category on product.category_id=category.category_id WHERE pro_name LIKE '%$searchkey%'";
                            }else{
                                $sql = "SELECT * FROM product join category on product.category_id=category.category_id ";
                                $searchkey = "";
                            }

                            $result = mysqli_query($con, $sql);
                            if(!$result){
                            die("Error Get Data");
                            }
                            // =================== end of search code ===================

                            ?>
                        <?php
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><?php echo $row['stock']; ?></td>
                                <td><?php echo $row['c_name']; ?></td>
                                <td><?php echo $row['date_in_stock']; ?></td>
                                <th>
                                    <a href="inv_searchfrm.php?id=<?php echo $row['id']; ?>" class="edit">
                                        <!-- <i class="material-icons" data-toggle="tooltip">&#xE254;</i> -->
                                        <button class="btn btn-primary btn-sm">View</button>
                                    </a>
                                </th>
                            </tr>

                        <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>

                <div class="clearfix">
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
                </div>
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