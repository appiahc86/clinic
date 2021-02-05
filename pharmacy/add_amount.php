<?php
if (!isset($_SESSION)){
    session_start();
}

require_once '../dbconnect.php';
$patient_id = $_POST['patient_id'];
$treatment_id = $_POST['treatment_id'];
$medicine_fee = $_POST['fee'];

if (empty($medicine_fee)){
    $medicine_fee = 0;
}

$query = $db->prepare("UPDATE treatments SET medicine_fee = ? WHERE treatment_id = ?");
$query->execute([$medicine_fee, $treatment_id]);

$patient_id = 'mc' . $patient_id;

if ($query != ""){
    $_SESSION['success_msg'] = "Record saved successfully";
}else{
    $_SESSION['error_msg'] = "Sorry, error occurred";
}

header('Location: search.php?patient_id=' . $patient_id);

?>