<?php $this->load->view('layout/header.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Flora & Fauna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Flora & Fauna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Flora & Fauna Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-create" title="Tambah">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped display table-flora-fauna" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UUID</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>

        <div class="modal fade modal-create">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Tambah Flora & Fauna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('FloraFauna/create') ?>" method="post" class="formCreate" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control create-type select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Pilih Salah Satu</option>
                                    <option value="Flora">Flora</option>
                                    <option value="Fauna">Fauna</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control create-name" placeholder="Masukan Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control create-description" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control create-latitude" placeholder="Masukan latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" class="form-control create-longitude" placeholder="Masukan longitude" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="file" name="icon" class="form-control create-icon" accept=".ico" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control create-image" accept="image/png, image/jpg, image/jpeg" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade modal-update">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Ubah Flora & Fauna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('FloraFauna/update') ?>" method="post" class="formUpdate" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="uuid" class="update-uuid">
                            <div class="form-group">
                                <label>Type</label>
                                <select name="type" class="form-control update-type select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Pilih Salah Satu</option>
                                    <option value="Flora">Flora</option>
                                    <option value="Fauna">Fauna</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control update-name" placeholder="Masukan Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control update-description" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control update-latitude" placeholder="Masukan latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input type="text" name="longitude" class="form-control update-longitude" placeholder="Masukan longitude" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Icon</label><small style="color: red"> biarkan kosong jika tidak akan dirubah</small>
                                <input type="file" name="icon" class="form-control update-icon" accept=".ico">
                            </div>
                            <div class="form-group">
                                <label>Image</label><small style="color: red"> biarkan kosong jika tidak akan dirubah</small>
                                <input type="file" name="image" class="form-control update-image" accept="image/png, image/jpg, image/jpeg">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('layout/footer.php'); ?>
<script>
    $(document).ready(function() {
        var table = $('.table-flora-fauna').DataTable({
            processing      : true,
            serverSide      : true,
            paging          : true,
            info            : true,
            scrollX         : true,
            scrollCollapse  : true,
            "ordering"      : false,
            "ajax"          : {
                "url": "<?= base_url('FloraFauna/read'); ?>",
                "type": "POST"
            },
            "columns": [
                { "data" : "no", "sClass": "text-center" },
                { "data" : 'uuid', "visible": false },
                { "data" : "type", "sClass": "text-center" },
                { "data" : "name", "sClass": "text-center" },
                { "data" : "description", "sClass": "text-center" },
                { "data" : "latitude", "sClass": "text-center" },
                { "data" : "longitude", "sClass": "text-center" },
                {
                    "sClass": "text-center",
                    render : function (data, type, row) {
                        return '<img src="' + row.icon + '" style="border-radius: 50%; width: 100px; height: 100px;" target="_blank">';
                    }
                },
                {
                    "sClass": "text-center",
                    render : function (data, type, row) {
                        return '<img src="' + row.image + '"style="border-radius: 10%; width: 100px; height: 100px;"  target="_blank">';
                    }
                },
                { 
                    "data"    : null,
                    "sClass": "text-center",
                    render : function (data, type, row) {
                        return "<a href='#' class='btn-edit' title='Edit Flora & Fauna'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete' title='Delete Flora & Fauna'><i class='fas fa-trash'></i></a>";
                    }
                }
            ],
        });

        $('.btn-create').on('click', function(e) {
            e.preventDefault();
            $('.modal-create').modal('show');
        });

        $('.formCreate').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Tunggu',
                text: 'Apakah data sudah sesuai ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: form,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success : function(response) {
                            if (response.code == 201) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formCreate')[0].reset();
                                        $('.create-type').val('').trigger('change');
                                        $('.modal-create').modal('hide');
                                        table.ajax.reload(null, false);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
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
                                title: 'Gagal',
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

        table.on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-update').modal('show');
            $('.update-uuid').val(data[0].uuid);
            $('.update-type').val(data[0].type).trigger('change');
            $('.update-name').val(data[0].name);
            $('.update-description').val(data[0].description);
            $('.update-latitude').val(data[0].latitude);
            $('.update-longitude').val(data[0].longitude);
        });

        $('.formUpdate').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Tunggu',
                text: 'Apakah data sudah sesuai ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: $(this).attr('action'),
                        type: $(this).attr('method'),
                        data: form,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success : function(response) {
                            if (response.code == 200) {
                                Swal.fire({
                                    title: 'Berhasil',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formUpdate')[0].reset();
                                        $('.update-type').val('').trigger('change');
                                        $('.modal-update').modal('hide');
                                        table.ajax.reload(null, false);
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal',
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
                                title: 'Gagal',
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

        table.on('click', '.btn-delete', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            var uuid = data[0].uuid;
            Swal.fire({
                title: 'Tunggu',
                text: 'Apakah anda yakin ingin menghapus data ini ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('FloraFauna/delete'); ?>",
                        type: 'POST',
                        dataType: 'JSON',
                        data : {'uuid' : uuid },
                        success : function(response) {
                            if (response.code == 200) {
                                Swal.fire({
                                    title: 'Berhasil',
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
                                    title: 'Gagal',
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
                                title: 'Gagal',
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