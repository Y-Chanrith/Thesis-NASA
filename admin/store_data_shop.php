<?php
session_start();
include("../check-login.php");
include '../connection.php';

include '../include/navigation.php';
include '../include/header.php';
?>


<!------main-content-start----------->

<div class="main-content" style="background-color: #F8F8F6 ;">
	<!-- Employee ROW -->
	<div class="form-row">
		<!-- Center Body -->
        <?php 
            $sql = 'SELECT * FROM tbl_store';
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) : 
        ?>
		<!-- Recent Students -->
		<div class="container-fluid pt-4 px-4 pb-4">
			<div class="bg-white text-center rounded p-4 shadow">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h4 class="mb-0">Shop Information</h4>
					<a href="update_store.php?id=<?php echo $row['id'];?>" class="btn btn-outline-primary">Update Info</a>
				</div>
				<div class="center">
                    <img src="../image/NASA-Computer.png" alt="nasa computer" style="width: 170px;" >
				</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6>Khmer Name</h6>
                        <h4 name="khmerName"><?=$row['kh_name'] ?></h4>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>English Name</h6>
                        <h5 name="EnglishName"><?=$row['en_name'] ?></h5>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <h6>Email</h6>
                        <h5 name="email"><?=$row['email'] ?></h5>
                    </div>
                    <div class="form-group col-md-6">
                        <h6>Contact Number</h6>
                        <h5 name="contact"><?=$row['phone'] ?></h5>
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-6">
                    <h6>Address</h6>
                    <h5 name="address"><?=$row['address'] ?></h5>
                </div>
                    <div class="form-group col-md-6">
                        <h6>Description</h6>
                        <p><?=$row['description'] ?></p>
                    </div>
                </div>
			</div>
		</div>

        <?php endwhile; ?>
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