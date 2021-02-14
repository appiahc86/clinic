<?php
include "../auth.php";
if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}

include "../dbconnect.php";
$card_fee = $_POST['card_fee'];

$db->beginTransaction();
$query = $db->prepare("UPDATE settings SET card_fee = ?");
$query->execute([$card_fee]);

if ($db->commit()){
    $_SESSION['success_msg'] = "Success";
}else{
    $_SESSION['error_msg'] = "Sorry! error occurred";
}

header("location: settings.php");
exit();

?>