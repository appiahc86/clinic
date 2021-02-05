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

                    <div class="alert alert-danger">
                        <li>Sorry!!, Username or password is incorrect</li>
                        <li>Sorry!!, Username or password is incorrect</li>
                    </div>

                    <form method="POST" action="" class="myform">
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
                                       value=""
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
                                       value=""
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
                                       value=""
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
                                <input type="submit" value="Register" class="btn btn-success mybtn font-weight-bold">
                                <span><a href="/" class="btn btn-secondary">Back</a></span>
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