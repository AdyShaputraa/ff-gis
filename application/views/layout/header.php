<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GIS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('vendor/almasaeed2010/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/leaflet/leaflet.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }

        .select2-container .select2-selection--single {
            height: 35px !important;
        }
        
        .select2-selection__arrow {
            height: 34px !important;
        }
        
        #mapid { height: 500px; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-footer-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen Mode">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/signOut') ?>" role="button" title="Sign Out">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Dashboard') ?>" class="brand-link">
                <span class="brand-text font-weight-light text-center">
                    <h6>Geological Information System</h6>
                </span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('vendor/almasaeed2010/adminlte/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?= $this->session->userdata('name'); ?>
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('Dashboard') ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>   
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-database"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Provinces') ?>" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Provinces</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p>
                                            Toxonomy
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-circle"></i>
                                                <p>
                                                    Fauna
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaDomain') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Domain</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaKingdom') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Kingdom</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaPhylum') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Phylum</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaClass') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Class</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaOrdo') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Ordo</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaFamilia') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Familia</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaGenus') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Genus</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/faunaSpesies') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Spesies</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="nav-icon fas fa-database"></i>
                                                <p>
                                                    Flora
                                                    <i class="right fas fa-angle-left"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraDomain') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Domain</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraKingdom') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Kingdom</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraDivision') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Division</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraClass') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Class</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraOrdo') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Ordo</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraFamilia') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Familia</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraGenus') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Genus</p>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="<?= base_url('Taxonomy/floraSpesies') ?>" class="nav-link">
                                                        <i class="fas fa-circle nav-icon"></i>
                                                        <p>Spesies</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="<?= base_url('Taxonomy/fauna') ?>" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Fauna Taxonomy</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Taxonomy/flora') ?>" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>Flora Taxonomy</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Fauna') ?>" class="nav-link">
                                <i class="fas fa-paw nav-icon"></i>
                                <p>Fauna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Flora') ?>" class="nav-link">
                                <i class="fas fa-tree nav-icon"></i>
                                <p>Flora</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('User') ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>User Configuration</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>