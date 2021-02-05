<?php include '../layouts/header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h3 mb-0 text-gray-800">Welcome</h2>
          </div>

          <!-- Content Row -->
          <div class="row">

        <!--  Patients  -->
            <div class="col-xl-4 col-md-4 mb-2" onclick="window.location.href='../reception/index.php'">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">OPD</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">O.P.D</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-astronaut fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Doctors -->
            <div class="col-xl-4 col-md-4 mb-2" onclick="window.location.href='../doctors/index.php'">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Doctors</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Doctors Center</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



              <!-- Lab -->
              <div class="col-xl-4 col-md-4 mb-2" onclick="window.location.href='../lab/index.php'">
                  <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Lab</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">Laboratory Services</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-scissors fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


              <!-- Pharmacy -->
              <div class="col-xl-4 col-md-4 mb-2" onclick="window.location.href='../pharmacy/index.php'">
                  <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pharmacy</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">Pharmacy</div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-capsules fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->



<?php include '../layouts/footer.php'; ?>