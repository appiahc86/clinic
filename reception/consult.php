<?php
session_start();
include "../dbconnect.php";

$patient_id =  $_POST['patient_id'];
$consultation_fee = $_POST['consultation_fee'];
$date = date('y-m-d');

//Check if patients is receiving treatment already
$check = $db->prepare("SELECT * FROM treatments WHERE patient_id = ? AND date = ? LIMIT 1");
$check->execute([$patient_id, $date]);

if (!empty($check->fetch())){
    $_SESSION['error_msg'] = "Sorry, this patient is already receiving treatment";
    return header("Location: index.php");
}


//If patient is not recieving treatment
//Insert into treatments table
$query = $db->prepare("INSERT INTO treatments (patient_id, consultation_fee) VALUES (?,?)");
$query->execute([$patient_id, $consultation_fee]);

if ($query){
    $_SESSION['success_msg'] = "Success";
}else{
    $_SESSION['error_msg'] = "Error";
}

header("Location: index.php");
?>