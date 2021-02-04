<?php
session_start();
include('../dbconnect.php');

$patient_id = $_POST['patient_id'];

//If patient has medical history, prevent use from deleting
$cannotDelete = $db->prepare("SELECT * FROM treatments WHERE patient_id = ? Limit 1");
$cannotDelete->execute([$patient_id]);
$res = $cannotDelete->fetch();

if (!empty($res)){
    $_SESSION['error_msg'] = "Sorry, cannot remove this patient";
    return  header("location: search.php");

}else{ //If patient has no medical records, delete it
    $sql = "DELETE FROM patients WHERE patient_id = ?";
    $q = $db->prepare($sql);
    $q->execute([$patient_id]);

    if ($q){
        $_SESSION['success_msg'] = "Record Deleted Successfully";
    }else{
        $_SESSION['error_msg'] = "Sorry! Error occurred";
    }

    header("location: search.php");
}






?>