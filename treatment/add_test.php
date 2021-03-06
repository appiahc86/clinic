<?php
include "../auth.php";
if ($_SESSION['role'] != 2){
    header("location: ../home/index.php");
}
include('../dbconnect.php');

$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$test = trim($_POST['test']);
$user_id = $_SESSION['user_id'];

$query = $db->prepare("UPDATE treatments SET user_id = ?, test = ? WHERE treatment_id = ?"); //will add doctor id later
$query->execute([$user_id, $test, $treatment_id]);


if ($query){
    $_SESSION['success_msg'] = "Record Saved Successfully";
}else {
    $_SESSION['error_msg'] = "Sorry record was not saved";
}

header("location: search.php?patient_id=" . $patient_id);

?>