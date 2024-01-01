<?php $this->load->view('./layout/header.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Taxonomy Flora Domain</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">Master Data</li>
                            <li class="breadcrumb-item">Taxonomy</li>
                            <li class="breadcrumb-item">Flora</li>
                            <li class="breadcrumb-item active">Domain</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-create-domain" title="Create">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped display table-domain" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UUID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>

        <div class="modal fade modal-create-domain">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Add Flora Domain</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Taxonomy/createFloraDomain') ?>" method="post" class="formCreateDomain">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control create-name-domain" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade modal-update-domain">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Update Flora Domain</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Taxonomy/updateFloraDomain') ?>" method="post" class="formUpdateDomain">
                        <div class="modal-body">
                            <input type="hidden" name="uuid" class="update-uuid-domain" readonly>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control update-name-domain" placeholder="Enter Name" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('layout/footer.php'); ?>
<script>
    $(document).ready(function() {
        var table = $('.table-domain').DataTable({
            processing      : true,
            serverSide      : true,
            scrollX         : true,
            scrollCollapse  : true,
            paging          : true,
            info            : true,
            "ordering"      : false,
            "ajax"          : {
                "url": "<?= base_url('Taxonomy/readFloraDomain'); ?>",
                "type": "POST"
            },
            "columns": [
                { "data" : "no", "sClass": "text-center" },
                { "data" : 'uuid', "visible": false },
                { "data" : "name", "sClass": "text-center" },
                { 
                    "data"    : null,
                    "sClass": "text-center",
                    render : function (data, type, row) {
                        return "<a href='#' class='btn-edit-domain' title='Update Data'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete-domain' title='Delete Data'><i class='fas fa-trash'></i></a>";
                    }
                }
            ],
        });

        $('.btn-create-domain').on('click', function(e) {
            e.preventDefault();
            $('.modal-create-domain').modal('show');
        });

        $('.formCreateDomain').submit(function (e) {
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to add this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        dataType: 'JSON',
                        data: $(form).serialize(),
                        success : function(response) {
                            if (response.code == 201) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        form.reset();
                                        $('.modal-create-domain').modal('hide');
                                        table.ajax.reload(null, false);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Failed',
                                    text: response.message,
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                });
                            }
                        },
                        error : function(error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Internal Server Error',
                                type: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });
                        }
                    });
                }  
            });
        });

        table.on('click', '.btn-edit-domain', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-update-domain').modal('show');
            $('.update-uuid-domain').val(data[0].uuid);
            $('.update-name-domain').val(data[0].name);
        });

        $('.formUpdateDomain').submit(function (e) {
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to update this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        dataType: 'JSON',
                        data: $(form).serialize(),
                        success : function(response) {
                            if (response.code == 200) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        form.reset();
                                        $('.modal-update-domain').modal('hide');
                                        table.ajax.reload(null, false);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Failed',
                                    text: response.message,
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                });
                            }
                        },
                        error : function(error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Internal Server Error',
                                type: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });
                        }
                    });
                }  
            });
        });

        table.on('click', '.btn-delete-domain', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            var uuid = data[0].uuid;
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to delete this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('Taxonomy/deleteFloraDomain'); ?>",
                        type: 'POST',
                        dataType: 'JSON',
                        data : {'uuid' : uuid },
                        success : function(response) {
                            if (response.code == 200) {
                                Swal.fire({
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        table.ajax.reload(null, false);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Failed',
                                    text: response.message,
                                    type: 'error',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                });
                            }
                        },
                        error : function(error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Internal Server Error',
                                type: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'OK',
                                allowOutsideClick: false
                            });
                        }
                    });
                }  
            })
        });
    });
</script>