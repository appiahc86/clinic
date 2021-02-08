<?php
include "../auth.php";
if ($_SESSION['role'] != 4){
    header("location: ../home/index.php");
}

include('../dbconnect.php');
$date = date('y-m-d');

$query = $db->prepare("SELECT patients.patient_id, patients.firstName, patients.lastName,
 treatments.treatment_id, treatments.user_id FROM treatments INNER JOIN patients ON treatments.patient_id = patients.patient_id 
 WHERE treatments.date = ?");
$query->execute([$date]);


include "../layouts/header.php";
?>


<h3 class="text-center"><b>Today's Visitors</b></h3>

<div class="container mb-5">
    <div class="row">
        <div class="col">
            <div class="card shadow p-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-sm" id="dataTable" width="100%" cellspacing="0">

                        <thead class="thead-dark">
                        <tr>
                            <th>OPD No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        while ($row = $query->fetch()){ ?>
                            <tr>
                                <td>MC<?php echo $row['patient_id'];?></td>
                                <td><?php echo $row['firstName'];?></td>
                                <td><?php echo $row['lastName'];?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#del<?php echo $row['treatment_id']; ?>">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>

                            <!--   Delete Modal-->
                            <div class="modal fade" id="del<?php echo $row['treatment_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center text-danger" id="exampleModalLabel"><i class="fas fa-trash-alt"></i><span class="text-danger"> Delete This Record</span></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p><b>Are you sure you want to delete this record?</b></p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="delete_treatment.php" method="post" class="myform">
                                                <input type="hidden" name="treatment_id" value="<?php echo $row['treatment_id']; ?>">
                                                <input type="hidden" name="doctor_id" value="<?php echo $row['user_id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger mybtn"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- Delete Modal -->

                        <?php } ?>


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../layouts/footer.php"; ?>