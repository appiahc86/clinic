<?php
session_start();
include('../dbconnect.php');
$a = $_POST['prescription'];

// query
$sql = "INSERT INTO pham_comm (prescription) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a));

$_SESSION['success_msg'] = "Record Saved Successfully";

header("location: index.php");


?>