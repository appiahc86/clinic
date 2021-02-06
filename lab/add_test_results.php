<?php
include "../auth.php";
if ($_SESSION['role'] != 3){
    header("location: ../home/index.php");
}

require_once '../dbconnect.php';
$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$test_fee = $_POST['fee'];
$test_results = trim($_POST['result']);

if (empty($test_fee)){
    $test_fee = 0;
}

$query = $db->prepare("UPDATE treatments SET test_results = ?, test_fee = ? WHERE treatment_id = ?");
$query->execute([$test_results, $test_fee, $treatment_id]);

$patient_id = 'mc' . $patient_id;

if ($query != ""){
   $_SESSION['success_msg'] = "Record saved successfully";
}else{
    $_SESSION['error_msg'] = "Sorry, error occurred";
}

header('Location: search.php?patient_id=' . $patient_id);

?>