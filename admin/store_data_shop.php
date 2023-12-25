<?php
session_start();
include("../check-login.php");
include '../connection.php';
include '../include/navigation.php';
include '../include/header.php';
?>

<!------main-content-start----------->
<div class="main-content" style="background-color: #F8F8F6 ; font-family: Khmer OS Siemreap;">
	<!-- Employee ROW -->
	<div class="form-row d-flex align-items-center justify-content-center">
		<!-- Center Body -->
        <?php 
            $sql = 'SELECT * FROM tbl_store';
            $result = mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($result)) : 
        ?>
		<!-- Recent Students -->
		<div class="container-sm mt-0" >
			<div class="bg-white rounded pl-5 pr-5 pt-4 pb-4 shadow m-3">
				<div class="d-flex align-items-center justify-content-between mb-4">
					<h4 class="mb-0">Shop Information</h4>
					<a href="update_store.php?id=<?php echo $row['id'];?>" class="btn btn-outline-primary">Update Info</a>
				</div>
				<div class="text-center">
                    <img src="../image/NASA-Computer.png" alt="nasa computer" style="width: 170px;" >
				</div>
                <div class="form-row  ml-3">
                    <div class="form-group col-md-6 text-Start">
                        <h5>Khmer Name</h5>
                        <h6 name="khmerName"><?=$row['kh_name'] ?></h6>
                    </div>
                    <div class="form-group col-md-6 text-end">
                        <h5>English Name</h5>
                        <h6 name="EnglishName"><?=$row['en_name'] ?></h6>
                    </div>
                </div>

                <div class="form-row  ml-3">
                    <div class="form-group col-md-6 text-Start">
                        <h5>Email</h5>
                        <h6 name="email"><?=$row['email'] ?></h6>
                    </div>
                    <div class="form-group col-md-6 text-end">
                        <h5>Contact Number</h5>
                        <h6 name="contact"><?=$row['phone'] ?></h6>
                    </div>
                </div>
                <div class="form-row  ml-3">
                    <div class="form-group col-md-6 text-Start">
                        <h5>Address</h5>
                        <h6 name="address"><?=$row['address'] ?></h6>
                    </div>
                    <div class="form-group col-md-6 text-end">
                        <h5>Description</h5>
                        <p><?=$row['description'] ?></p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12 mb-0 ">
                    <h6 class="mb-3 text-center text-bold ">NASA SHOP in Google Map</h6>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3881.878316881851!2d103.85248937464405!3d13.357841586994148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311017e85da9aad7%3A0xbf5d02c5c25ae603!2sNasa%20Computer%20Technology!5e0!3m2!1sen!2skh!4v1699017531502!5m2!1sen!2skh"
                         width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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