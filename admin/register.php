<?php
include "../auth.php";

if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}

include "../dbconnect.php";

$firstName = "";
$lastName = "";
$username = "";
$role = "";
$password = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = strtolower(trim($_POST['username']));
    $role = $_POST['role'];
    $password = $_POST['password'];
    $date = date('y-m-d');

//Validation
    if (empty($firstName) || empty($lastName) || empty($username) || empty($role) || empty($password)){
        array_push($errors, "All fields are required");
    }

    if (!empty($password)){//check password length
        if (strlen($password) < 6){
            array_push($errors, "Password must be at least 6 characters");
        }
    }

    if (!empty($username)){ //check username length
        if (strlen($username) < 3){
            array_push($errors, "Username must be at least 3 characters");
        }
    }

    if (strpos($username, ' ')){ //check for spaces
        array_push($errors, "Username must not contain spaces");
    }

    if (count($errors) == 0){ //Check if user exists
        $checkUser = $db->prepare("SELECT * FROM users WHERE username = ?");
        $checkUser->execute([$username]);
        $res = $checkUser->fetch();

        if (!empty($res)){
            array_push($errors, "Sorry this user already exists");
        }else{ //If validation passes, save user

            //Hash Password
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $query = $db->prepare("INSERT INTO users(firstName, lastName, username, user_role, password )
          VALUES (?, ?, ?, ?, ?)
        ");
            $query->execute([$firstName, $lastName, $username, $role, $hashed]);

            if ($query != ""){
                $_SESSION['success_msg'] = "User saved successfully";
            }else{
                $_SESSION['error_msg'] = "Sorry, error occurred";
            }

            header('Location: register.php');
            exit();

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

<body oncontextmenu="return false">


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">

                <div class="card-header bg-gradient-success text-white"><b><span class="fas fa-user-friends"></span> Add A User</b></div>

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
                            <label for="firstName" class="col-md-4 col-form-label text-md-right"><b>First Name</b></label>

                            <div class="col-md-6">
                                <input id="firstName"
                                       type="text"
                                       class="shadow form-control"
                                       name="firstName"
                                       autocomplete="off"
                                       required
                                       autofocus
                                       value="<?php echo $firstName; ?>"
                                >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right"><b>Last Name</b></label>

                            <div class="col-md-6">
                                <input id="lastName"
                                       type="text"
                                       class="shadow form-control"
                                       name="lastName"
                                       required
                                       autocomplete="off"
                                       value="<?php echo $lastName; ?>"
                                >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right"><b>Username</b></label>

                            <div class="col-md-6">
                                <input id="username"
                                       type="text"
                                       class="shadow form-control"
                                       name="username"
                                       required
                                       autocomplete="off"
                                       value="<?php echo $username; ?>"
                                     
                                >

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right"><b>User Role</b></label>

                            <div class="col-md-6">
                                <select name="role" id="role" class="form-control" required>
                                    <option value=""></option>
                                    <option value="1">Admin</option>
                                    <option value="2">Doctor</option>
                                    <option value="3">Lab Technician</option>
                                    <option value="4">Receptionist</option>
                                    <option value="5">Pharmacist</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><b>Password</b></label>

                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="shadow form-control"
                                       name="password"
                                       required
                                       autocomplete="off"
                                >

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" name="submit" class="btn btn-primary mybtn font-weight-bold">
                                    Register
                                </button>
                                <span><a href="users.php" class="btn btn-secondary">Back</a></span>
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
</html>
