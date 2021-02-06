<?php
include "../auth.php";

if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}
include "../dbconnect.php";

$user_id = $_POST['user_id'];
$deleted = true;

$query = $db->prepare("UPDATE users SET deleted = ? WHERE user_id = ?");
if ($query->execute([$deleted, $user_id])){
    $_SESSION['success_msg'] = "User removed successfully";
}else{
    $_SESSION['error_msg'] = "Sorry! error occurred";
}

return header("location: users.php");
exit();
?>