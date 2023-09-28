<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT s.*, l.province FROM supplier s join location l on s.location_id=l.location_id';
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
                            <h2 class="ml-lg-2">Manage Supplier</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a class="btn btn-primary" href="insert_sup.php" >
                                <i class="material-icons">&#xE147;</i>
                                <span>Add Supplier</span>
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
                            <th>ID</th>
                            <th>Supplier Name</th>
                            <th>province</th>
                            <th>Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        if(isset($_POST['search'])){
                            $searchkey = $_POST['search'];
                            $sql = "SELECT * FROM supplier join location on supplier.location_id=location.location_id WHERE company_name LIKE '%$searchkey%'";
                        }else{
                            $sql = "SELECT * FROM supplier join location on supplier.location_id=location.location_id ";
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
                                <td><?php echo $row['company_name']; ?></td>
                                <td><?php echo $row['province']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <th>
                                    <a href="update_sup.php?supplier_id=<?php echo $row['supplier_id']; ?>" class="edit">
                                    <i class="fas fa-edit" style="color: #0049c7;"></i>
                                    </a>
                                    <a href="delete_sup.php?supplier_id=<?php echo $row['supplier_id']; ?>" class="delete">
                                    <i class="fas fa-trash" style="color: #d10000;" onclick="return confirm('Are you sure want to delete this supplier?');"></i>
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