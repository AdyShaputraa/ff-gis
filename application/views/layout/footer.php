        <footer class="main-footer">
            Geological Information System <strong>Copyright &copy; 2023.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/leaflet/leaflet.js')?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src='<?= base_url('assets/plugins/moment/min/moment.min.js'); ?>'></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            var url = window.location;
            $('ul.nav-sidebar a').filter(function() {
                if (this.href) {
                    return this.href == url || url.href.indexOf(this.href) == 0;
                }
            }).addClass('active');
            $('ul.nav-treeview a').filter(function() {
                if (this.href) {
                    return this.href == url || url.href.indexOf(this.href) == 0;
                }
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

            <?php if ($this->session->flashdata('success')) {?>
                const messages = <?= json_encode($this->session->flashdata('success')) ?>;
                Swal.fire({
                    title: 'Success',
                    text: messages,
                    type: 'success',
                    confirmButtonText: 'Close',
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false
                });
            <?php } ?>

            <?php if ($this->session->flashdata('failed')) {?>
                const messages = <?= json_encode($this->session->flashdata('failed')) ?>;
                Swal.fire({
                    title: 'Failed',
                    text: messages,
                    type: 'error',
                    confirmButtonText: 'Close',
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false
                });
            <?php } ?>
        });
    </script>
</body>
</html>