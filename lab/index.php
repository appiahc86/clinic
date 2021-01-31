<?php include '../layouts/header.php'; ?>

    <!-- Search -->
    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-md-3">
                <form action="" class="myform">
                    <div class="input-group">
                        <input type="search" class="form-control" required name="search" placeholder="OPD No" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary mybtn"><span class="fas fa-search"></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!-- Record -->
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
                            <td>MC23</td>
                            <td>Stella</td>
                            <td>Wood</td>
                            <td>Malaria Test</td>
                            <td></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>


        <!--  Results Form  -->
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="" class="myform">
                    <div class="form-group">
                        <label for="results">Test Results</label>
                        <textarea name="results" id="results" cols="30" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary mybtn">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





<?php include '../layouts/footer.php'; ?>