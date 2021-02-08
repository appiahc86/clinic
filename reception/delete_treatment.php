<?php
include "../auth.php";
if ($_SESSION['role'] != 4){
    header("location: ../home/index.php");
}
include('../dbconnect.php');

$doctor_id = $_POST['doctor_id'];
$treatment_id = $_POST['treatment_id'];



//if (empty($doctor_id)){
//    echo "empty";
//}else echo $doctor_id;

if (empty($doctor_id)){
    $remove = $db->prepare("DELETE FROM treatments WHERE treatment_id = ?");
    if ($remove->execute([$treatment_id])){
        $_SESSION['success_msg'] = "Record removed successfully";
    }else{
        $_SESSION['error_msg'] = "Sorry, error occurred";
    }


}else{
    $_SESSION['error_msg'] = "Sorry, cannot remove this record. Patient has been attended to";
}

header("location: today_patients.php");
exit();