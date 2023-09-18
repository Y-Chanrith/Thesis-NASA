<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		include '../include/navigation.php';
		include '../include/header.php';
	?>
<center>
	<div class="container m-3 vh-100">
	<form method="post" action="" class="">
	Choose file restore: 
	<input type="file" name="db" class=" m-3">
	<input type="submit" value="Restore" class="btn btn-success">
</form>
<?php
if(isset($_POST["db"])){

$HostName ='localhost';
$UserName ='root';
$Password ='';
$DatabaseName ='nasa_computer_shop';
$ImportFilename ='D:\DB_Backup\files\\' . $_POST["db"];

$command='mysql -h' .$HostName .' -u' .$UserName .' -p' .$Password .' ' .$DatabaseName .' < ' .$ImportFilename;
exec($command,$output,$worked);

switch($worked){
case 0:
echo 'The data from the file <b>' .$ImportFilename .'</b> were successfully imported into the database <b>' .$DatabaseName .'</b>';
break;
case 1:
echo 'An error occurred during the import.';
break;
}
}  

?>
	</div>
	</center>
</body>
</html>