<?php
include "../auth.php";
if ($_SESSION['role'] != 4){
    header("location: ../home/index.php");
}
include('../dbconnect.php');

$patient_id = $_POST['patient_id'];
$date = date('y-m-d');
$empty_string = '';

//If patient has medical history, prevent use from deleting
$cannotDelete = $db->prepare("SELECT * FROM treatments WHERE patient_id = ? AND user_id <> ? Limit 1");
$cannotDelete->execute([$patient_id, $empty_string]);
$res = $cannotDelete->fetch();

if (!empty($res)){
    $_SESSION['error_msg'] = "Sorry, cannot remove this patient";
    return  header("location: index.php");

}else{ //If patient has no medical records, delete it
    $db->beginTransaction();
    $sql = "DELETE FROM patients WHERE patient_id = ?";
    $q = $db->prepare($sql);
    $q->execute([$patient_id]);

    //delete patient record(todays's record) from treatments table
    $tre = $db->prepare("DELETE FROM treatments WHERE patient_id = ?");
    $tre->execute([$patient_id]);

    if ($db->commit()){
        $_SESSION['success_msg'] = "Record Deleted Successfully";
    }else{
        $_SESSION['error_msg'] = "Sorry! Error occurred";
    }

    header("location: index.php");
}


?>