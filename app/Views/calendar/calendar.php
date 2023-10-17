<?
/*
*TO-DO
Ajustar as cores de acordo com a prioridade.

*/
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <!-- fullCalendar -->
  <link rel="stylesheet" href="<?= base_url('/plugins/fullcalendar/main.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.min.css') ?>">

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
            <a data-toggle="modal" data-target="#modal_tarefa" class="btn btn-success mb-2" onclick="tarefas.novaTarefa()" ;>Nova Tarefa</a>

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

  <!-- fullCalendar 5.11.0 -->
  <!--
<script src="<?= base_url('/plugins/fullcalendar/main.min.js') ?>"></script>
-->
  <script src="<?= base_url('/plugins/fullcalendar/index.global.js') ?>"></script>
  <script src="<?= base_url('/plugins/fullcalendar/locales/pt-br.js') ?>"></script>
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
      var prazo;
      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;
      var calendarEl = document.getElementById('calendar');
      var Droppable = FullCalendar.Droppable;

      function novaTarefa(prazo) {
        console.log(prazo);
        $('#modal_tarefa').modal('show');
        $('#form_tarefa')[0].reset();
        $('.modal-title').text('<?= lang('App.Tarefa.nova') ?>'); // Set title to Bootstrap modal title
        document.getElementById('form_tarefa').action = "<?= site_url('/tarefas/salvartarefa') ?>";
        $('[name="prazo"]').val(prazo);
      }


      var calendar = new Calendar(calendarEl, {

        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'pt-br',
        themeSystem: 'bootstrap',

        events: [
          <?php
          if ($tarefas) : ?>
          <?php foreach ($tarefas as $tarefa) :
              echo '{' . "\n";
              echo "id: '" . $tarefa['id'] . "'," . "\n";
              echo "title: '" . $tarefa['task'] . "'," . "\n";
              echo "start: '" . $tarefa['prazo'] . "'," . "\n";
                if ($tarefa['prioridade']==1){
                  echo "backgroundColor: '#98fb98', \n";
                }
                if ($tarefa['prioridade']==2){
                  echo "backgroundColor: '#cd853f', \n";
                }
                if ($tarefa['prioridade']==3){
                  echo "backgroundColor: '#d2691e', \n";
                }
                if ($tarefa['prioridade']==4){
                  echo "backgroundColor: '#ffd700', \n";
                }
                if ($tarefa['prioridade']==5){
                  echo "backgroundColor: '#b22222', \n";
                }

              echo "eventTextColor: '#000000', \n";
              echo "borderColor: '#000000', \n";
              echo "allDay: true \n";

              echo '},' . "\n";
            endforeach;
          endif;
          ?>

        ],
        editable: true,
        selectable: true,

        eventClick: function(info) {
          var id = info.event.id;
          tarefas.edit(id);
        },

        eventDrop: function(info) {
          var data = moment(info.event.start).format('Y-MM-DD');;
          var id = info.event.id;
          var xmlhttp = new XMLHttpRequest();
          var url = "<?php echo site_url('agenda/a_editar_evento') ?>?evento=" + id + "&data=" + data;
          xmlhttp.open("GET", url, true);
          xmlhttp.send();


          console.log(data);
          console.log(id);
        },

        dateClick: function(info) {
          prazo = info.dateStr;
          novaTarefa(prazo);

        },

      });
      calendar.render();
    });
  </script>

  <?= $this->include('modals/tarefas') ?>

  </section>
  </div>

  </div>
  </body>

</html>