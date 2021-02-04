<?php
if (!isset($_SESSION)){
    session_start();
}

require_once '../dbconnect.php';
$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$test_results = trim($_POST['result']);

$query = $db->prepare("UPDATE treatments SET test_results = ? WHERE treatment_id = ?");
$query->execute([$test_results, $treatment_id]);


$patient_id = 'mc' . $patient_id;

if ($query != ""){
   $_SESSION['success_msg'] = "Record saved successfully";
}else{
    $_SESSION['error_msg'] = "Sorry, error occurred";
}

header('Location: search.php?patient_id=' . $patient_id);

?>