<?php
include "../auth.php";
if ($_SESSION['role'] != 5){
    header("location: ../home/index.php");
}

     require_once '../dbconnect.php';

     $search = strtolower($_GET['patient_id']);
     $search = str_replace(" ", "", $search);
     $search = str_replace("mc", "", $search);
     $date = date('y-m-d');
     $empty_string = "";

     $query = $db->prepare(
         "SELECT patients.patient_id, patients.firstName, 
    patients.lastName, treatments.treatment_id, treatments.prescription, treatments.medicine_fee FROM treatments 
    INNER JOIN patients ON treatments.patient_id = patients.patient_id WHERE treatments.patient_id = ? AND treatments.date = ? 
    AND treatments.prescription <> ?  LIMIT 1 ");

     $query->execute([$search, $date, $empty_string]);
     $res = $query->fetch();

     if ($res == ""){
         $_SESSION['error_msg'] = "Sorry, no record found";
         header("Location: index.php");
         exit();
     }

?>



<?php include '../layouts/header.php'; ?>

<!-- Record -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col">

            <div class="card shadow p-3">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>OPD No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Prescription</th>
                            <th>Price</th>
                        </tr>
                        </thead>


                        <tr>
                            <td>MC<?php echo $res['patient_id']; ?></td>
                            <td><?php echo $res['firstName']; ?></td>
                            <td><?php echo $res['lastName']; ?></td>
                            <td><a href="" title="View Details" data-toggle="modal" data-target="#prescription">
                                    <?php echo mb_strimwidth($res['prescription'], 0, 35, '...') ?>
                                </a>
                            </td>
                            <td><?php echo number_format($res['medicine_fee'], 2); ?></td>
                        </tr>
                    </table>
                </div>
            </div>



        </div>
    </div>


    <!--  Results Form  -->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="add_amount.php" method="post" class="myform">
                <input type="hidden" name="patient_id" value="<?php echo $res['patient_id']; ?>">
                <input type="hidden" name="treatment_id" value="<?php echo $res['treatment_id'] ?>">
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="fee" class="form-control"
                           step="0.01" placeholder="Enter Amount" min="0"
                           value="<?php echo $res['medicine_fee'] ?>" autocomplete="off">
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-block btn-primary mybtn">
                        <?php echo trim($res['medicine_fee']) == 0 ? "Save" : "UPDATE"; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--  Test Modal -->
<div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <h5><b>Prescription</b></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>

            <div class="modal-body">
                <textarea name="" id="" cols="30" rows="12" class="form-control" disabled><?php echo $res['prescription']; ?></textarea>
            </div>

        </div>
    </div>
</div> <!-- ./Test Modal -->


<?php include '../layouts/footer.php'; ?>
