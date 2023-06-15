<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	if(!isset($_SESSION['username'])){
		header("Location:index.php");
	}
 ?>
</body>
</html>