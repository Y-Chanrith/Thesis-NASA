<?php
session_start();
include("../check-login.php");
include("../connection.php");
?>

<?php
include '../include/navigation.php';
include '../include/header.php';
?>


<!------main-content-start----------->

<div class="container mt-3">
        <form method="post" action="" class="myform" class="form-group">
            <div class="jumbotron bg bg-white">
                <div class="form-row">
                    <div class="form-row">
                        <div class="form-group col-md-6 text-right mt-3">
                            <!-- <h3>Click button below to backup your database</h3> -->
                            <span><button class="btn btn-primary btn-md p-5" >
                                <a href="stock_report.php" style="color: #F8F8F6;">Stock Report</a>
                            </button></span>
                        </div>
                        <div class="form-group col-md-6 text-right mt-3">
                            <button class="btn btn-info btn-md p-5" >
                                <a href="sale_report.php" style="color: #F8F8F6;">Sale Report</a>
                            </button>
                        </div>
                    </div>
        </form>
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