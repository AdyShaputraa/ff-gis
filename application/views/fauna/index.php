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
                                <th>Local Name</th>
                                <th>Domain UUID</th>
                                <th>Domain</th>
                                <th>Kingdom UUID</th>
                                <th>Kingdom</th>
                                <th>Phylum UUID</th>
                                <th>Phylum</th>
                                <th>Class UUID</th>
                                <th>Class</th>
                                <th>Ordo UUID</th>
                                <th>Ordo</th>
                                <th>Familia UUID</th>
                                <th>Familia</th>
                                <th>Genus UUID</th>
                                <th>Genus</th>
                                <th>Spesies UUID</th>
                                <th>Spesies</th>
                                <th>Description</th>
                                <th>Description Detail</th>
                                <th>Status</th>
                                <th>Protection Status</th>
                                <th>Total Population</th>
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
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control create-name" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Local Name</label>
                                        <input type="text" name="name_local" class="form-control create-name-local" placeholder="Enter Local Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Domain</label>
                                        <select name="domain" class="form-control create-domain select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_domain as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Kingdom</label>
                                        <select name="kingdom" class="form-control create-kingdom select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_kingdom as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Phylum</label>
                                        <select name="phylum" class="form-control create-phylum select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_phylum as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="class" class="form-control create-class select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_class as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Ordo</label>
                                        <select name="ordo" class="form-control create-ordo select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_ordo as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Familia</label>
                                        <select name="familia" class="form-control create-familia select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_familia as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Genus</label>
                                        <select name="genus" class="form-control create-genus select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_genus as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Spesies</label>
                                        <select name="spesies" class="form-control create-spesies select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_spesies as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control create-status select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <option value="Extinct (EX)" title="Extinct (EX) - No known living individuals">Extinct (EX)</option>
                                            <option value="Extinct in the wild (EW)" title="Extinct in the wild (EW) - Known only to survive in captivity, or as a naturalized population outside its historic range">Extinct in the wild (EW)</option>
                                            <option value="Critically Endangered (CR)" title="Critically Endangered (CR) - Highest risk of extinction in the wild">Critically Endangered (CR)</option>
                                            <option value="Endangered (EN)" title="Endangered (EN) - Higher risk of extinction in the wild">Endangered (EN)</option>
                                            <option value="Vulnerable (VU)" title="Vulnerable (VU) - High risk of extinction in the wild">Vulnerable (VU)</option>
                                            <option value="Near Threatened (NT)" title="Near Threatened (NT) - Likely to become endangered in the near future">Near Threatened (NT)</option>
                                            <option value="Conservation Dependent (CD)" title="Conservation Dependent (CD) - Low risk; is conserved to prevent being near threatened, certain events may lead it to being a higher risk level">Conservation Dependent (CD)</option>
                                            <option value="Least concern (LC)" title="Least concern (LC) - Very Low risk; does not qualify for a higher risk category and not likely to be threatened in the near future. Widespread and abundant taxa are included in this category.">Least concern (LC)</option>
                                            <option value="Data deficient (DD)" title="Data deficient (DD) - Not enough data to make an assessment of its risk of extinction">Data deficient (DD)</option>
                                            <option value="Not evaluated (NE)" title="Not evaluated (NE) - Has not yet been evaluated against the criteria.">Not evaluated (NE)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Protection Status</label>
                                        <select name="status_perlindungan" class="form-control create-status-perlindungan select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <option value="Dilindungi">Dilindungi</option>
                                            <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                        </select>
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
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control update-name" placeholder="Enter Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Local Name</label>
                                        <input type="text" name="name_local" class="form-control update-name-local" placeholder="Enter Local Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Domain</label>
                                        <select name="domain" class="form-control update-domain select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_domain as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Kingdom</label>
                                        <select name="kingdom" class="form-control update-kingdom select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_kingdom as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Phylum</label>
                                        <select name="phylum" class="form-control update-phylum select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_phylum as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select name="class" class="form-control update-class select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_class as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Ordo</label>
                                        <select name="ordo" class="form-control update-ordo select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_ordo as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label>Familia</label>
                                        <select name="familia" class="form-control update-familia select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_familia as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Genus</label>
                                        <select name="genus" class="form-control update-genus select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_genus as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Spesies</label>
                                        <select name="spesies" class="form-control update-spesies select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($fauna_spesies as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control update-status select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <option value="Extinct (EX)" title="Extinct (EX) - No known living individuals">Extinct (EX)</option>
                                            <option value="Extinct in the wild (EW)" title="Extinct in the wild (EW) - Known only to survive in captivity, or as a naturalized population outside its historic range">Extinct in the wild (EW)</option>
                                            <option value="Critically Endangered (CR)" title="Critically Endangered (CR) - Highest risk of extinction in the wild">Critically Endangered (CR)</option>
                                            <option value="Endangered (EN)" title="Endangered (EN) - Higher risk of extinction in the wild">Endangered (EN)</option>
                                            <option value="Vulnerable (VU)" title="Vulnerable (VU) - High risk of extinction in the wild">Vulnerable (VU)</option>
                                            <option value="Near Threatened (NT)" title="Near Threatened (NT) - Likely to become endangered in the near future">Near Threatened (NT)</option>
                                            <option value="Conservation Dependent (CD)" title="Conservation Dependent (CD) - Low risk; is conserved to prevent being near threatened, certain events may lead it to being a higher risk level">Conservation Dependent (CD)</option>
                                            <option value="Least concern (LC)" title="Least concern (LC) - Very Low risk; does not qualify for a higher risk category and not likely to be threatened in the near future. Widespread and abundant taxa are included in this category.">Least concern (LC)</option>
                                            <option value="Data deficient (DD)" title="Data deficient (DD) - Not enough data to make an assessment of its risk of extinction">Data deficient (DD)</option>
                                            <option value="Not evaluated (NE)" title="Not evaluated (NE) - Has not yet been evaluated against the criteria.">Not evaluated (NE)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Protection Status</label>
                                        <select name="status_perlindungan" class="form-control update-status-perlindungan select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <option value="Dilindungi">Dilindungi</option>
                                            <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                        </select>
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

        <div class="modal fade modal-map-pin">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Map Pin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="map-pin-fauna-uuid">
                        <table class="table table-bordered table-striped display nowrap table-coordinate" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>UUID</th>
                                    <th>Provinces UUID</th>
                                    <th>Provinces Name</th>
                                    <th>Location Name</th>
                                    <th>Latitude</th>
                                    <th>Longtitude</th>
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
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Provinces</label>
                                        <select name="provinces" class="form-control increase-provinces select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($provinces as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Location Name</label>
                                        <input type="text" name="name" class="form-control increase-location" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control increase-latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input type="text" name="longtitude" class="form-control increase-longtitude" required>
                                    </div>
                                </div>
                            </div>
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
                            <input type="hidden" name="uuid" class="decrease-uuid">
                            <div class="form-group">
                                <label>Provinces</label>
                                <select name="provinces" class="form-control decrease-provinces select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                    <?php foreach($provinces as $value) { ?>
                                        <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <select name="name" class="form-control decrease-location select2" style="width: 100%;" required>
                                    <option value="" selected disabled>Select Once</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" class="form-control decrease-latitude" readonly>
                            </div>
                            <div class="form-group">
                                <label>Longtitude</label>
                                <input type="text" class="form-control decrease-longtitude" readonly>
                            </div>
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
        
        <div class="modal fade modal-update-coordinate">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">Form Update Coordinate</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Fauna/updateCoordinate') ?>" method="post" class="formUpdateCoordinate">
                        <div class="modal-body">
                            <input type="hidden" name="uuid" class="update-coordinate-uuid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Provinces</label>
                                        <select name="provinces" class="form-control update-coordinate-provinces select2" style="width: 100%;" required>
                                            <option value="" selected disabled>Select Once</option>
                                            <?php foreach($provinces as $value) { ?>
                                                <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Location Name</label>
                                        <input type="text" name="name" class="form-control update-coordinate-location" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input type="text" name="latitude" class="form-control update-coordinate-latitude" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Longtitude</label>
                                        <input type="text" name="longtitude" class="form-control update-coordinate-longtitude" required>
                                    </div>
                                </div>
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
                { "data" : "name_local", "sClass": "text-center" },
                { "data" : "domain_uuid", "visible": false },
                { "data" : "domain_name", "sClass": "text-center" },
                { "data" : "kingdom_uuid", "visible": false },
                { "data" : "kingdom_name", "sClass": "text-center" },
                { "data" : "phylum_uuid", "visible": false },
                { "data" : "phylum_name", "sClass": "text-center" },
                { "data" : "class_uuid", "visible": false },
                { "data" : "class_name", "sClass": "text-center" },
                { "data" : "ordo_uuid", "visible": false },
                { "data" : "ordo_name", "sClass": "text-center" },
                { "data" : "familia_uuid", "visible": false },
                { "data" : "familia_name", "sClass": "text-center" },
                { "data" : "genus_uuid", "visible": false },
                { "data" : "genus_name", "sClass": "text-center" },
                { "data" : "spesies_uuid", "visible": false },
                { "data" : "spesies_name", "sClass": "text-center" },
                { "data" : "description", "sClass": "text-center" },
                { "data" : "description_detail", "sClass": "text-center" },
                { "data" : "status", "sClass": "text-center" },
                { "data" : "status_perlindungan", "sClass": "text-center" },
                { "data" : "population", "sClass": "text-center" },
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
                        return "<a href='#' class='btn-map-pin' title='Pin Coordinate'><i class='fas fa-map-pin'></i></a>&nbsp;<a href='#' class='btn-increase' title='Increase Population'><i class='fas fa-plus'></i></a>&nbsp;<a href='#' class='btn-decrease' title='Decrease Population'><i class='fas fa-minus'></i></a>&nbsp;<a href='#' class='btn-edit' title='Update Fauna'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete' title='Delete Fauna'><i class='fas fa-trash'></i></a>";
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
            $('.update-name-local').val(data[0].name_local);
            $('.update-domain').val(data[0].domain_uuid).trigger('change');
            $('.update-kingdom').val(data[0].kingdom_uuid).trigger('change');
            $('.update-phylum').val(data[0].phylum_uuid).trigger('change');
            $('.update-class').val(data[0].class_uuid).trigger('change');
            $('.update-ordo').val(data[0].ordo_uuid).trigger('change');
            $('.update-familia').val(data[0].familia_uuid).trigger('change');
            $('.update-genus').val(data[0].genus_uuid).trigger('change');
            $('.update-spesies').val(data[0].spesies_uuid).trigger('change');
            $('.update-description').val(data[0].description);
            $('.update-description-detail').val(data[0].description_detail);
            $('.update-status').val(data[0].status).trigger('change');
            $('.update-status-perlindungan').val(data[0].status_perlindungan).trigger('change');
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

        table.on('click', '.btn-map-pin', function(e) {
            e.preventDefault();
            var data = table.rows($(this).parents('tr')).data();
            $('.modal-map-pin').modal('show');
            $('.map-pin-fauna-uuid').val(data[0].uuid);
        });

        $('.modal-map-pin').on('shown.bs.modal', function () {
            var fauna_uuid = $('.map-pin-fauna-uuid').val();
            var tableCoordinate = $('.table-coordinate').DataTable({
                processing      : true,
                serverSide      : true,
                paging          : true,
                info            : true,
                scrollX         : true,
                scrollCollapse  : true,
                "ordering"      : false,
                "ajax"          : {
                    "url"       : "<?= base_url('Fauna/readCoordinate'); ?>",
                    "type"      : "POST",
                    "data"      : { 'fauna_uuid' : fauna_uuid },
                    "dataType"  : 'JSON',
                },
                "columns": [
                    { "data" : "no", "sClass": "text-center" },
                    { "data" : 'uuid', "visible": false },
                    { "data" : 'provinces_uuid', "visible": false },
                    { "data" : "provinces_name", "sClass": "text-center" },
                    { "data" : "name", "sClass": "text-center" },
                    { "data" : "latitude", "sClass": "text-center" },
                    { "data" : "longtitude", "sClass": "text-center" },
                    { "data" : "population", "sClass": "text-center" },
                    { 
                        "data"    : null,
                        "sClass": "text-center",
                        render : function (data, type, row) {
                            return "<a href='#' class='btn-update-coordinate' title='Update Coordinate'><i class='fas fa-pen'></i></a>&nbsp;<a href='#' class='btn-delete-coordinate' title='Delete Coordinate'><i class='fas fa-trash'></i></a>";
                        }
                    }
                ],
            });
            tableCoordinate.ajax.reload(null, false);
            tableCoordinate.columns.adjust();
        });

        $('.modal-map-pin').on('hidden.bs.modal', function () {
            $('.table-coordinate').DataTable().destroy();
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
                                        $('.increase-provinces').val('').trigger('change');
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
            var uuid = data[0].uuid;
            $('.modal-decrease').modal('show');
            $('.decrease-uuid').val(uuid);
        });

        $('.decrease-provinces').on('change', function() {
            var uuid = $(this).val();
            $.ajax({
                url: "<?= base_url('Fauna/getCoordinateDataByProvinces'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data : { 'uuid' : uuid },
                success : function(response) {
                    if (response.code == 200) {
                        if ($.trim(response.data)) {
                            $('.decrease-location').empty();
                            var data = [{'text' : 'Select Once', 'id' : ''}];
                            $.each(response.data, function(key, value) {
                                data.push({ 'text' : value.name, 'id' : value.uuid });
                            });
                            $('.decrease-location').select2({
                                data: data
                            });
                            $('.decrease-location option[value=""]').prop('disabled', true);
                        } else {
                            $('.decrease-location').empty();
                            var data = [{'text' : 'Select Once', 'id' : ''}];
                            $('.decrease-location').select2({
                                data: data
                            });
                            $('.decrease-location option[value=""]').prop('disabled', true);
                            $('.decrease-latitude').val('');
                            $('.decrease-longtitude').val('');
                        }
                    }       
                },
                error : function(error) {}
            });
        });

        $('.decrease-location').on('change', function() {
            var uuid = $(this).val();
            $.ajax({
                url: "<?= base_url('Fauna/getCoordinateById'); ?>",
                type: 'POST',
                dataType: 'JSON',
                data : { 'uuid' : uuid },
                success : function(response) {
                    if (response.code == 200) {
                        if ($.trim(response.data[0])) {
                            $('.decrease-latitude').val(response.data[0].latitude);
                            $('.decrease-longtitude').val(response.data[0].longtitude);
                        }
                    }       
                },
                error : function(error) {}
            });
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
        
        $('.table-coordinate').on('click', '.btn-update-coordinate', function(e) {
            e.preventDefault();
            var data = $('.table-coordinate').DataTable().rows($(this).parents('tr')).data();
            $('.modal-update-coordinate').modal('show');
            $('.update-coordinate-uuid').val(data[0].uuid);
            $('.update-coordinate-provinces').val(data[0].provinces_uuid).trigger('change');
            $('.update-coordinate-location').val(data[0].name);
            $('.update-coordinate-latitude').val(data[0].latitude);
            $('.update-coordinate-longtitude').val(data[0].longtitude);
        });

        $('.formUpdateCoordinate').submit(function (e) {
            e.preventDefault();
            var form = new FormData(this);
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to update the coordinate ?',
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
                                        $('.formUpdateCoordinate')[0].reset();
                                        $('.update-coordinate-provinces').val('').trigger('change');
                                        $('.modal-update-coordinate').modal('hide');
                                        $('.table-coordinate').DataTable().ajax.reload(null, false);
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

        $('.table-coordinate').on('click', '.btn-delete-coordinate', function(e) {
            e.preventDefault();
            var data = $('.table-coordinate').DataTable().rows($(this).parents('tr')).data();
            var uuid = data[0].uuid;
            Swal.fire({
                title: 'Wait...',
                text: 'Are you sure you want to delete this coordinate ?',
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                allowOutsideClick: false
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?= base_url('Fauna/deleteCoordinate'); ?>",
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
                                        $('.table-coordinate').DataTable().ajax.reload(null, false);
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