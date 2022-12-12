<footer class="footer text-center text-sm-left">
                    &copy; <?= date('Y'); ?> 911 Video Call
                </footer>
                <!--end footer-->

            </div>
            <!-- container -->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->



    <!-- jQuery  -->
   
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/waves.js"></script>
    <script src="<?= base_url(); ?>/assets/js/feather.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/metismenu.min.js"></script>

    <!-- <script src="<?= base_url(); ?>/plugins/apexcharts/apexcharts.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/assets/pages/jquery.helpdesk-dashboard.init.js"></script> -->


    <!-- Required datatable js -->
    <script src="<?= base_url(); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="<?= base_url(); ?>/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/jszip.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="<?= base_url(); ?>/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>/assets/pages/jquery.datatable.init.js"></script>

    <!-- App js -->
    <script src="<?= base_url(); ?>/assets/js/app.js"></script>
    <script>
        // (function() {

        //     const idleDurationSecs = 60;    // X number of seconds
        //     const redirectUrl = '/console/logout';  // Redirect idle users to this URL
        //     let idleTimeout; // variable to hold the timeout, do not modify

        //     const resetIdleTimeout = function() {

        //         // Clears the existing timeout
        //         if(idleTimeout) clearTimeout(idleTimeout);

        //         // Set a new idle timeout to load the redirectUrl after idleDurationSecs
        //         idleTimeout = setTimeout(() => location.href = redirectUrl, idleDurationSecs * 1000);
        //     };

        //     // Init on page load
        //     resetIdleTimeout();

        //     // Reset the idle timeout on any of the events listed below
        //     ['click', 'touchstart', 'mousemove'].forEach(evt => 
        //         document.addEventListener(evt, resetIdleTimeout, false)
        //     );

        // })();
    </script>

</body>

</html>