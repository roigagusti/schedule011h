<?php
include_once 'classes.php';
$tasques = new Tasques();
$tasks = $tasques -> listTasks();
$sprints = $tasques -> listSprints(2022);
$hitos = $tasques -> listHitos();
$habitants = $tasques -> listHabitants();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta data -->
    <?php include 'sections/meta.php';?>

    <!-- Títol i Favicons -->
    <title>Planning. Quarter</title>

    <!-- CSS Libraries -->
    <link href="//app.cuantime.es/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="//app.cuantime.es/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="//app.cuantime.es/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="//app.cuantime.es/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="//app.cuantime.es/assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="//app.cuantime.es/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="//app.cuantime.es/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="planning/css/style.css") }}">
    <link rel="stylesheet" href="planning/css/responsive.css") }}">
    <link rel="stylesheet" href="planning/css/bootstrap-table-fixed-columns.css") }}">

    <!-- Scripts Libraries -->
    <link rel="stylesheet" href="planning/js/bootstrap-table-fixed-columns.js") }}">
    <!-- Scripts custom -->
</head>


<body>
    <div id="layout-wrapper">

        <!-- ============================================================== -->
        <!-- PÀGINA INICIAL -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row" style="margin-top:20px">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Planificació</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">011h</li>
                                <li class="breadcrumb-item active">Planificació</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div>
                        <button type="button" class="btn btn-success btn-011h waves-effect waves-light mb-3" data-toggle="modal" data-target="#addTask">Add task</button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <style>
                                .btn-011h{
                                    background-color: #497767 !important;
                                    border-color: #497767 !important;
                                }
                                .table-planificacio {
                                    font-size:0.8em;
                                    line-height:0.5rem;
                                }
                                .table-planificacio td, .table-planificacio th{
                                    padding:0.5rem;
                                    text-align:center;
                                }
                                .timeline{
                                    overflow-x: scroll;
                                    margin-left: 1070px;
                                }
                                
                                .headcol{
                                    position: absolute;
                                    top: auto;
                                }
                                .text-left{
                                    text-align:left !important;
                                }
                                .initiative{
                                    left:0;
                                    width: 200px;
                                }
                                .squad{
                                    left:200px;
                                    width: 150px;
                                }
                                .pec{
                                    left:350px;
                                    width: 60px;
                                }
                                .owner{
                                    left:410px;
                                    width: 60px;
                                }
                                .tarea{
                                    left:470px;
                                    width: 600px;
                                }
                                .endSprint{
                                    border-right:1px solid #ddd !important;
                                }
                                .color-owner{
                                    background-color: #C9E3CE;
                                }
                                .subhead th{
                                    font-weight:300;
                                }
                                .inithead td{
                                    padding-top: 20px;
                                }
                                .bg-nt-gray{
                                    background-color: #EBECED;
                                }
                                .bg-nt-brown{
                                    background-color: #E9E5E3;
                                }
                                .bg-nt-orange{
                                    background-color: #FAEBDD;
                                }
                                .bg-nt-yellow{
                                    background-color: #FBF3DB;
                                }
                                .bg-nt-green{
                                    background-color: #DDEDEA;
                                }
                                .bg-nt-blue{
                                    background-color: #DDEBF1;
                                }
                                .bg-nt-purple{
                                    background-color: #EAE4F2;
                                }
                                .bg-nt-pink{
                                    background-color: #F4DFEB;
                                }
                                .bg-nt-red{
                                    background-color: #FBE4E4;
                                }
                            </style>

                            <!-- taula-fixe -->
                            <div class="table-responsive table-planificacio col-lg-12">
                                <div class="timeline">
                                <table class="table table-centered table-nowrap mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="headcol text-left initiative">Iniciativa</th>
                                            <th class="headcol text-left squad">Squad</th>
                                            <th class="headcol text-left pec">#</th>
                                            <th class="headcol text-left owner">Owner</th>
                                            <th class="headcol text-left tarea">Tarea</th>
                                        </tr>
                                        <tr class="subhead">
                                            <th class="headcol text-left initiative">↓</th>
                                            <th class="headcol text-left squad">↓</th>
                                            <th class="headcol text-left pec">↓</th>
                                            <th class="headcol text-left owner">↓</th>
                                            <th class="headcol text-left tarea">↓</th>
                                            
                                            <th class='endSprint'>.$sprint['date'].</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td class="headcol text-left initiative">$task['iniciativa'];?></td>
                                        <td class="headcol text-left squad">$task['squad'];?></td>
                                        <td class="headcol text-left pec">$task['pec_id'];?></td>
                                        <td class="headcol owner">
                                            <div class="dropdown">
                                                <a class="text-body  text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">$task['owner'];?></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">$habitant['name']</a>
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        </td>
                                        <td class="headcol text-left tarea">$task['tarea']</td>
                                        <td class="endSprint color-owner"></td>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <?php include 'sections/modal-addTask.php';?>


        </div> <!-- container-fluid -->
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

<!-- JavaScripts basics -->
<script src="//app.cuantime.es/assets/libs/jquery/jquery.min.js"></script>
<script src="//app.cuantime.es/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="//app.cuantime.es/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="//app.cuantime.es/assets/libs/simplebar/simplebar.min.js"></script>
<script src="//app.cuantime.es/assets/libs/node-waves/waves.min.js"></script>
<script src="//app.cuantime.es/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="//app.cuantime.es/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="//app.cuantime.es/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="//app.cuantime.es/assets/js/pages/dashboard.init.js"></script>
<script src="//app.cuantime.es/assets/js/pages/form-advanced.init.js"></script>
<script src="//app.cuantime.es/assets/libs/select2/js/select2.min.js"></script>
<script src="//app.cuantime.es/assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="//app.cuantime.es/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="//app.cuantime.es/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="//app.cuantime.es/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="//app.cuantime.es/assets/js/pages/table-responsive.init.js"></script>
<!-- JavaScripts custom -->
<script src="//app.cuantime.es/assets/js/app.js"></script>
<!-- Scripts custom -->

</body>
</html>