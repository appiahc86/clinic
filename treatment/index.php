<?php include '../layouts/header.php'; ?>

<h3 class="text-center">Treatment Center</h3>

<div class="container">
    <div class="row justify-content-end">
        <div class="col-md-4">
            <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#pharmacy"><span class="fas fa-capsules"></span> Pharmacy</a>
            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#lab"><span class="fas fa-cut"></span> Lab</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="treat.php " method="post" class="myform">
                <div class="form-group">
                    <label for=""><b>Treatment</b></label>
                    <textarea class="form-control" name="treat" id="" cols="30" rows="5" required></textarea>

                </div>

                <div class="form-group">
                    <input class="btn btn-primary btn-sm mybtn p-2" style="width: 100px" type="submit" value="Save">
                </div>

            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="pharmacy" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">


                <form action="presc.php" method="post" class="myform">
                    <div class="form-group">
                        <label for=""><b>Prescription</b></label>
                        <textarea name="prescription" id="" cols="30" rows="4" class="form-control" required></textarea>

                    </div>

                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary btn-sm mybtn" type="submit" value="Save">
                    </div>
                </form> <!-- ./Form -->

            </div>

            </div>
        </div>
    </div>


<!--Lab Modal-->
<div class="modal fade" id="lab" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" aria-hidden="true">
    <br><br>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="labtype.php" method="post" class="myform">           

   
                    <div class="form-group">
                 <label for=""><b>Test</b></label>
              <textarea name="lab_type" id="" cols="30" rows="4" class="form-control" required></textarea>

                    </div>

                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary btn-sm mybtn" type="submit" value="Save">
                    </div>
                </form> <!-- ./Form -->

            </div>
        </div>
    </div>
</div>

<?php include '../layouts/footer.php'; ?>
