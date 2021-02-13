
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MULTI-CLINIC</title>
    <link rel="icon" type="image/jpg" href="../public/img/logo.jpg" sizes="32x32"/>
    <!-- Custom fonts for this template-->
    <link href="../public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../public/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

        <!--  Toastr  -->
    <link href="../public/css/toastr.css" rel="stylesheet">



</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home/index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hospital-symbol"></i>
            </div>
            <div class="sidebar-brand-text mx-3">MULTI-CLINIC</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="../home/index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>



        <!-- Nav Item - Charts -->
<!--                <li class="nav-item">-->
<!--                    <a class="nav-link" href="../admin/backup.php">-->
<!--                        <i class="fas fa-fw fa-database"></i>-->
<!--                        <span>Backup</span></a>-->
<!--                </li>-->

        <hr class="sidebar-divider">
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>

                <span><b>Hi, <?php echo ucfirst(strtolower($_SESSION['firstName'])); ?></b></span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Settings</h6>
                    <a class="collapse-item" href="../home/reset_password.php">Reset Password</a>
                    <a class="collapse-item" href="../home/logout.php">Logout</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">




        <!-- Nav Item - Tables -->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="">-->
<!--                <i class="fas fa-fw fa-table"></i>-->
<!--                <span>Tables</span></a>-->
<!--        </li>-->

        <!-- Divider -->
<!--        <hr class="sidebar-divider d-none d-md-block">-->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline" style="margin-top: 50px;">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <nav class="mb-5 shadow-lg" style="height: 1px;">
                <div class="text-center font-weight-bold mr-3"
                     id="clock" style="font-size: 2em; float: right; color: #a3b6ee"></div>
            </nav>
            <!-- Topbar -->
<!--            <nav class="navbar navbar-expand topbar mb-4 static-top shadow-lg">-->
<!---->
                        <!-- <Sidebar Toggle (Topbar) -->
<!--                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">-->
<!--                    <i class="fa fa-bars"></i>-->
<!--                </button>-->
<!---->
<!---->
                       <!-- Topbar Navbar -->
<!--                <ul class="navbar-nav ml-auto">-->
<!---->
                       <!-- Nav Item - Search Dropdown (Visible Only XS) -->
<!--                    <li class="nav-item dropdown no-arrow d-sm-none">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            <i class="fas fa-search fa-fw"></i>-->
<!--                        </a>-->
                          <!-- Dropdown - Messages -->
<!--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">-->
<!--                            <form class="form-inline mr-auto w-100 navbar-search">-->
<!--                                <div class="input-group">-->
<!--                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">-->
<!--                                    <div class="input-group-append">-->
<!--                                        <button class="btn btn-primary" type="button">-->
<!--                                            <i class="fas fa-search fa-sm"></i>-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
                        <!-- Nav Item - User Information -->
<!--                    <li class="nav-item dropdown no-arrow">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                            <span class="mr-2 d-none d-md-inline" style="color: #4e4c4c;">-->
<!--                                Welcome! <b>--><?php //echo ucfirst(strtolower($_SESSION['firstName'])); ?><!--</b>-->
<!--                            </span>-->
<!--                            <span class="fas fa-user-circle" style="font-size: 24px;"></span>-->
<!--                        </a>-->
                        <!-- Dropdown - User Information -->
<!--                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in text-dark" aria-labelledby="userDropdown">-->
<!---->
<!--                            <a class="dropdown-item" href="../home/reset_password.php" style="font-size: 15px;">-->
<!--                                <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-600"></i>-->
<!--                                Reset Password-->
<!--                            </a>-->
<!--                            <div class="dropdown-divider"></div>-->
<!--                            <a class="dropdown-item" href="../home/logout.php" style="font-size: 15px;">-->
<!--                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>-->
<!--                                Logout-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!---->
<!--            </nav>-->
            <!-- End of Topbar -->