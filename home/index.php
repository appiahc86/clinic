<?php
include "../auth.php";
include '../layouts/header.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Welcome</h2>
          </div>

          <!-- Content Row -->
          <div class="row">

      <?php
        switch($_SESSION['role']){
            case 1: ?>
                <!-- Lab -->
                <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../admin/users.php'">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Users</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lab -->
                <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href=''">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Settings</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Settings</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-scissors fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php break; ?>

            <?php    case 2: ?> <!-- For doctors -->
            <!--  Patients  -->
            <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../doctors/view_patients.php'">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Patients</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">View Patients</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctors -->
            <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../treatment/index.php'">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doctors</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Treatments</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>

        <?php    case 3: ?> <!-- For Lab Technicians -->
            <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../lab/index.php'">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Test</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Run Tests</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>

        <?php    case 4: ?> <!-- For Lab Receptionist -->
            <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../reception/index.php'">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Patients</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Manage Patients</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break; ?>

        <?php    default : ?> <!-- For pharmacy -->
            <div class="col-xl-6 col-md-6 mb-2" onclick="window.location.href='../pharmacy/index.php'">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Prescription</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">View Prescription</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       <?php }  ?>


          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->



<?php include '../layouts/footer.php'; ?>