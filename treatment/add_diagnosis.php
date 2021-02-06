<?php
include "../auth.php";
if ($_SESSION['role'] != 2){
    header("location: ../home/index.php");
}
include('../dbconnect.php');

$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$diagnosis = trim($_POST['diagnosis']);
$user_id = $_SESSION['user_id'];

$query = $db->prepare("UPDATE treatments SET user_id = ?, diagnosis = ? WHERE treatment_id = ?"); //will add doctor id later
$query->execute([$user_id, $diagnosis, $treatment_id]);


if ($query){
    $_SESSION['success_msg'] = "Record Saved Successfully";
}else {
    $_SESSION['error_msg'] = "Sorry record was not saved";
}

header("location: search.php?patient_id=" . $patient_id);

?>