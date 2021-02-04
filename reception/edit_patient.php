<?php
session_start();
include('../dbconnect.php');
$patient_id = $_POST['patient_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$address = $_POST['address'];
$insurance = $_POST['insurance'];


// query
$sql = "UPDATE patients SET 
    firstName = ?, 
    lastName = ?,
    contact = ?,
    dob = ?,
    sex = ?,
    address = ?,
    insurance = ?
    WHERE patient_id = ?
";

$save = $db->prepare($sql);
$save->execute([$firstName, $lastName, $contact, $dob, $sex, $address, $insurance, $patient_id]);

if ($save){
    $_SESSION['success_msg'] = "Record Updated Successfully";
}else{
    $_SESSION['error_msg'] = "Sorry!! Error occurred";
}


header("location: index.php");

?>