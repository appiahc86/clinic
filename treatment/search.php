<?php
if (!isset($_SESSION)){
    session_start();
}

function Age($dob){
    $yrFromDatabase = date('Y', strtotime($dob));
    $currentYr = date('Y', strtotime(date('Y')));
    return  $currentYr - $yrFromDatabase;
}

require_once '../dbconnect.php';

$search = strtolower($_GET['patient_id']);
$search = str_replace(" ", "", $search);
$search = str_replace("mc", "", $search);
$date = date('y-m-d');


$query = $db->prepare(
    "SELECT patients.patient_id, patients.firstName, 
    patients.lastName, patients.dob, treatments.treatment_id, treatments.diagnosis, treatments.prescription,
    treatments.test, treatments.test_results FROM treatments 
    INNER JOIN patients ON treatments.patient_id = patients.patient_id WHERE treatments.patient_id = ? AND treatments.date = ? 
     LIMIT 1 ");

$query->execute([$search, $date]);
$res = $query->fetch();


if ($res == ""){
    $_SESSION['error_msg'] = "Sorry, no record found";
    header("Location: index.php");
    exit();
}

?>


<?php include '../layouts/header.php'; ?>

<h3 class="text-center">Treatment Center</h3>

<div class="container-fluid mb-2">
    <div class="row">
        <div class="col">
            <div class="card shadow p-3">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>OPD No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Diagnosis</th>
                            <th>Lab</th>
                            <th>Test Results</th>
                            <th>Prescription</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>MC<?php echo $res['patient_id']; ?></td>
                            <td><?php echo $res['firstName']; ?></td>
                            <td><?php echo $res['lastName']; ?></td>
                            <td><?php echo Age($res['dob']); ?></td>
                            <td><?php echo mb_strimwidth($res['diagnosis'], 0, 20, '...') ?></td>
                            <td><a href="" title="View Details" data-toggle="modal" data-target="#lab">
                                    <?php echo mb_strimwidth($res['test'], 0, 20, '...') ?>
                                </a></td>
                            <td><a href="" title="View Details" data-toggle="modal" data-target="#testResultsModal">
                                    <?php echo mb_strimwidth($res['test_results'], 0, 20, '...') ?>
                                </a></td>
                            <td><a href="" title="View Details" data-toggle="modal" data-target="#pharmacy">
                                    <?php echo mb_strimwidth($res['prescription'], 0, 20, '...') ?>
                                </a></td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-4">
            <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#pharmacy"><span class="fas fa-capsules"></span> Pharmacy</a>
            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#lab"><span class="fas fa-cut"></span> Lab</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5">

            <form action="add_diagnosis.php" method="post" class="myform">
                <input type="hidden" name="patient_id" value="<?php echo $res['patient_id']; ?>">
                <input type="hidden" name="treatment_id" value="<?php echo $res['treatment_id']; ?>">
                <div class="form-group">
                    <label for=""><b>Diagnosis</b></label>
                    <textarea class="form-control" spellcheck="false" name="diagnosis" id="" cols="30" rows="8"><?php echo $res['diagnosis']; ?></textarea>

                </div>

                <div class="form-group">
                    <input class="btn btn-primary btn-block mybtn p-2"
                           type="submit" value="<?php echo $res['diagnosis'] == '' ? 'Save' : 'Update' ; ?>">
                </div>

            </form>
        </div>
    </div>
</div>





<!--Lab Modal-->
<div class="modal fade" id="lab" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="font-weight-bold">Lab Test</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">

                <form action="add_test.php" method="post" class="myform">
                    <input type="hidden" name="patient_id" value="<?php echo $res['patient_id']; ?>">
                    <input type="hidden" name="treatment_id" value="<?php echo $res['treatment_id']; ?>">

               <div class="form-group">
                 <textarea name="test" id="" spellcheck="false" cols="30" rows="10" class="form-control"><?php echo $res['test']; ?></textarea>
               </div>

                 <input class="btn btn-primary mybtn btn-block"
                        type="submit" value="<?php echo $res['test'] == '' ? 'Save' : 'Update' ?>">

                </form> <!-- ./Form -->

            </div>
        </div>
    </div>
</div> <!-- Lab Modal-->


<!--  Test Results Modal -->
<div class="modal fade" id="testResultsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <textarea name="" id="" spellcheck="false" cols="30" rows="12" class="form-control" disabled><?php echo $res['test_results']; ?></textarea>
            </div>

        </div>
    </div>
</div> <!-- ./Test Results Modal -->


<!-- Prescription Modal-->
<div class="modal fade" id="pharmacy" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6><b>Prescription</b></h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="add_prescription.php" method="post" class="myform">
                    <input type="hidden" name="patient_id" value="<?php echo $res['patient_id']; ?>">
                    <input type="hidden" name="treatment_id" value="<?php echo $res['treatment_id']; ?>">
                    <div class="form-group">
                        <textarea name="prescription" id=""
                                  cols="30" rows="8"
                                  spellcheck="false"
                                  class="form-control" ><?php echo $res['prescription']; ?></textarea>
                    </div>

                        <input class="btn btn-primary btn-block mybtn" type="submit"
                               value="<?php echo trim($res['prescription']) == '' ? 'Save' : 'Update' ?>">

                </form> <!-- ./Form -->

            </div>

        </div>
    </div>
</div> <!-- ./Prescription Modal-->
<?php include '../layouts/footer.php'; ?>
