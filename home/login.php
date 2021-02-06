<?php
session_start();

if (!empty($_SESSION['username'])){
    header("location: ../home/index.php");
}

include "../dbconnect.php";

$username = "";
$password = "";
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = strtolower(trim($_POST['username']));
    $password = $_POST['password'];
    $deleted = false;

$query = $db->prepare("SELECT * FROM users WHERE username = ? And deleted = ? LIMIT 1");
$query->execute([$username, $deleted]);
$res = $query->fetch();

if (!empty($res)){
    if (password_verify($password, $res['password'])){ //if password is correct
      if ($res['password_reset'] == false){ //if its a new user redirect to reset password page
          $_SESSION['username'] = $res['username'];
          $_SESSION['password'] = $res['password'];
          $_SESSION['password_reset'] = "Please you must create a new password";
          header("location: new_password.php");
      }else{
          $_SESSION['firstName'] = $res['firstName'];
          $_SESSION['lastName'] = $res['lastName'];
          $_SESSION['role'] = $res['user_role'];
          $_SESSION['password'] = $res['password'];
          $_SESSION['username'] = $res['username'];
          $_SESSION['user_id'] = $res['user_id'];

          //Redirect to home page
          header("location: index.php");

      }
    }else{ //if password does not match
        array_push($errors, "Sorry, incorrect password");
    }
}else{ //if user is not found
    array_push($errors, "Sorry, this user does not exist");
}

} //if submit button is clicked


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MULTI-CLINIC</title>
    <link rel="icon" href="/img/icon.ico">
    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">
    <!--  Toastr  -->
    <link href="../public/css/toastr.css" rel="stylesheet">
</head>

<style>

    .my-title {
        color: #fff;
        font-size: 4em;
        font-weight: bold;
        font-family: "Times New Roman", "Marlett", Arial, Helvetica, sans-serif;
        text-shadow:
                0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 3px 0 #bbb,
                0 4px 0 #b9b9b9,
                0 5px 0 #aaa,
                0 6px 1px rgba(0,0,0,.1),
                0 0 5px rgba(0,0,0,.1),
                0 1px 3px rgba(0,0,0,.3),
                0 3px 5px rgba(0,0,0,.2),
                0 5px 10px rgba(0,0,0,.25),
                0 10px 10px rgba(0,0,0,.2),
                0 20px 20px rgba(0,0,0,.15);
    }




    .container{
        margin-top: 10% !important;
    }

    .form-control{
        border-radius: 20px;
    }

    body{
        background: #7abaff;
    }

    .card{
        border-radius: 20px !important;
    }

</style>

<body >


<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <h3 class="text-center my-title">MULTI-CLINIC</h3>


            <div class="card shadow-lg p-5">


                <?php  //Display errors
                if (count($errors) > 0){ ?>

                    <div class="alert alert-danger">

                        <?php
                        foreach ($errors as $error) { ?>
                            <li><?php echo $error; ?></li>
                        <?php  } ?>

                    </div>

                <?php } ?>

                <form action="#" method="post" class="myform">
                    <div class="form-group">
                        <input type="text" value="<?php echo $username; ?>" placeholder="Username"
                               name="username" class="form-control"
                               autocomplete="off" autofocus required>
                    </div>

                    <div class="form-group">
                        <input type="password" value="<?php echo $password; ?>" id="password" placeholder="Password"
                               name="password" class="form-control" required>
                    </div>

                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="showPassword">
                        <label class="form-check-label" style="color: black;" for="showPassword">Show Password</label>
                    </div>

                    <button type="submit" class="btn btn-dark mybtn"><span class="fas fa-lock"></span> Login</button>
                </form>
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

        //success messages
        <?php
        if (!empty($_SESSION['success_msg'])){ ?>

        toastr.success('<?php echo $_SESSION['success_msg']; ?>'); //Success messages

        <?php
        unset($_SESSION['success_msg']);
        } ?>

        //    Show/Hide password
        const password = document.querySelector("#password");
        const showPassword = document.querySelector("#showPassword");

        showPassword.onclick = function () {
            if (password.type === "password"){
                password.type = "text";
            }else{
                password.type = "password";
            }
        }

    }
</script>

</body>
</html>