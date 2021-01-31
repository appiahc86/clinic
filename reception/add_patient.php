<?php
session_start();

include('../dbconnect.php');
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$contact = $_POST['contact'];
$dob = $_POST['dob'];
$sex = $_POST['sex'];
$amount = $_POST['amount'];
$address = $_POST['address'];
$insurance = $_POST['insurance'];
//$date = date('y-m-d');

$query = $db->prepare("INSERT INTO patients(firstName,lastName,dob,sex,contact,insurance,address,amount) VALUES 
(?,?,?,?,?,?,?,?)");

$query->execute([ $firstName, $lastName, $dob, $sex, $contact, $insurance, $address, $amount]);


if ($query){
    $_SESSION['success_msg'] = "Record Saved Successfully";
    $_SESSION['opdNumber'] = [
        'firstName'=>$firstName,
        'lastName' =>$lastName,
        'insurance' =>$insurance,
        'dob' =>$dob,
        'date' =>date('y-m-d'),
        'sex' =>$sex,
        'contact' =>$contact,
        'address' =>$address,
        'id' => $db->lastInsertId()
        ];
}else {
    $_SESSION['error_msg'] = "Sorry record was not saved";
}

header("location: index.php");


?>