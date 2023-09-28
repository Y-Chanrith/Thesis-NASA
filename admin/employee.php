<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = "SELECT * FROM employee";
$result = mysqli_query($con, $sql);


include '../include/navigation.php';

include '../include/header.php';
?>

<style>
    th{
       font-weight: bold;
    }
</style>

<!------main-content-start----------->

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                            <h2 class="ml-lg-2">Manage Employee</h2>
                        </div>
                        <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                            <a class="btn btn-warning" href="insert_emp.php" >
                                <i class="material-icons">&#xE147;</i>
                                <span>Add Employee</span>
                            </a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                <div class="col-md-5 col-lg-3 order-3 order-md-2 mt-2 mb-2">
                        <div class="xp-searchbar">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group" style="left: 331%;">
                                    <input type="search" class="form-control" placeholder="Search" name="search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Go</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Employee Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    <!-- ============ search php code ============== -->
                    <?php
                        if(isset($_POST['search'])){
                            $searchkey = $_POST['search'];
                            $sql = "SELECT * FROM employee WHERE employee_name LIKE '%$searchkey%'";
                        }else{
                            $sql = "SELECT * FROM employee";
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
                                <td><?php echo $row['employee_name']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <th>
                                    <a href="update_emp.php?eid=<?php echo $row['eid'];?>" class="edit">
                                    <i class="fas fa-edit" style="color: #0049c7;"></i>
                                    </a>
                                    <a href="delete_emp.php?eid=<?php echo $row['eid'];?>" class="delete">
                                    <i class="fas fa-trash" style="color: #d10000;" onclick="return confirm('Are you sure want to delete this employee?');"></i>
                                    </a>
                                </th>
                            </tr>

                        <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>

                <!-- s -->
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