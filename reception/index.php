<?php include "../layouts/header.php"; ?>

<button class="d-none" id="opdNumber" data-toggle="modal" data-target="#opd<?php echo $_SESSION['opdNumber'] ? $_SESSION['opdNumber'] : ''; ?>"></button>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Patients</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="text-decoration-none btn btn-primary btn-sm mt-1 mb-2" data-toggle="modal" data-target="#addPatient">
                <span class="fas fa-user-astronaut"></span>
                Add A New Patient
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>OPD No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>INS No</th>
                        <th>Sex</th>
                        <th>Details</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    include('../dbconnect.php');
                    $results = $db->prepare("SELECT * FROM patients");
                    $results->execute();
                    for($i=0; $row = $results->fetch(); $i++){
                    ?>

                    <tr>
                        <td>MC<?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['insurance']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td class="text-center"><a href="" class="btn btn-sm btn-success"><span class="fas fa-eye"></span></a></td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm" href="" data-toggle="modal" data-target="#edit<?php echo $row['id']; ?>">
                                <span class="fas fa-edit"></span>
                            </a>
                        </td class="text-center">
                        <td>
                            <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#del<?php echo $row['id']; ?>">
                                <span class="fas fa-trash-alt"></span>
                            </a>
                        </td>
                    </tr>



                        <!--  Edit Modal -->
                        <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
                            <br><br>
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel"><i class="fas fa-user-astronaut"></i><span class="text-primary"> Modify This Record</span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">X</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <!-- ./Form -->
                                        <form action="edit_patient.php" method="post" class="myform">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="form-group  col-md-4">
                                                        <label for="e_firstName">First Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input class="form-control"  value="<?php echo $row['firstName']; ?>" minlength="3" autocomplete="off" required="required" name="firstName" type="text" id="e_firstName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label for="e_lastName">Last Name</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" value="<?php echo $row['lastName']; ?>" minlength="3" autocomplete="off" required="required" name="lastName" type="text"  id="e_lastName">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label for="e_ins">INS Number</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-list"></span>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="insurance" autocomplete="off" type="text" value="<?php echo $row['insurance']; ?>" id="e_ins">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label for="e_contact">Contact</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-phone"></span>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" name="contact" autocomplete="off" type="text" value="<?php echo $row['contact']; ?>" id="tel">
                                                        </div>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label for="e_dob">DOB</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text font-weight-bold">
                                                                    <span class="fas fa-user"></span>
                                                                </div>
                                                            </div>
                                                            <input class="form-control" value="<?php echo $row['dob']; ?>" name="dob" type="date" id="e_dob">
                                                        </div>
                                                    </div>

                                                    <div class="form-group  col-md-4">
                                                        <label for="e_sex">Sex</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text font-weight-bold">
                                                                    <span class="fas fa-user"></span>
                                                                </div>
                                                            </div>
                                                            <select name="sex" id="e_sex" class="form-control" required>
                                                                <option value="<?php echo $row['sex']; ?>"><?php echo ucfirst($row['sex'])  ?></option>
                                                                <option value="<?php echo $row['sex'] == 'male' ? 'female' : 'male'; ?>"><?php echo $row['sex'] == 'male' ? 'Female' : 'Male'; ?></option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group  col-md-12">
                                                        <label for="e_address">Address</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-address-card"></span>
                                                                </div>
                                                            </div>
                                                            <textarea name="address" class="form-control" id="e_address" cols="10" rows="4"><?php echo $row['address']; ?></textarea>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-12 text-right">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <input class="btn btn-primary mybtn" type="submit" value="Save">
                                                    </div>
                                                </div>

                                            </div>

                                        </form> <!-- ./Form -->

                                    </div>

                                </div>

                            </div>
                        </div>






                        <!--   Modal for Deleting Users-->
                        <div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <br>
                            <div class="modal-dialog" role="document">
                                <br><br>
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center text-danger" id="exampleModalLabel"><i class="fas fa-trash-alt"></i><span class="text-danger"> Delete This Record</span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <p><b>Are you sure you want to delete this record?</b></p>
                                    </div>

                                    <div class="modal-footer">
                                        <form action="delete_patient.php" method="post" class="myform">
                                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger mybtn"><i class="fas fa-trash-alt"></i> Delete</button>
                                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- Delete Modal -->




                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!--  Modal for adding Patient-->
<div class="modal fade" id="addPatient" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <br><br>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel"><i class="fas fa-user-astronaut"></i><span class="text-primary"> Add New Patient</span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- ./Form -->
                <form action="add_patient.php" method="post" class="myform">

                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group  col-md-4">
                                <label for="firstName">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input class="form-control"
                                           minlength="3"
                                           autocomplete="off"
                                           required="required"
                                           name="firstName"
                                           type="text"
                                           value=""
                                           id="firstName">
                                </div>
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="lastName">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                    <input class="form-control"
                                           minlength="3"
                                           autocomplete="off"
                                           required="required"
                                           name="lastName"
                                           type="text"
                                           id="lastName">
                                </div>
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="ins">Insurance No</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-list"></span>
                                        </div>
                                    </div>
                                    <input class="form-control" name="insurance" autocomplete="off" type="text" id="ins">
                                </div>
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="contact">Contact</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                    </div>
                                    <input class="form-control" name="contact" autocomplete="off" type="text" id="contact">
                                </div>
                            </div>
                            <div class="form-group  col-md-4">
                                <label for="dob">DOB</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text font-weight-bold">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    <input class="form-control" required="required" name="dob" autocomplete="off" type="date" id="dob">
                                </div>
                            </div>

                            <div class="form-group  col-md-4">
                                <label for="sex">Sex</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text font-weight-bold">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    <select name="sex" id="sex" class="form-control" required>
                                        <option value=""></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group  col-md-4">
                                <label for="amount">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                           <b>₵</b>
                                        </div>
                                    </div>
                                    <input type="number" class="form-control" step="0.01" name="amount" id="amount" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group  col-md-12">
                                <label for="address">Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-address-card"></span>
                                        </div>
                                    </div>
                                    <textarea name="address" class="form-control" id="address" cols="10" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-primary mybtn" type="submit" value="Save">
                            </div>
                        </div>

                    </div>

                </form> <!-- ./Form -->



            </div>

        </div>

    </div>
</div>




<!-- OPD number Modal -->
<div class="modal fade" id="opd<?php echo $_SESSION['opdNumber'] ? $_SESSION['opdNumber'] : ''; ?>" tabindex="-1"
     data-backdrop="static"
     data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <br>
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <?php
                if ($_SESSION['opdNumber']) { ?>

                    <table class="table">
                        <tr>
                            <th>OPD No</th>
                            <td><?php echo 'MC' . $_SESSION['opdNumber']['id']; ?></td>
                        </tr>

                        <tr>
                            <th>First Name</th>
                            <td><?php echo $_SESSION['opdNumber']['firstName']; ?></td>
                        </tr>

                        <tr>
                            <th>Last Name</th>
                            <td><?php echo $_SESSION['opdNumber']['lastName']; ?></td>
                        </tr>

                        <tr>
                            <th>Age</th>
                            <?php
                            $yrFromDb = date('Y', strtotime($_SESSION['opdNumber']['dob']));
                            $currYr = date('Y', strtotime(date('Y')));
                            ?>
                            <td><?php echo $currYr - $yrFromDb; ?></td>
                        </tr>

                        <tr>
                            <th>Sex</th>
                            <td><?php echo $_SESSION['opdNumber']['sex']; ?></td>
                        </tr>

                        <tr>
                            <th>Contact</th>
                            <td><?php echo $_SESSION['opdNumber']['contact']; ?></td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td><?php echo $_SESSION['opdNumber']['address']; ?></td>
                        </tr>

                    </table>

               <?php }  ?>


            </div>

        </div>
    </div>
</div> <!-- ./OPD number Modal -->


<?php include "../layouts/footer.php"; ?>
