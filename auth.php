<?php
if (!isset($_SESSION)){
    session_start();
}


if (empty($_SESSION['firstName'])){
    header("location: ../home/login.php");
}

?>