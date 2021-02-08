<?php
include "../auth.php";
if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}

include "../dbconnect.php";
$consultation_fee = $_POST['consultation_fee'];

$db->beginTransaction();
$query = $db->prepare("UPDATE settings SET consultation_fee = ?");
$query->execute([$consultation_fee]);

if ($db->commit()){
    $_SESSION['success_msg'] = "Success";
}else{
    $_SESSION['error_msg'] = "Sorry! error occurred";
}

header("location: settings.php");
exit();

?>