        <footer class="main-footer">
            <strong>Copyright &copy; 2023.</strong> All rights reserved.
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
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            <?php if ($this->session->flashdata('success')) {?>
                const messages = <?= json_encode($this->session->flashdata('success')) ?>;
                Swal.fire({
                    title: 'Berhasil',
                    text: messages,
                    type: 'success',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false
                });
            <?php } ?>

            <?php if ($this->session->flashdata('failed')) {?>
                const messages = <?= json_encode($this->session->flashdata('failed')) ?>;
                Swal.fire({
                    title: 'Gagal',
                    text: messages,
                    type: 'error',
                    confirmButtonText: 'Tutup',
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false
                });
            <?php } ?>
        });
    </script>
</body>
</html>