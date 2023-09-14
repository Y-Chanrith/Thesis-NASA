<?php
session_start();
include("../check-login.php");
include '../connection.php';

$sql = 'SELECT * FROM product join category on product.category_id=category.category_id GROUP BY id';
$result = mysqli_query($con, $sql);


include '../include/navigation.php';

include '../include/header.php';
?>


<!------main-content-start----------->

<div class="main-content" style="background-color: #F8F8F6 ;">
	<!-- Employee ROW -->
	<div class="form-row">
		<!-- Center Body -->

		<!-- Recent Students -->
		<div class="container-fluid pt-4 px-4 pb-4">
			<div class="bg-white text-center rounded p-4 shadow">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h4 class="mb-0">Shop Information</h4>
					<a href="update_store.php" class="btn btn-outline-primary">Update Info</a>
				</div>
				<div class="center">
                    <img src="../image/NASA-Computer.png" alt="nasa computer" style="width: 170px;" >
				</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6>Khmer Name</h6>
                        <h4 name="khmerName">ហាង ណាស្សា កុំព្យូទ័រ</h4>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>English Name</h6>
                        <h4 name="EnglishName">NASA Computer Technology</h4>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6>Email</h6>
                        <h5 name="email">nasacomputer@gmail.com</h5>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>Contact Number</h6>
                        <h5 name="contact">(+855) 89 35 35 60</h5>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6>Khmer Name</h6>
                        <h4>ហាង ណាស្សា កុំព្យូទ័រ</h4>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>Address</h6>
                        <h4 name="address">Siem Reap, Cambodia</h4>
                    </div>
                </div>
			</div>
		</div>
		<!-- Recent Student End -->

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