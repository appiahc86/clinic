<?php
include "../auth.php";

if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}
include "../dbconnect.php";
$user_id = $_POST['user_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$role = $_POST['role'];

$db->beginTransaction();
$update = $db->prepare("UPDATE users SET firstName = ?, lastName = ?, user_role = ? WHERE user_id = ?");
$update->execute([$firstName, $lastName, $role, $user_id]);

if (!empty(trim($_POST['password']))){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $change_pass = $db->prepare("UPDATE users SET password = ? WHERE user_id = ?");
    $change_pass->execute([$password, $user_id]);
}

if ($db->commit()){
    $_SESSION['success_msg'] = "Record Updated Successfully";
}else{
    $_SESSION['error_msg'] = "Sorry!!, error occurred";
}

header("location: users.php");
exit();
?>