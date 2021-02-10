<?php

include "../auth.php";

//if ($_SESSION['role'] != 1){
//    header("location: ../home/index.php");
//}

$file_name = "multi-" . date('d-m-Y-h:i:s') . ".sql";
$cmd = "/opt/lampp/bin/mysqldump --user=root --host=localhost -p multi > ../backup/" . $file_name;

//    exec('C:\xampp\mysql\bin\mysqldump -u root -h localhost pos > c:\Mybackup\pos.sql'); //for windows


$output = null;
$results = null;
    exec($cmd, $output, $results);

if ($results == 0){
    $_SESSION['success_msg'] = "Backup was successful";
}else  $_SESSION['error_msg'] = "Sorry!, Backup Failed";

header("location: ../home/index.php");
exit();


?>