<?php
session_start();
if (empty($_SESSION['firstName'])){
    header("location: login.php");
}

include "../dbconnect.php";

$current_password = "";
$new_password = "";
$confirm = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $current_password = $_POST['current'];
    $new_password = $_POST['new_password'];
    $confirm = $_POST['confirm'];

    $username = $_SESSION['username'];


if (!password_verify($current_password,  $_SESSION['password'])){
    array_push($errors, "Your current password is wrong");
}

if ($new_password != $confirm){
    array_push($errors, "New passwords do not match");
}

if (count($errors) == 0){
    //hash password
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $update = $db->prepare("UPDATE users SET password = ? WHERE username = ?");
    if ($update->execute([$hash, $username])){
        unset($_SESSION['username']);
        unset($_SESSION['firstName']);
        unset($_SESSION['lastName']);
        unset($_SESSION['role']);
        unset($_SESSION['password']);
        $_SESSION['success_msg'] = "Password reset was successful. You may login now";
    }else{
        $_SESSION['error_msg'] = "Sorry, error occurred";
    }
    header("location: login.php");
    exit();
}

}



?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MUlTI-CLINIC</title>
    <link rel="icon" href="/img/icon.ico">
    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <!--  Toastr  -->
    <link href="../public/css/toastr.css" rel="stylesheet">
</head>

<style>

    .container{
        margin-top: 8% !important;
    }

</style>

<body oncontextmenu="return false">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">

                <div class="card-header bg-gradient-success text-white"><b><span class="fas fa-lock" style="font-size: 2em;">

                   Reset Password </span>
                </div>

                <div class="card-body">

                    <?php  //Display errors
                    if (count($errors) > 0){ ?>

                        <div class="alert alert-danger">

                            <?php
                            foreach ($errors as $error) { ?>
                                <li><?php echo $error; ?></li>
                            <?php  } ?>

                        </div>

                    <?php } ?>

                    <form  action="#" method="POST" class="myform">
                        <div class="form-group row">
                            <label for="current" class="col-md-4 col-form-label text-md-right"><b>Current Password</b></label>

                            <div class="col-md-6">
                                <input id="current"
                                       type="password"
                                       class="shadow form-control"
                                       name="current"
                                       autocomplete="off"
                                       required
                                       minlength="6"
                                       autofocus
                                       value="<?php echo $current_password; ?>"
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpass" class="col-md-4 col-form-label text-md-right"><b>New Password</b></label>

                            <div class="col-md-6">
                                <input id="newpass"
                                       type="password"
                                       class="shadow form-control"
                                       name="new_password"
                                       required
                                       minlength="6"
                                       autocomplete="off"
                                       value="<?php echo $new_password; ?>"
                                >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="confirm" class="col-md-4 col-form-label text-md-right"><b>Confirm Password</b></label>

                            <div class="col-md-6">
                                <input id="confirm"
                                       type="password"
                                       class="shadow form-control"
                                       name="confirm"
                                       required
                                       minlength="6"
                                       autocomplete="off"
                                       value="<?php echo $confirm; ?>"
                                       onkeypress="return "
                                >

                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary mybtn font-weight-bold">
                                    Reset
                                </button>
                                <span><a href="index.php" class="btn btn-secondary">Cancel</a></span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../public/vendor/jquery/jquery.min.js"></script>
<!--Toastr-->
<script src="../public/js/toastr.js"></script>
<script>
    window.onload = function (){


        const mybtns  = document.querySelectorAll(".mybtn");
        const myforms  = document.querySelectorAll(".myform");

        for (const myform of myforms) {
            myform.onsubmit = function (){
                for (const mybtn of mybtns) {
                    mybtn.disabled = true;
                    mybtn.value = "Please wait..."
                }
            }
        }



        //toastr messages
        //success messages
        <?php
        if (!empty($_SESSION['success_msg'])){ ?>

        toastr.success('<?php echo $_SESSION['success_msg']; ?>'); //Success messages

        <?php
        unset($_SESSION['success_msg']);
        } ?>

        // Error messages
        <?php
        if (!empty($_SESSION['error_msg'])){ ?>

        toastr.error('<?php echo $_SESSION['error_msg']; ?>'); //Success messages

        <?php
        unset($_SESSION['error_msg']);
        } ?>


    }
</script>

</body>

