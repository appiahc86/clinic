<?php
session_start();
include('../dbconnect.php');
$a = $_POST['treat'];

// query
$sql = "INSERT INTO medical_treatment (treat) VALUES (:a)";
$q = $db->prepare($sql);
$q->execute(array(':a' => $a));

$_SESSION['success_msg'] = "Record Saved Successfully";

header("location: index.php");


?>