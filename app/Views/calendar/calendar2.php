<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>

    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?= base_url('/plugins/fullcalendar/main.css') ?>">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.min.css')?>">
    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/sidebars') ?>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo $title ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $title ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body p-0">
                                <!-- THE CALENDAR -->
                                <div id="calendar"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->include('layouts/footer') ?>
<!-- jQuery UI -->
<script src="<?= base_url('/plugins/jquery-ui/jquery-ui.min.js')?>"></script>

   <!-- fullCalendar 5.11.0 -->
<script src="<?= base_url('/plugins/moment2/moment.js')?>"></script>
<script src="<?= base_url('/plugins/fullcalendar-5.11.0/main.js')?>"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
 
            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var Droppable = FullCalendar.Droppable;
 
            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                               
                events: [
                    <?php 
                     if ($tarefas) : ?>
                    <?php foreach ($tarefas as $tarefa) : 
                    echo '{'."\n";
                    echo "title: '".$tarefa['task']."',"."\n";
                    echo "start: '".$tarefa['prazo']."',"."\n";
                    echo "id: '".$tarefa['id']."',"."\n";
                    echo "backgroundColor: '#f56954', \n";
                    echo "borderColor: '#f56954', \n";
                    echo "allDay: true \n";
                    
                    echo '},'."\n";
                    endforeach;
                    endif;    
                    ?>               

                ],
                editable: true,
                selectable:true,
                selectHelper:true,

                eventDrop: function (event,delta){
                    console.log("chamei a função drop!")
                }

            });




            calendar.render();
            // $('#calendar').fullCalendar()
        });
     </script>


</body>

</html>