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

                <div class="alert alert-danger">
                    <li>Sorry!!, Username or password is incorrect</li>
                </div>

                <form action="" method="post" class="myform">
                    <div class="form-group">
                        <input type="text" value="" placeholder="Username" name="username" class="form-control"
                               autocomplete="off" autofocus required>
                    </div>

                    <div class="form-group">
                        <input type="password" value="" id="password" placeholder="Password"
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