<?php
include "../auth.php";
if ($_SESSION['role'] != 2){
    header("location: ../home/index.php");
}

function Age($dob){
    $yrFromDatabase = date('Y', strtotime($dob));
    $currentYr = date('Y', strtotime(date('Y')));
    return  $currentYr - $yrFromDatabase;
}
?>

<?php include "../layouts/header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid mb-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><b>PATIENTS</b></h1>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm table-striped" id="dataTable">
                            <thead class="thead-dark">
                            <tr>
                                <th>OPD No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Sex</th>
                                <th>Details</th>
                                <th>Med.History</th>
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
                                <td>MC<?php echo $row['patient_id']; ?></td>
                                <td><?php echo $row['firstName']; ?></td>
                                <td><?php echo $row['lastName']; ?></td>
                                <td><?php echo ucfirst($row['sex']); ?></td>
                                <td style="width: 50px;" class="text-center">
                                    <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewDetails<?php echo $row['patient_id']; ?>">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </td>
                                <td style="width: 50px;" class="text-center">
                                    <a href="med_history.php?patient_id=<?php echo $row['patient_id']; ?>&firstName=<?php echo $row['firstName']; ?>&lastName=<?php echo $row['lastName']; ?>&dob=<?php echo $row['dob']; ?>"
                                       class="btn btn-sm btn-primary">
                                        <span class="fas fa-eye"></span>
                                    </a>
                                </td>


                                <!-- View Details Modal -->
                                <div class="modal fade" id="viewDetails<?php echo $row['patient_id']; ?>" tabindex="-1"
                                     data-backdrop="static"
                                     data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <br>
                                    <div class="modal-dialog" role="document">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">




                                                <div>
                                                    <h6><b>OPD No: </b> <span class="text-danger" style="float: right;"><b><?php echo 'MC' . $row['patient_id']; ?></b></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6><b>First Name:</b> <span style="float: right;"><?php echo $row['firstName']; ?></span></h6>
                                                </div>
                                                <hr>


                                                <div>
                                                    <h6><b>Last Name:</b> <span style="float: right;"><?php echo $row['lastName']; ?></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6><b>Age:</b> <span style="float: right;"><?php echo Age($row['dob']); ?></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6><b>Sex:</b> <span style="float: right;"><?php echo ucfirst($row['sex']); ?></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6><b>Insurance No:</b> <span style="float: right;"><?php echo $row['insurance']; ?></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6><b>Contact:</b> <span style="float: right;"><?php echo $row['contact']; ?></span></h6>
                                                </div>
                                                <hr>

                                                <div>
                                                    <h6 class="text-center"><b>Address</b></h6>
                                                    <textarea disabled class="form-control" id="" cols="30" rows="5"><?php echo $row['address']; ?></textarea>
                                                </div>
                                                <hr>


                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- ./View Details Modal -->


                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

<?php include "../layouts/footer.php"; ?>
