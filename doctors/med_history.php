<?php
include "../auth.php";
if ($_SESSION['role'] != 2){
    header("location: ../home/index.php");
}
include('../dbconnect.php');
function Age($dob){
    $yrFromDatabase = date('Y', strtotime($dob));
    $currentYr = date('Y', strtotime(date('Y')));
    return  $currentYr - $yrFromDatabase;
}

$patient_id = $_GET['patient_id'];
$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$dob = $_GET['dob'];
$query = $db->prepare("SELECT * FROM treatments WHERE patient_id = ? ORDER BY treatment_id DESC ");
$query->execute([$patient_id]);
?>

<?php include "../layouts/header.php"; ?>


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>OPD No: </b> MC<?php echo $patient_id; ?></h4>
            <h4>
                <b class="text-info">First Name:</b> <?php echo $firstName; ?> &nbsp; &nbsp;
                <b class="text-success">Last Name:</b> <?php echo $lastName; ?> &nbsp; &nbsp;
                <b class="text-danger">Age:</b> <?php echo Age($dob); ?> &nbsp; &nbsp;
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow p-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm table-striped" id="dataTable">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Diagnosis</th>
                            <th>Lab Test</th>
                            <th>Test Results</th>
                            <th>Prescription</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $num = 1; ?>
                        <?php for ($i = 0; $row = $query->fetch(); $i++){ ?>

                            <tr>
                                <td><?php echo $num; ?></td>
                                <?php //changing date format
                                $date_from_db = $row['date'];
                                $timestamp = strtotime($date_from_db);
                                $newdate = date("d-M-Y", $timestamp);
                                ?>
                                <td><?php echo $newdate; ?></td>
                                <td><a href="" title="View Details" data-toggle="modal" data-target="#diagnosis<?php echo $row['treatment_id']; ?>">
                                        <?php echo mb_strimwidth($row['diagnosis'], 0, 20, '...') ?>
                                    </a></td>
                                <td><a href="" title="View Details" data-toggle="modal" data-target="#test<?php echo $row['treatment_id']; ?>">
                                        <?php echo mb_strimwidth($row['test'], 0, 20, '...') ?>
                                    </a></td>
                                <td><a href="" title="View Details" data-toggle="modal" data-target="#testResults<?php echo $row['treatment_id']; ?>">
                                        <?php echo mb_strimwidth($row['test_results'], 0, 20, '...') ?>
                                    </a></td>
                                <td><a href="" title="View Details" data-toggle="modal" data-target="#prescription<?php echo $row['treatment_id']; ?>">
                                        <?php echo mb_strimwidth($row['prescription'], 0, 20, '...') ?>
                                    </a></td>
                            </tr>

                            <!--  Diagnosis Modal -->
                            <div class="modal fade" id="diagnosis<?php echo $row['treatment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6><b>Diagnosis</b></h6>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <textarea name="" id="" spellcheck="false" cols="30" rows="12" class="form-control" disabled><?php echo $row['diagnosis']; ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./Diagnosis Modal -->

                           <!-- ./Test Modal -->                                                                                                                                                                                         <!--  Test Results Modal -->
                            <div class="modal fade" id="test<?php echo $row['treatment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6><b>Lat Test</b></h6>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <textarea name="" id="" spellcheck="false" cols="30" rows="12" class="form-control" disabled><?php echo $row['test']; ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./Test Modal -->


                            <!--  Test Results Modal -->
                            <div class="modal fade" id="testResults<?php echo $row['treatment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6><b>Test Results</b></h6>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <textarea name="" id="" spellcheck="false" cols="30" rows="12" class="form-control" disabled><?php echo $row['test_results']; ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./Test Results Modal -->


                              <!-- Prescriptipn Modal -->                                                                                                                                                                                                                  <!--  Test Results Modal -->
                            <div class="modal fade" id="prescription<?php echo $row['treatment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6><b>Prescription</b></h6>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <textarea name="" id="" spellcheck="false" cols="30" rows="12" class="form-control" disabled><?php echo $row['prescription']; ?></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./Prescriptipn Modal -->

                        <?php $num++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
















<?php include "../layouts/footer.php"; ?>