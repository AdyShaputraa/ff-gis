<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url('Auth') ?>" class="h5">
                    <h5><b>Geological Information System</b></h5>
                </a>
                <h6>Flora & Fauna</h6>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk untuk memulai sesi anda</p>

                <form action="<?= base_url('Auth/signIn') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer with-border"></div>
        </div>
    </div>
    <script src="vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
    <script src="<?= base_url('assets/plugins/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
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
