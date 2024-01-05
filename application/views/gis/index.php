<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/leaflet/leaflet.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <style>
        #mapid { height: 500px; }
    </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('GIS') ?>" class="navbar-brand mx-auto">
                    <span class="brand-text font-weight-light">
                        <h6 class="mt-1">Geological Information System</h6>
                    </span>
                </a>
            </div>
        </nav>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3 class="totalFlora">0</h3>
                                <p>Total Flora</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-tree"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 class="totalFauna">0</h3>
                                <p>Total Fauna</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-paw"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3 class="totalCoordinate">0</h3>
                                <p>Total Coordinate</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-map-pin"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Summary Flora & Fauna
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#area-chart" data-toggle="tab">Area</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#donut-chart" data-toggle="tab">Donut</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label>Provinces</label>
                                            <select name="provinces" class="form-control select2 grafik-filter-provinces">
                                                <option value="" selected disabled>Select Provinces</option>
                                                <?php foreach ($provinces as $value) { ?>
                                                    <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label>IUCN Status</label>
                                            <select name="iucn_status" class="form-control select2 grafik-filter-iucn-status">
                                                <option value="" selected disabled>Select IUCN Status</option>
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
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control select2 grafik-filter-status">
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Dilindungi">Dilindungi</option>
                                                <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" name="year" class="form-control grafik-filter-year" placeholder="Year">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                        <div class="justify-content-between text-center">
                                            <button class="btn btn-sm btn-primary btn-filter-grafik btn-block">Filter</button>
                                            <button class="btn btn-sm btn-danger btn-clear-grafik btn-block">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer with-border">
                                <div class="tab-content p-0">
                                    <div class="chart tab-pane active" id="bar-chart" style="position: relative; height: 300px;">
                                        <canvas id="bar-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                    <div class="chart tab-pane" id="donut-chart" style="position: relative; height: 300px;">
                                        <canvas id="donut-chart-canvas" height="300" style="height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Penyebaran Flora & Fauna</h3>
                            </div>
                            <div class="card-body">
                                <div id="mapid"></div>
                            </div>
                            <div class="card-footer with-border">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Map Filter</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Provinces</label>
                                    <select name="provinces" class="form-control select2 map-filter-provinces">
                                        <option value="" selected disabled>Select Once</option>
                                        <?php foreach ($provinces as $value) { ?>
                                            <option value="<?= $value->uuid; ?>"><?= $value->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>IUCN Status</label>
                                    <select name="iucn_status" class="form-control select2 map-filter-iucn-status">
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
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2 map-filter-status">
                                        <option value="" selected disabled>Select Once</option>
                                        <option value="Dilindungi">Dilindungi</option>
                                        <option value="Tidak Dilindungi">Tidak Dilindungi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer with-border justify-content-between text-center">
                                <button class="btn btn-primary btn-filter-map">Filter</button>
                                <button class="btn btn-danger btn-clear-map">Clear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <footer class="main-footer">
            Geological Information System <strong>Copyright &copy; 2023.</strong> All rights reserved.
        </footer>
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js')?>"></script>
    <script src="<?= base_url('vendor/almasaeed2010/adminlte/plugins/chart.js/Chart.min.js')?>"></script>
    <script src="<?= base_url('assets/plugins/leaflet/leaflet.js')?>"></script>
    <script src="<?= base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            getTotal();

            $('.grafik-filter-year').datepicker({
                minViewMode: 2,
                format: 'yyyy',
                autoclose: true
            });

            var totalFlora = 0; var totalFauna = 0;
            function getTotal() {
                $('.totalFlora, .totalFauna, .totalCoordinate').html('Sedang menghitung data');
                $.ajax({
                    url: '<?= base_url("GIS/countingFlora"); ?>',
                    type: 'GET',
                    dataType: 'JSON',
                    success : function(response) {
                        if (response.code == 200) {
                            $('.totalFlora').html(response.total);
                            totalFlora = response.total;
                        }
                    },
                    error : function(error) {
                        $('.totalFlora').html('error');
                    }
                });
                
                $.ajax({
                    url: '<?= base_url("GIS/countingFauna"); ?>',
                    type: 'GET',
                    dataType: 'JSON',
                    success : function(response) {
                        if (response.code == 200) {
                            $('.totalFauna').html(response.total);
                            totalFauna = response.total;
                        }
                    },
                    error : function(error) {
                        $('.totalFauna').html('error');
                    }
                });
                
                $.ajax({
                    url: '<?= base_url("GIS/countingCoordinate"); ?>',
                    type: 'GET',
                    dataType: 'JSON',
                    success : function(response) {
                        if (response.code == 200) {
                            $('.totalCoordinate').html(response.total);
                        }
                    },
                    error : function(error) {
                        $('.totalCoordinate').html('error');
                    }
                });
            }

            setTimeout(function() { 
                chart();
            }, 2000);

            var barChartCanvas = $('#bar-chart-canvas').get(0).getContext('2d');
            var pieChartCanvas = $('#donut-chart-canvas').get(0).getContext('2d');

            function chart() {
                var barChartData = {
                    labels: ['Total Flora & Fauna'],
                    datasets: [
                        {
                            label: 'Fauna',
                            backgroundColor: 'rgba(210, 214, 222, 1)',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            pointRadius: false,
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: [totalFauna]
                        },
                        {
                            label: 'Flora',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [totalFlora]
                        }
                    ]
                }
                var barChartOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: true
                    },
                    interaction: {
                        intersect: false,
                    },
                    scales: {
                        x: {
                            stacked: true,
                        },
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                });

                var pieData = {
                    labels: [
                        'Fauna',
                        'Flora',
                    ],
                    datasets: [
                        {
                            data: [totalFauna, totalFlora],
                            backgroundColor: ['#f56954', '#00a65a']
                        }
                    ]
                }
                var pieOptions = {
                    legend: {
                        display: false
                    },
                    maintainAspectRatio: false,
                    responsive: true
                }
                var pieChart = new Chart(pieChartCanvas, {
                    type: 'doughnut',
                    data: pieData,
                    options: pieOptions
                });
            }

            $('.btn-filter-grafik').on('click', function(e) {
                e.preventDefault();
                const provinces = $('.grafik-filter-provinces').val();
                const iucnStatus = $('.grafik-filter-iucn-status').val();
                const status = $('.grafik-filter-status').val();
                const year = $('.grafik-filter-year').val();

                $.ajax({
                    url: "<?= base_url('GIS/filterGrafik'); ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data : { 'provinces' : provinces, 'iucn_status' : iucnStatus, 'status' : status, 'year' : year },
                    success : function(response) {
                        var barChartData = {
                            labels: ['Total Flora & Fauna'],
                            datasets: [
                                {
                                    label: response[0].label,
                                    backgroundColor: 'rgba(210, 214, 222, 1)',
                                    borderColor: 'rgba(210, 214, 222, 1)',
                                    pointRadius: false,
                                    pointColor: 'rgba(210, 214, 222, 1)',
                                    pointStrokeColor: '#c1c7d1',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(220,220,220,1)',
                                    data: [response[0].population]
                                },
                                {
                                    label: response[1].label,
                                    backgroundColor: 'rgba(60,141,188,0.9)',
                                    borderColor: 'rgba(60,141,188,0.8)',
                                    pointRadius: false,
                                    pointColor: '#3b8bba',
                                    pointStrokeColor: 'rgba(60,141,188,1)',
                                    pointHighlightFill: '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data: [response[1].population]
                                }
                            ]
                        }
                        var barChartOptions = {
                            maintainAspectRatio: false,
                            responsive: true,
                            legend: {
                                display: true
                            },
                            interaction: {
                                intersect: false,
                            },
                            scales: {
                                x: {
                                    stacked: true,
                                },
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                        var barChart = new Chart(barChartCanvas, {
                            type: 'bar',
                            data: barChartData,
                            options: barChartOptions
                        });

                        var pieData = {
                            labels: [
                                'Fauna',
                                'Flora',
                            ],
                            datasets: [
                                {
                                    data: [response[0].population, response[1].population],
                                    backgroundColor: ['#f56954', '#00a65a']
                                }
                            ]
                        }
                        var pieOptions = {
                            legend: {
                                display: false
                            },
                            maintainAspectRatio: false,
                            responsive: true
                        }
                        var pieChart = new Chart(pieChartCanvas, {
                            type: 'doughnut',
                            data: pieData,
                            options: pieOptions
                        });
                    },
                    error : function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Chart error',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        });
                    }
                });
            });

            $('.btn-clear-grafik').on('click', function(e) {
                e.preventDefault();
                chart();
                $('.grafik-filter-provinces').val('').trigger('change');
                $('.grafik-filter-iucn-status').val('').trigger('change');
                $('.grafik-filter-status').val('').trigger('change');
                $('.grafik-filter-year').val('');
            })

            var map = L.map('mapid', {
                    minZoom: 7,
                    maxZoom: 13
                }).setView([-7.0003004,109.9764546], 7);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            var myFeatureGroup = L.featureGroup().addTo(map).on("click", groupClick);
            var logMarker;

            function groupClick(event) { }

            function onEachFeature(feature, layer) {
                console.log(layer);
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }

            $.getJSON("<?= base_url('assets/map/jawa.geojson') ?>", function(data) {
                getLayer = L.geoJson(data, {
                    onEachFeature: function(feature, layer) {
                        if (feature.properties && feature.properties.popupContent) {
                            layer.bindPopup(feature.properties.popupContent, {closeButton: false});
                        }
                    },
                    pointToLayer: function (feature, latlng) {
                        return L.circleMarker(latlng);
                    }
                }).addTo(map);
            });

            getMaps();
            function getMaps() {
                $.getJSON("<?= base_url('GIS/getMaps') ?>", function(data) {
                    $.each(data, function(i, field) {
                        var latitude = parseFloat(data[i].latitude);
                        var longtitude = parseFloat(data[i].longtitude);
                        if (data[i].type == 'Fauna') {
                            var url = '<?= base_url('Detail/fauna/') ?>' + data[i].coordinate_uuid;
                        } else if (data[i].type == 'Flora') {
                            var url = '<?= base_url('Detail/flora/') ?>' + data[i].coordinate_uuid;
                        }
                        var image = data[i].image;
                        var icon = L.icon({
                            iconUrl: data[i].icon,
                            iconSize: [50,50]
                        });
                        var detail = "<img src='"+ image + "' style='width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;'>";
                            detail += "<br/><span style='font-size: 23px;'><b>" + data[i].local_name + "</b>&nbsp;<sub>" + data[i].name + "</sub></span>";
                            detail += "<hr><span>" + data[i].description + "</span>";
                            detail += "<br/><br/>Provinces : <b>" + data[i].provinces_name + "</b>";
                            detail += "<br/>Location : <b>" + data[i].location_name + "</b>";
                            detail += "<br/>Total Population : <b>" + data[i].population + "</b>";
                            detail += "<br/>IUCN Status : <b>" + data[i].iucn_status + "</b>";
                            detail += "<br/>Status : <b>" + data[i].status + "</b>";
                            detail += "<br/><br/><a href='" + url + "' target='_blank'><button class='btn btn-xs btn-primary'>More Information</button></a>";
                            logMarker = L.marker([latitude, longtitude],{ icon: icon}).addTo(myFeatureGroup).bindPopup(detail);
                            logMarker.on('mouseover', function(e) {
                                this.openPopup();
                            });

                            logMarker.on('click', function(e) {
                                this.openPopup();
                            });

                            logMarker.id = data[i].uuid;
                    });
                });
            }

            $('.btn-filter-map').on('click', function(e) {
                e.preventDefault();
                const provinces = $('.map-filter-provinces').val();
                const iucnStatus = $('.map-filter-iucn-status').val();
                const status = $('.map-filter-status').val();
                
                $.ajax({
                    url: "<?= base_url('GIS/filterMaps'); ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data : { 'provinces' : provinces, 'iucn_status' : iucnStatus, 'status' : status },
                    success : function(response) {
                        myFeatureGroup.clearLayers();
                        $.each(response, function(key, value) {
                            var latitude = parseFloat(value.latitude);
                            var longtitude = parseFloat(value.longtitude);
                            if (value.type == 'Fauna') {
                                var url = '<?= base_url('Detail/fauna/') ?>' + value.coordinate_uuid;
                            } else if (value.type == 'Flora') {
                                var url = '<?= base_url('Detail/flora/') ?>' + value.coordinate_uuid;
                            }
                            var image = value.image;
                            var icon = L.icon({
                                iconUrl: value.icon,
                                iconSize: [50,50]
                            });
                            var detail = "<img src='"+ image + "' style='width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;'>";
                                detail += "<br/><span style='font-size: 23px;'><b>" + value.local_name + "</b>&nbsp;<sub>" + value.name + "</sub></span>";
                                detail += "<hr><span>" + value.description + "</span>";
                                detail += "<br/><br/>Provinces : <b>" + value.provinces_name + "</b>";
                                detail += "<br/>Location : <b>" + value.location_name + "</b>";
                                detail += "<br/>Total Population : <b>" + value.population + "</b>";
                                detail += "<br/>IUCN Status : <b>" + value.iucn_status + "</b>";
                                detail += "<br/>Status : <b>" + value.status + "</b>";
                                detail += "<br/><br/><a href='" + url + "' target='_blank'><button class='btn btn-xs btn-primary'>More Information</button></a>";
                                logMarker = L.marker([latitude, longtitude],{ icon: icon}).addTo(myFeatureGroup).bindPopup(detail);
                                logMarker.on('mouseover', function(e) {
                                    this.openPopup();
                                });

                                logMarker.on('click', function(e) {
                                    this.openPopup();
                                });

                                logMarker.id = value.uuid;
                        });
                    },
                    error : function(error) {
                        Swal.fire({
                            title: 'Error',
                            text: 'Maps error',
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK',
                            allowOutsideClick: false
                        });
                    }
                });
            });

            $('.btn-clear-map').on('click', function(e) {
                e.preventDefault();
                myFeatureGroup.clearLayers();
                getMaps();
                $('.map-filter-provinces').val('').trigger('change');
                $('.map-filter-iucn-status').val('').trigger('change');
                $('.map-filter-status').val('').trigger('change');
            });
        });
    </script>
</body>
</html>