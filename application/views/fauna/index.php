<?php $this->load->view('layout/header.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fauna</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item">Master Data</li>
                            <li class="breadcrumb-item active">Fauna</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Fauna Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-create" title="Create">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped display nowrap table-fauna" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>UUID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Description</th>
                                <th>Description Detail</th>
                                <th>Conservation Type</th>
                                <th>Conservation At</th>
                                <th>Conservation Date</th>
                                <th>Population</th>
                                <th>IUCN Status</th>
                                <th>Location</th>
                                <th>Latitude</th>
                                <th>Longtitude</th>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Add Fauna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/create') ?>" method="post" class="formCreate" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control create-name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <select name="class" class="form-control create-class select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                    <option value="Porifera">Porifera</option>
                                    <option value="Coelentera">Coelentera</option>
                                    <option value="Platyhelminthes">Platyhelminthes</option>
                                    <option value="Nemathelminthes">Nemathelminthes</option>
                                    <option value="Annelida">Annelida</option>
                                    <option value="Mollusca">Mollusca</option>
                                    <option value="Pisces">Pisces</option>
                                    <option value="Amphibia">Amphibia</option>
                                    <option value="Reptilia">Reptilia</option>
                                    <option value="Aves">Aves</option>
                                    <option value="Mamalia">Mamalia</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control create-description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Description Detail</label>
                                        <textarea name="description_detail" class="form-control create-description-detail" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation Type</label>
                                        <input type="text" name="conservation_type" class="form-control create-conservation-type" placeholder="Enter Conservation Type">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation At</label>
                                        <input type="text" name="conservation_at" class="form-control create-conservation-at" placeholder="Enter Conservation At">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation Date</label>
                                        <input type="date" name="conservation_date" class="form-control create-conservation-date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>IUCN Status</label>
                                <select name="status_iucn" class="form-control create-status-iucn select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                    <option value="Dilindungi">Dilindungi</option>
                                    <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                    <option value="Least Concern">Least Concern</option>
                                    <option value="Near Threatned">Near Threatned</option>
                                    <option value="Vulnerable">Vulnerable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control create-location" placeholder="Enter Population">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control create-latitude" placeholder="Enter latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input type="text" name="longtitude" class="form-control create-longtitude" placeholder="Enter longtitude" required>
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
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="modal fade modal-update">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Update Fauna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/update') ?>" method="post" class="formUpdate" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="uuid" class="update-uuid">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control update-name" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <select name="class" class="form-control update-class select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                    <option value="Porifera">Porifera</option>
                                    <option value="Coelentera">Coelentera</option>
                                    <option value="Platyhelminthes">Platyhelminthes</option>
                                    <option value="Nemathelminthes">Nemathelminthes</option>
                                    <option value="Annelida">Annelida</option>
                                    <option value="Mollusca">Mollusca</option>
                                    <option value="Pisces">Pisces</option>
                                    <option value="Amphibia">Amphibia</option>
                                    <option value="Reptilia">Reptilia</option>
                                    <option value="Aves">Aves</option>
                                    <option value="Mamalia">Mamalia</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control update-description" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Description Detail</label>
                                        <textarea name="description_detail" class="form-control update-description-detail" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation Type</label>
                                        <input type="text" name="conservation_type" class="form-control update-conservation-type" placeholder="Enter Conservation Type">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation At</label>
                                        <input type="text" name="conservation_at" class="form-control update-conservation-at" placeholder="Enter Conservation At">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Conservation Date</label>
                                        <input type="date" name="conservation_date" class="form-control update-conservation-date">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>IUCN Status</label>
                                <select name="status_iucn" class="form-control update-status-iucn select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                    <option value="Dilindungi">Dilindungi</option>
                                    <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                    <option value="Least Concern">Least Concern</option>
                                    <option value="Near Threatned">Near Threatned</option>
                                    <option value="Vulnerable">Vulnerable</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="location" class="form-control update-location" placeholder="Enter Population">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control update-latitude" placeholder="Enter latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input type="text" name="longtitude" class="form-control update-longtitude" placeholder="Enter longtitude" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Icon</label><small style="color: red"> Leave it blank if you don't want to change it</small>
                                <input type="file" name="icon" class="form-control update-icon" accept=".ico">
                            </div>
                            <div class="form-group">
                                <label>Image</label><small style="color: red"> Leave it blank if you don't want to change it</small>
                                <input type="file" name="image" class="form-control update-image" accept="image/png, image/jpg, image/jpeg">
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
        
        <div class="modal fade modal-increase">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Increase Population</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/increasePopulation') ?>" method="post" class="formIncrease">
                        <div class="modal-body">
                            <input type="hidden" name="fauna_uuid" class="increase-uuid">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" class="form-control increase-year" required>
                            </div>
                            <div class="form-group">
                                <label>Population</label>
                                <input type="number" name="population" class="form-control increase-population" placeholder="Enter Population" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required>
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

        <div class="modal fade modal-decrease">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Decrease Population</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/decreasePopulation') ?>" method="post" class="formDecrease">
                        <div class="modal-body">
                            <input type="hidden" name="fauna_uuid" class="decrease-uuid">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" class="form-control decrease-year" required>
                            </div>
                            <div class="form-group">
                                <label>Population</label>
                                <input type="number" name="population" class="form-control decrease-population" placeholder="Enter Population" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required>
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

        <div class="modal fade modal-view">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Views Population</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="view-fauna-uuid">
                        <table class="table table-bordered table-striped display nowrap table-population" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UUID</th>
                                    <th>Year</th>
                                    <th>Population</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade modal-update-population">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Update Population</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/updatePopulation') ?>" method="post" class="formUpdatePopulation">
                        <div class="modal-body">
                            <input type="hidden" name="uuid" class="update-population-uuid">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year" class="form-control update-population-year" required>
                            </div>
                            <div class="form-group">
                                <label>Population</label>
                                <input type="number" name="population" class="form-control update-population-population" placeholder="Enter Population" required>
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
        var table = $('.table-fauna').DataTable({
            processing      : true,
            serverSide      : true,
            paging          : true,
            info            : true,
            scrollX         : true,
            scrollCollapse  : true,
            "ordering"      : false,
            "ajax"          : {
                "url": "<?= base_url('Fauna/read'); ?>",
                "type": "POST"
            },
            "columns": [
                { "data" : "no", "sClass": "text-center" },
                { "data" : 'uuid', "visible": false },
                { "data" : "name", "sClass": "text-center" },
                { "data" : "class", "sClass": "text-center" },
                { "data" : "description", "sClass": "text-center" },
                { "data" : "description_detail", "sClass": "text-center" },
                { "data" : "conservation_type", "sClass": "text-center" },
                { "data" : "conservation_at", "sClass": "text-center" },
                {
                    "data" : "conservation_date",
                    "sClass": "text-center",
                    render: function(data) {
                        return moment(data).format('D MMMM YYYY');
                    }
                },
                { "data" : "population", "sClass": "text-center" },
                { "data" : "status_iucn", "sClass": "text-center" },
                { "data" : "location", "sClass": "text-center" },
                { "data" : "latitude", "sClass": "text-center" },
                { "data" : "longtitude", "sClass": "text-center" },
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
                        return "<a href='#' class='btn-view' title='Views Population'><i class='fas fa-eye'></i></a>&nbsp;<a href='#' class='btn-increase' title='Increase Population'><i class='fas fa-plus'></i></a>&nbsp;<a href='#' class='btn-decrease' title='Decrease Population'><i class='fas fa-minus'></i></a>&nbsp;<a href='#' class='btn-edit' title='Update Fauna'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete' title='Delete Fauna'><i class='fas fa-trash'></i></a>";
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
                title: 'Wait...',
                text: 'Are you sure you want to add this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
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
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formCreate')[0].reset();
                                        $('.modal-create').modal('hide');
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

        table.on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-update').modal('show');
            $('.update-uuid').val(data[0].uuid);
            $('.update-name').val(data[0].name);
            $('.update-class').val(data[0].class).trigger('change');
            $('.update-description').val(data[0].description);
            $('.update-description-detail').val(data[0].description_detail);
            $('.update-conservation-type').val(data[0].conservation_type);
            $('.update-conservation-at').val(data[0].conservation_at);
            $('.update-conservation-date').val(data[0].conservation_date);
            $('.update-status-iucn').val(data[0].status_iucn).trigger('change');
            $('.update-location').val(data[0].location);
            $('.update-latitude').val(data[0].latitude);
            $('.update-longtitude').val(data[0].longtitude);
        });

        $('.formUpdate').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to update this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
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
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formUpdate')[0].reset();
                                        $('.modal-update').modal('hide');
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

        table.on('click', '.btn-delete', function(e) {
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
                confirmButtonText: 'Yes',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('Fauna/delete'); ?>",
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

        $('.increase-year, .decrease-year').datepicker({
            minViewMode: 2,
            format: 'yyyy',
            autoclose: true
        });

        table.on('click', '.btn-increase', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-increase').modal('show');
            $('.increase-uuid').val(data[0].uuid);
        });

        $('.formIncrease').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to increase the population ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
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
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formIncrease')[0].reset();
                                        $('.modal-increase').modal('hide');
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

        table.on('click', '.btn-decrease', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-decrease').modal('show');
            $('.decrease-uuid').val(data[0].uuid);
        });

        $('.formDecrease').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to decrease the population ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
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
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formDecrease')[0].reset();
                                        $('.modal-decrease').modal('hide');
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

        table.on('click', '.btn-view', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-view').modal('show');
            $('.view-fauna-uuid').val(data[0].uuid);
        });

        $('.modal-view').on('shown.bs.modal', function () {
            var fauna_uuid = $('.view-fauna-uuid').val();
            var tablePopulation = $('.table-population').DataTable({
                processing      : true,
                serverSide      : true,
                paging          : true,
                info            : true,
                scrollX         : true,
                scrollCollapse  : true,
                "ordering"      : false,
                "ajax"          : {
                    "url"       : "<?= base_url('Fauna/readPopulation'); ?>",
                    "type"      : "POST",
                    "data"      : { 'fauna_uuid' : fauna_uuid },
                    "dataType"  : 'JSON',
                },
                "columns": [
                    { "data" : "no", "sClass": "text-center" },
                    { "data" : 'uuid', "visible": false },
                    { "data" : "year", "sClass": "text-center" },
                    { "data" : "population", "sClass": "text-center" },
                    { 
                        "data"    : null,
                        "sClass": "text-center",
                        render : function (data, type, row) {
                            return "<a href='#' class='btn-update-population' title='Update Population'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete-population' title='Delete Population'><i class='fas fa-trash'></i></a>";
                        }
                    }
                ],
            });
            tablePopulation.columns.adjust();
        });

        $('.modal-view').on('hidden.bs.modal', function () {
            $('.table-population').DataTable().destroy();
        });
        
        $('.table-population').on('click', '.btn-update-population', function(e) {
            e.preventDefault();
            var data = $('.table-population').DataTable().rows($(this).parents('tr')).data();
            $('.modal-update-population').modal('show');
            $('.update-population-uuid').val(data[0].uuid);
            $('.update-population-year').val(data[0].year);
            $('.update-population-population').val(data[0].population);
        });

        $('.formUpdatePopulation').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to update the population ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
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
                                    title: 'Success',
                                    text: response.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.value) {
                                        $('.formUpdatePopulation')[0].reset();
                                        $('.modal-update-population').modal('hide');
                                        $('.table-population').DataTable().ajax.reload(null, false);
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

        $('.table-population').on('click', '.btn-delete-population', function(e) {
            e.preventDefault();
            var data = $('.table-population').DataTable().rows($(this).parents('tr')).data();
            var uuid = data[0].uuid;
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to delete this data ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('Fauna/deletePopulation'); ?>",
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
                                        $('.table-population').DataTable().ajax.reload(null, false);
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