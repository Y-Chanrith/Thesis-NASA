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
                    <div class="form-group col-md-8 mt-3">
                            <span>
                                Please click the button to Backup data: 
                            </span>
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <span>
                                <button class="btn btn-primary btn-sm p-2" onclick="alert('Your Database backuped!')" >
                                    <a href="backup.php" style="color: #F8F8F6;"><i class="fas fa-download"></i> BACKUP DATA</a>
                                </button>
                            </span>
                        </div>
                        <div class="form-group col-md-8 mt-3">
                            <span>
                                Please click the button to Restore data: 
                            </span>
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <button class="btn btn-info btn-sm p-2" >
                                <a href="restore_database.php" style="color: #F8F8F6;"><i class="fas fa-upload"></i> RESTORE DATA</a>
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