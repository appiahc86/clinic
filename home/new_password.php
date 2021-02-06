<?php
session_start();

if (empty($_SESSION['username'])){
    header("location: ../home/login.php");
}
include "../dbconnect.php";

$new_password = "";
$confirm = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $new_password = $_POST['new_password'];
    $confirm = $_POST['confirm'];

    $username = $_SESSION['username'];

    if ($new_password != $confirm){
        array_push($errors, "New passwords do not match");
    }

    if (strlen($new_password) < 6 || strlen($confirm) < 6){ //password length
        array_push($errors, "Password must be at least 6 characters");
    }

      if (count($errors) == 0){ //if no errors, save password

          //Hash password
          $hash = password_hash($new_password, PASSWORD_DEFAULT);
          $query = $db->prepare("UPDATE users SET password = ?, password_reset = ? WHERE username = ?");
          $query->execute([$hash, true, $username]);

          if ($query){ //if password is updated
              $find_user = $db->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
              $find_user->execute([$username]);
              $res = $find_user->fetch();

              if ($res != ""){
                  $_SESSION['firstName'] = $res['firstName'];
                  $_SESSION['lastName'] = $res['lastName'];
                  $_SESSION['role']     = $res['user_role'];
                  $_SESSION['password'] = $res['password'];
                  $_SESSION['username'] = $res['username'];
                  $_SESSION['success_msg'] = "You are logged in";

                  //Redirect to home page
                  header("location: index.php");
                  exit();
              }

          }else{//if password was not updated successfully
              array_push($errors, "Sorry, error occured");
          }
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

<body oncontextmenu="return false" style="background: #ccc;">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-5">
            <div class="card shadow">

                <div class="card-header bg-gradient-warning text-white" style="font-size: 2em;">
                    <b>
                        <span class="fas fa-lock"></span>
                        Create New Password
                    </b>
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
                                    <span class="fas fa-lock"></span>
                                    Save
                                </button>
                                <span><a href="index.php" class="btn btn-secondary">Back</a></span>
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

        // Reset password message
        <?php
        if (!empty($_SESSION['password_reset'])){ ?>

        toastr.warning('<?php echo $_SESSION['password_reset']; ?>'); //Success messages

        <?php
        unset($_SESSION['password_reset']);
        } ?>

    }
</script>

</body>

