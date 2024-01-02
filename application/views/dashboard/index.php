<?php $this->load->view('layout/header.php'); ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Fauna IUCN Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?= $totalFaunaDilindungi; ?></h3>
                                            <h6>Total Dilindungi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?= $totalFaunaTidakDilindungi; ?></h3>
                                            <h6>Total Tidak Dilindungi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3><?= $totalFaunaLeastConcern; ?></h3>
                                            <h6>Total Least Concern</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= $totalFaunaNearThreatned; ?></h3>
                                            <h6>Total Near Threatned</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?= $totalFaunaVulnerable; ?></h3>
                                            <h6>Total Vulnerable</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Flora IUCN Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?= $totalFloraDilindungi; ?></h3>
                                            <h6>Total Dilindungi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?= $totalFloraTidakDilindungi; ?></h3>
                                            <h6>Total Tidak Dilindungi</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3><?= $totalFloraLeastConcern; ?></h3>
                                            <h6>Total Least Concern</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?= $totalFloraNearThreatned; ?></h3>
                                            <h6>Total Near Threatned</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?= $totalFloraVulnerable; ?></h3>
                                            <h6>Total Vulnerable</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="totalFauna">0</h3>
                            <p>Total Fauna</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-paw"></i>
                        </div>
                    </div>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="totalCagarAlam">0</h3>
                            <p>Total Cagar Alam / Konservasi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-map-pin"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
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
                            <div class="tab-content p-0">
                                <div class="chart tab-pane active" id="area-chart" style="position: relative; height: 300px;">
                                    <canvas id="bar-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane" id="donut-chart" style="position: relative; height: 300px;">
                                    <canvas id="donut-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
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
                                <label>Status</label>
                                <select name="provinces" class="form-control select2 map-filter-status">
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
                        <div class="card-footer with-border">
                            <button class="btn btn-primary btn-filter-map col-12">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $this->load->view('layout/footer.php'); ?>
<script>
    $(document).ready(function() {
        getTotal(); getMaps();

        var totalFlora = 0; var totalFauna = 0;
        function getTotal() {
            $('.totalFlora, .totalFauna').html('Sedang menghitung data');
            $.ajax({
                url: '<?= base_url("Dashboard/countingFlora"); ?>',
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
                url: '<?= base_url("Dashboard/countingFauna"); ?>',
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
                url: '<?= base_url("Dashboard/countingCagarAlam"); ?>',
                type: 'GET',
                dataType: 'JSON',
                success : function(response) {
                    if (response.code == 200) {
                        $('.totalCagarAlam').html(response.total);
                    }
                },
                error : function(error) {
                    $('.totalCagarAlam').html('error');
                }
            });
        }

        setTimeout(function() { 
            chart();
        }, 2000);
        

        function chart() {
            var barChartCanvas = document.getElementById('bar-chart-canvas');
            var barChartData = {
                labels: ['Total Flora & Fauna'],
                datasets: [
                    {
                        label: 'Flora',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [totalFlora]
                    },
                    {
                        label: 'Fauna',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [totalFauna]
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

            var pieChartCanvas = $('#donut-chart-canvas').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Flora',
                    'Fauna',
                ],
                datasets: [
                    {
                        data: [totalFlora, totalFauna],
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
            })
        }

        function getMaps() {
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

            $.getJSON("<?= base_url('Dashboard/getMaps') ?>", function(data) {
                $.each(data, function(i, field) {
                    var latitude = parseFloat(data[i].latitude);
                    var longtitude = parseFloat(data[i].longtitude);
                    if (data[i].type == 'Fauna') {
                        var url = '<?= base_url('Detail/fauna/') ?>' + data[i].uuid + '/' + data[i].coordinate_uuid;
                    } else if (data[i].type == 'Flora') {
                        var url = '<?= base_url('Detail/flora/') ?>' + data[i].uuid + '/' + data[i].coordinate_uuid;
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

            function groupClick(event) { }

            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }
        }

        $('.btn-filter-map').on('click', function(e) {
            e.preventDefault();
            const provinces = $('.map-filter-provinces').val();
            const status = $('.map-filter-status').val();
            
        });
    });
</script>