<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM product inner join category on product.category_id=category.category_id  order by product.pro_name asc';
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
                            <h2 class="ml-lg-2">Manage Products</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a class="btn btn-success" href="insert_pro.php" >
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                </div>
                <table class="table table-striped table-hover mt-2 ">
                <div class="col-md-5 col-lg-3 order-3 order-md-2 mt-2">
                        <div class="xp-searchbar">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group" style="left: 331%;">
                                    <input type="search" class="form-control" name="search" placeholder="Search">
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
                            <th width="10%">Image</th>
                            <th width="25%">Product Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
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
                                <td><img src="../image/<?php echo $row['image']; ?>" alt="" height="30px" width="40px"></td>
                                <td><?php echo $row['pro_name']; ?></td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['c_name']; ?></td>
                                <td><?php echo $row['stock']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['date_in_stock']; ?></td>
                                <th>
                                    <a href="update_pro.php?id=<?php echo $row['id']; ?>" class="edit">
                                    <i class="fas fa-edit" style="color: #0049c7;"></i>
                                    </a>
                                    <a href="delete_pro.php?id=<?php echo $row['id'];?>" class="delete">
                                    <i class="fas fa-trash" style="color: #d10000;" onclick="return confirm('Are you sure want to delete this item?');"></i>
                                        <!-- <i class="material-icons" onclick="return confirm('Are you sure want to delete this item?');">&#xE872;</i> -->
                                        <script>
                                    </script>
                                    </a>
                                </th>
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

