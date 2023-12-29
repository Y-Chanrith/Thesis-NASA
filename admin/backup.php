<?php 
session_start();
// include_once('../dbcon.php');

    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'nasa_computer_shop');

    // define('DIR', 'C:/xampp/htdocs/Thesis/admin/backupDB/');
    define('DIR', 'D:\DB_backUp/');

    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d_H-i-s');
    $backup_file = DB_NAME . '-' . $date . '.sql';

    $command = "C:/xampp/mysql/bin/mysqldump --user=" . DB_USER . " --password=" . DB_PASS . " " . DB_NAME . " > ". DIR ."" . $backup_file;
    system($command);
    if($command){
        header("Location: ../admin/backup_data.php");
    }
    else{
     echo("Backup File Fail!!");
    }  
?>