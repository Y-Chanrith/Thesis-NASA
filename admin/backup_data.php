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
    <center>
        <form method="post" action="" class="myform" class="form-group">
            <div class="jumbotron" style="background-color: #F8F8F6 ;">
                <div class="form-row">
                    <div class="form-row">
                        <div class="form-group col-md-12 text-right mt-3">
                            <button class="btn btn-primary btn-md p-5" >
                                <a href="backup.php" style="color: #F8F8F6;">Backup Data</a>
                            </button>
                        </div>
                    </div>
        </form>
    </center>
</div>

</div>
</div>

<!------main-content-end----------->
<?php
// include '../include/footer.php';
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