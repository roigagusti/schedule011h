<?php

ini_set('error_reporting', E_ALL);
// Redirecció a HTTPS
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    exit;
  }

// Incloure classes
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
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    <link href="assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="css/style.css") }}">
    <link rel="stylesheet" href="css/responsive.css") }}">
    <link rel="stylesheet" href="css/bootstrap-table-fixed-columns.css") }}">

    <!-- Scripts Libraries -->
    <link rel="stylesheet" href="js/bootstrap-table-fixed-columns.js") }}">
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

                                                <th>S1 - Q3</th>
                                                <th class='endSprint'></th>
                                                <th>S2 - Q3</th>
                                                <th class='endSprint'></th>
                                                <th>S3 - Q3</th>
                                                <th class='endSprint'></th>
                                                <th>S4 - Q3</th>
                                                <th class='endSprint'></th>
                                                <th>S5 - Q3</th>
                                                <th class='endSprint'></th>
                                                <th>S6 - Q3</th>
                                                <th class='endSprint'></th>
                                            </tr>
                                            <tr class="subhead">
                                                <th class="headcol text-left initiative">↓</th>
                                                <th class="headcol text-left squad">↓</th>
                                                <th class="headcol text-left pec">↓</th>
                                                <th class="headcol text-left owner">↓</th>
                                                <th class="headcol text-left tarea">↓</th>
                                                
                                                <th class='endSprint'>2022-07-04</th>
                                                <th class='endSprint'>2022-07-11</th>
                                                <th class='endSprint'>2022-07-18</th>
                                                <th class='endSprint'>2022-07-25</th>
                                                <th class='endSprint'>2022-08-01</th>
                                                <th class='endSprint'>2022-08-08</th>
                                                <th class='endSprint'>2022-08-15</th>
                                                <th class='endSprint'>2022-08-22</th>
                                                <th class='endSprint'>2022-08-29</th>
                                                <th class='endSprint'>2022-09-05</th>
                                                <th class='endSprint'>2022-09-12</th>
                                                <th class='endSprint'>2022-09-19</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($tasks as $task){
                                                echo '<tr class="inithead">';
                                                    echo '<td class="headcol text-left initiative">'.$task->initiative.'</td>';
                                                    echo '<td class="headcol text-left squad">'.$task->squad.'</td>';
                                                    echo '<td class="headcol text-left pec">'.$task->pec_id.'</td>';
                                                    echo '<td class="headcol text-left owner">'.$task->owner.'</td>';
                                                    echo '<td class="headcol text-left tarea">'.$task->tarea.'</td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint color-owner"></td>';
                                                    echo '<td class="endSprint color-owner"></td>';
                                                    echo '<td class="endSprint color-owner"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                    echo '<td class="endSprint"></td>';
                                                echo '</tr>';
                                            }
                                            ?>
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
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>
<script src="assets/libs/select2/js/select2.min.js"></script>
<script src="assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/pages/table-responsive.init.js"></script>
<!-- JavaScripts custom -->
<script src="assets/js/app.js"></script>
<!-- Scripts custom -->

</body>
</html>