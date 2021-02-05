<?php include '../layouts/header.php'; ?>

    <!-- Search -->
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-4">
                <form action="search.php" method="get" class="myform">
                    <div class="input-group">
                        <input type="search" class="form-control" required name="patient_id" placeholder="OPD No" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <button type="submit" name="search_button" class="btn btn-primary mybtn"><span class="fas fa-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include '../layouts/footer.php'; ?>