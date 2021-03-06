
</div>
<!-- End of Main Content -->

<!-- Footer -->
<!--<footer class="sticky-footer bg-white shadow-lg" style="padding: 15px !important;">-->
<!--    <div class="container my-auto">-->
<!--        <div class="copyright text-center my-auto" style="font-size: 1em;">-->
<!--            <span>Copyright &copy; <b>MULTI-CLINIC</b> --><?php //echo date('Y'); ?><!--</span>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<!--<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>-->
<!--                <button class="close" type="button" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true">×</span>-->
<!--                </button>-->
<!--            </div>-->
<!--            <div class="modal-body">Are you sure you want to logout? </div>-->
<!--            <div class="modal-footer">-->
<!--                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>-->
<!--                <a class="btn btn-primary" href="">Logout</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Bootstrap core JavaScript-->
<script src="../public/vendor/jquery/jquery.min.js"></script>
<script src="../public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../public/js/sb-admin-2.min.js"></script>

<script src="../public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../public/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../public/js/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<script src="../public/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<!--<script src="../public/js/demo/chart-area-demo.js"></script>-->
<!--<script src="../public/js/demo/chart-pie-demo.js"></script>-->

<!--Toastr-->
<script src="../public/js/toastr.js"></script>


<script>
    window.onload = function () {


        const forms = document.querySelectorAll(".myform");
        const btns = document.querySelectorAll(".mybtn");

        for (const form of forms) {
            form.onsubmit = function () {
                for (const btn of btns) {
                    btn.disabled = true;
                    btn.value = "please Wait...";
                }
            }
        }

        //success messages
        <?php
            if (!empty($_SESSION['success_msg'])){ ?>

        toastr.success('<?php echo $_SESSION['success_msg']; ?>'); //Success messages

           <?php
                 unset($_SESSION['success_msg']);
            } ?>

         // Error messages
        <?php
        if (!empty($_SESSION['error_msg'])){ ?>

        toastr.error('<?php echo $_SESSION['error_msg']; ?>'); //Success messages

        <?php
        unset($_SESSION['error_msg']);
        } ?>


        //display new opd Info
        <?php   if (!empty($_SESSION['opdNumber'])){  ?>
        $('#opdNumber').click();
       <?php  unset($_SESSION['opdNumber']); } ?>

        //Clock
        const clock = document.querySelector("#clock");
        setInterval(function (){
            clock.innerHTML = new Date().toLocaleTimeString();
        }, 10)

    }

</script>
</body>

</html>
