<?php
session_start();
include('../dbconnect.php');

$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$test = trim($_POST['test']);

$query = $db->prepare("UPDATE treatments SET test = ? WHERE treatment_id = ?"); //will add doctor id later
$query->execute([$test, $treatment_id]);


if ($query){
    $_SESSION['success_msg'] = "Record Saved Successfully";
}else {
    $_SESSION['error_msg'] = "Sorry record was not saved";
}

header("location: search.php?patient_id=" . $patient_id);

?>