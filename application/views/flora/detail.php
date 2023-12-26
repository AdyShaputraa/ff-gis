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
                $uuid = ''; $name = '-'; $class = '-'; $image = '-'; $description = '-'; $description_detail = '-'; 
                $conservation_at = '-'; $conservation_date = date('now'); $status_iucn = '';
                foreach ($flora as $value) {
                    $uuid = $value->uuid; $name = $value->name; $class = $value->class; $image = $value->image; $description = $value->description;
                    $description_detail = $value->description_detail; $conservation_at = $value->conservation_at; $conservation_date = $value->conservation_date;
                    $status_iucn = $value->status_iucn;
                }

                $population = 0;
                foreach ($flora_population_count as $value) {
                    $population = $value->population;
                }
            ?>

            <section class="content">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"><?= $name; ?></h3>
                                <div class="col-12">
                                    <img src="<?= $image; ?>" class="product-image" alt="Flora Image">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?= $name; ?> &nbsp;<span class="h6"><?= $class; ?></span></h3>
                                <p><?= $description; ?></p>
                                <hr>
                                <?= $description_detail ?>
                                <hr>
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
                                                <canvas id="line-chart-canvas" height="300" style="height: 300px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-4">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-default">
                                        <div class="inner text-center">
                                            <h3><i class="fas fa-map-pin"></i></h3>
                                            <p><?= $conservation_at; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-default">
                                        <div class="inner text-center">
                                            <h3><i class="fas fa-calendar"></i></h3>
                                            <p><?= date('d F Y', strtotime($conservation_date)); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="small-box bg-default">
                                        <div class="inner text-center">
                                            <h3><?= $status_iucn; ?></h3>
                                            <p>IUCN Status</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card">
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
                var uuid = '<?= $uuid ?>';
                $.ajax({
                    url: '<?= base_url("Detail/floraGrafikData"); ?>',
                    type: 'POST',
                    data: { 'uuid' : uuid },
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
                var uuid = '<?= $uuid ?>';
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
                    url: '<?= base_url("Detail/mappingFlora"); ?>',
                    type: 'POST',
                    data: { 'uuid' : uuid },
                    dataType: 'JSON',
                    success : function(response) {
                        $.each(response, function(i, field) {
                            var latitude = parseFloat(response[i].latitude);
                            var longtitude = parseFloat(response[i].longtitude);
                            var url = '<?= base_url('Detail/flora/') ?>' + response[i].uuid;
                            var image = response[i].image;
                            var icon = L.icon({
                                iconUrl: response[i].icon,
                                iconSize: [50,50]
                            });
                            var detail = "<img src='"+ image + "' style='width: 100px; height: 100px; display: block; margin-left: auto; margin-right: auto;'>";
                                detail += "<br/><span style='font-size: 23px;'><b>" + response[i].name + "</b></span>";
                                detail += "<hr><span>" + response[i].description + "</span>";
                                detail += "<br/><br/>Location : <b>" + response[i].location + "</b>";
                                logMarker = L.marker([latitude, longtitude],{ icon: icon}).addTo(myFeatureGroup).bindPopup(detail);
                                logMarker.on('mouseover', function(e) {
                                    this.openPopup();
                                });

                                logMarker.on('click', function(e) {
                                    this.openPopup();
                                });

                                logMarker.id = response[i].uuid;
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