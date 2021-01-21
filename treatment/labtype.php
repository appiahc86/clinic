<?php
session_start();
include('../dbconnect.php');
$a = $_POST['lab_type'];

// query
$sql = "INSERT INTO lab_recomm (lab_type) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a));

$_SESSION['success_msg'] = "Record Saved Successfully";

header("location: index.php");


?>