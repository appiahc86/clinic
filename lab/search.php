<?php
if (!isset($_SESSION)){
    session_start();
}

     require_once '../dbconnect.php';

     $search = strtolower($_GET['patient_id']);
     $search = str_replace(" ", "", $search);
     $search = str_replace("mc", "", $search);
     $date = date('y-m-d');
     $empty_string = "";

     $query = $db->prepare(
         "SELECT patients.patient_id, patients.firstName, 
    patients.lastName, treatments.treatment_id, treatments.test, treatments.test_results FROM treatments 
    INNER JOIN patients ON treatments.patient_id = patients.patient_id WHERE treatments.patient_id = ? AND treatments.date = ? 
    AND treatments.test <> ?  LIMIT 1 ");

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

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>OPD No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Test</th>
                        <th>Test Results</th>
                    </tr>

                    <tr>
                        <td>MC<?php echo $res['patient_id']; ?></td>
                        <td><?php echo $res['firstName']; ?></td>
                        <td><?php echo $res['lastName']; ?></td>
                        <td><a href="" title="View Details" data-toggle="modal" data-target="#testModal">
                            <?php echo mb_strimwidth($res['test'], 0, 35, '...') ?>
                            </a>
                        </td>
                        <td><?php echo mb_strimwidth($res['test_results'], 0, 35, '...') ?> </td>
                    </tr>
                </table>
            </div>


        </div>
    </div>


    <!--  Results Form  -->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="add_test_results.php" method="post" class="myform">
                <input type="hidden" name="patient_id" value="<?php echo $res['patient_id']; ?>">
                <input type="hidden" name="treatment_id" value="<?php echo $res['treatment_id'] ?>">
                <div class="form-group">
                    <label for="results">Test Results</label>
                    <textarea name="result"
                              id="results"
                              cols="10"
                              class="form-control"
                              spellcheck="false"
                              rows="10"><?php echo $res['test_results']; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-block btn-primary mybtn">
                        <?php echo trim($res['test_results']) == "" ? "ADD" : "UPDATE"; ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>



<!--  Test Modal -->
<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
            </div>

            <div class="modal-body">

                <textarea name="" id="" cols="30" rows="12" class="form-control" disabled><?php echo $res['test']; ?></textarea>

            </div>

        </div>
    </div>
</div> <!-- ./Test Modal -->


<?php include '../layouts/footer.php'; ?>
