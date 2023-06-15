<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM tbl_products';
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
                            <a class="btn btn-success" data-toggle="modal" href="insert_pro.php" >
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Products</span>
                            </a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Pro ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Costs</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Unit</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <th><?php echo $count; ?></th>
                                <th><?php echo $row['pro_name']; ?></th>
                                <th><?php echo $row['category']; ?></th>
                                <th><?php echo $row['brand']; ?></th>
                                <th><?php echo $row['cost']; ?></th>
                                <th><?php echo $row['price']; ?></th>
                                <th><?php echo $row['stock']; ?></th>
                                <th><?php echo $row['unit']; ?></th>
                                <th>
                                    <a href="#edit" class="edit" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                                    </a>
                                    <a href="delete-pro.php" class="delete" data-toggle="modal">
                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
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

        <!----edit-modal end--------->

        <!----edit-modal start--------->
        <div class="modal fade" tabindex="-1" id="editEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="emil" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!----edit-modal end--------->

        <!----delete-modal start--------->
        <div class="modal fade" tabindex="-1" id="deleteEmployeeModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Records</p>
                        <p class="text-warning"><small>this action Cannot be Undone,</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!----edit-modal end--------->

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

<?php
include '../connection.php';
?>