<?php
session_start();
include('../dbconnect.php');

$id = $_POST['id'];


$sql = "DELETE FROM patients WHERE id = $id";
$q = $db->prepare($sql);
$q->execute();

if ($q){
    $_SESSION['success_msg'] = "Record Deleted Successfully";
}else{
    $_SESSION['error_msg'] = "Sorry! Error occurred";
}

header("location: index.php");


?>