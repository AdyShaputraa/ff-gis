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
    <style>
        #mapid { height: 400px; }
    </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
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

            <?php
                $coordinate_uuid = $_coordinate_uuid; $fauna_uuid = '-'; $name = '-'; $name_local = '-'; $description = '-'; $description_detail = '-';
                $domain_name = '-'; $kingdom_name = '-'; $phylum_name = '-'; $class_name = '-'; $ordo_name = '-';
                $familia_name = '-'; $genus_name = '-'; $spesies_name = '-'; $status = '-'; $status_perlindungan = '-'; $image = '-';
                foreach ($fauna as $value) {
                    $fauna_uuid = $value->uuid; $name = $value->name; $name_local = $value->name_local; $description = $value->description;
                    $description_detail = $value->description_detail; $domain_name = $value->domain_name; $kingdom_name = $value->kingdom_name;
                    $phylum_name = $value->phylum_name; $class_name = $value->class_name; $ordo_name = $value->ordo_name;
                    $familia_name = $value->familia_name; $genus_name = $value->genus_name; $spesies_name = $value->spesies_name;
                    $status = $value->status; $status_perlindungan = $value->status_perlindungan; $image = $value->image;
                }

                $population = 0;
                foreach ($fauna_population_count as $value) {
                    $population = $value->population;
                }

                $provinces_name = '-'; $location_name = '-'; $latitude = '-'; $longtitude = '-';
                foreach ($fauna_coordinate as $value) {
                    $provinces_name = $value->provinces_name; $location_name = $value->location_name; $latitude = $value->latitude; $longtitude = $value->longtitude;
                }
            ?>

            <section class="content">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?= $name; ?></h3>
                                <div class="col-12">
                                    <img src="<?= $image; ?>" class="product-image" alt="Fauna Image">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="small-box bg-default">
                                            <div class="inner text-center">
                                                <h5><?= $status; ?></h5>
                                                <p>IUCN Status</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <div class="small-box bg-default">
                                            <div class="inner text-center">
                                                <h5><?= $status_perlindungan; ?></h5>
                                                <p>Status</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?= $name; ?> &nbsp;<span class="h6"><?= $name_local; ?></span></h3>
                                <p><?= $description; ?></p>
                                <hr>
                                <?= $description_detail ?>
                                <hr>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-3">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $domain_name; ?></h5>
                                            <p>Domain</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $kingdom_name; ?></h5>
                                            <p>Kingdom</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $phylum_name; ?></h5>
                                            <p>Phylum</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $class_name; ?></h5>
                                            <p>Class</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $ordo_name; ?></h5>
                                            <p>Ordo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $familia_name; ?></h5>
                                            <p>Familia</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $genus_name; ?></h5>
                                            <p>Genus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-success">
                                        <div class="inner text-center">
                                            <h5><?= $spesies_name; ?></h5>
                                            <p>Spesies</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="small-box bg-default">
                                                    <div class="inner text-center">
                                                        <h3><?= $population; ?></h3>
                                                        <p>Total Populasi</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="small-box bg-default">
                                                    <div class="inner text-center">
                                                        <h3><i class="fas fa-map-pin"></i></h3>
                                                        <p><?= $provinces_name; ?></p>
                                                        <p><?= $location_name; ?></p>
                                                        <p><?= 'Latitude: '. $latitude.', Longtitude: '.$longtitude; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                        <div class="small-box bg-default">
                                            <div class="inner text-center">
                                                <canvas id="line-chart-canvas" height="300" style="height: 300px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Maps</h3>
                                            </div>
                                            <div class="card-body">
                                                <div id="mapid"></div>
                                            </div>
                                            <div class="card-footer"></div>
                                        </div>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            chart(); getMaps();
            function chart() {
                var coordinate_uuid = '<?= $_coordinate_uuid ?>';
                var fauna_uuid = '<?= $fauna_uuid ?>';
                
                $.ajax({
                    url: '<?= base_url("Detail/faunaGrafikData"); ?>',
                    type: 'POST',
                    data: { 'coordinate_uuid' : coordinate_uuid, 'fauna_uuid' : fauna_uuid },
                    dataType: 'JSON',
                    success : function(response) {
                        var lineChartCanvas = document.getElementById('line-chart-canvas');
                        var lineChartData = {
                            labels: response[0].label,
                            datasets: [
                                {
                                    label: 'Grafik Pertumbuhan',
                                    fill: false,
                                    borderColor: 'rgb(75, 192, 192)',
                                    tension: 0.1,
                                    data: response[0].dataset
                                }
                            ]
                        }
                        
                        var lineChartOptions = {
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
                        var lineChart = new Chart(lineChartCanvas, {
                            type: 'line',
                            data: lineChartData,
                            options: lineChartOptions
                        });
                    }
                });
            }
            
            function getMaps() {
                var uuid = '<?= $_coordinate_uuid ?>';
                var map = L.map('mapid', {
                    minZoom: 7,
                    maxZoom: 13
                }).setView([-7.0003004,109.9764546], 7);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                var myFeatureGroup = L.featureGroup().addTo(map).on("click", groupClick);
                var logMarker;

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

                $.ajax({
                    url: "<?= base_url('Detail/getMaps'); ?>",
                    type: 'POST',
                    dataType: 'JSON',
                    data : { 'uuid' : uuid },
                    success : function(response) {
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

                function groupClick(event) { }

                function onEachFeature(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight,
                        click: zoomToFeature
                    });
                }
            }
        });
    </script>
</body>
</html>