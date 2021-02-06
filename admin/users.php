<?php
include "../auth.php";

if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}
include "../dbconnect.php";
$deleted = false;
$users = $db->prepare("SELECT * FROM users WHERE deleted = ?");
$users->execute([$deleted]);
include "../layouts/header.php";
?>

<div class="container">
    <h3 class="text-center"><span class="fas fa-user-friends"></span> <b>USERS</b></h3>
    <div class="row">
        <div class="col">
            <a href="register.php" class="btn btn-info btn-sm mb-2"><span class="fas fa-plus-circle"></span> Add User</a>
            <div class="card shadow p-3">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                            <?php
                        while ($row = $users->fetch()){ ?>
                            <tr>
                                <td><?php echo ucfirst(strtolower($row['firstName'])); ?></td>
                                <td><?php echo ucfirst(strtolower($row['lastName'])); ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php
                                    switch ($row['user_role']){
                                        case 1:
                                            echo "Admin";
                                            break;
                                        case 2:
                                            echo "Doctor";
                                            break;
                                        case 3:
                                            echo "Lab Technician";
                                            break;
                                        case 4:
                                            echo "Receptionist";
                                            break;
                                        default:
                                            echo "Pharmacist";
                                    }
                                    ?></td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?php echo $row['user_id']; ?>">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $row['user_id']; ?>">
                                        <span class="fas fa-trash-alt"></span>

                                    </a>
                                </td>
                            </tr>




                            <!--  Delete Modal -->
                            <div class="modal fade" id="del<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="text-danger"><b>Delete This User</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this user?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="delete_patient.php" method="post" class="myform">
                                                <input type="hidden" name="patient_id" value="<?php echo $row['user_id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger mybtn"><i class="fas fa-trash-alt"></i> Delete</button>
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./Delete Modal -->


                                   <!--  Edit Modal -->
                            <div class="modal fade" id="edit<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <br>
                                <div class="modal-dialog" role="document">
                                    <br><br>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5><b>Modify This User</b></h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this user?</p>
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- ./edit Modal -->


                       <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include "../layouts/footer.php"; ?>