<?php
include "../auth.php";

if ($_SESSION['role'] != 1){
    header("location: ../home/index.php");
}
include "../dbconnect.php";
$query = $db->prepare("SELECT * FROM settings LIMIT 1");
$query->execute();
$res = $query->fetch();

include "../layouts/header.php";
?>
    <h2 class="text-center font-weight-bold">App Settings</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow p-3">
                        <form action="update_consultation.php" method="post" class="myform">
                            <div class="form-group">
                                <label for=""><b>Consultation Fee</b></label>
                                <input type="number" id="" min="0" class="form-control" value="<?php echo $res['consultation_fee']; ?>"
                                       step="0.01" required name="consultation_fee">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update"
                                       class="btn btn-primary mybtn btn-block">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card shadow p-3">
                        <form action="update_cardfee.php" method="post" class="myform">
                            <div class="form-group">
                                <label for=""><b>Card Fee</b></label>
                                <input type="number" id="" min="0" class="form-control" value="<?php echo $res['card_fee']; ?>"
                                       step="0.01" required name="card_fee">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update"
                                       class="btn btn-primary mybtn btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

















<?php include "../layouts/footer.php"; ?>