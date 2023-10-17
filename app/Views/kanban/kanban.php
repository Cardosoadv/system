<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>

    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev, ) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev, ui) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
            var status = ui;
            console.log(data, status);
            dEdit(data, status);
        }

        function dEdit(tarefa, status) {
            var xmlhttp = new XMLHttpRequest();
            var url = "<?php echo site_url('tarefas/a_editar_status') ?>?tarefa=" + tarefa + "&status=" + status;
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        }
  </script>


    <?= $this->include('layouts/header') ?>
<script src="<?php echo site_url('public/js/sistema.js') ?>" defer>
</script>
    <?= $this->include('layouts/sidebars') ?>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper kanban">
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

                    <div class="container mt-4">
                        <div class="d-flex justify-content-end">
                            <a data-toggle="modal" data-target="#modal_tarefa" class="btn btn-success mb-2" onclick="tarefas.novaTarefa()" ;>Nova Tarefa</a>
                        </div>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- inicio -->

        <section class="content pb-3">
            <div class="container-fluid h-100">
                <div class="card card-row card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Backlog
                        </h3>
                    </div>
                   <div class="card-body" ondrop="drop(event,1)" ondragover="allowDrop(event)"> 

                        <?php
                        if (isset($backlogs)) {
                            echo $this->include('kanban/backlog');
                        }
                        ?>

                   </div>
                </div>
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            A fazer
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event,2)" ondragover="allowDrop(event)">
                        <?php
                        if (isset($a_fazers)) :
                            echo $this->include('kanban/a_fazer');
                        endif;
                        ?>

                    </div>
                </div>
                <div class="card card-row card-default">
                    <div class="card-header bg-info">
                        <h3 class="card-title">
                            Fazendo
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event,3)" ondragover="allowDrop(event)">

                        <?php
                        if (isset($fazendos)) :
                            echo $this->include('kanban/fazendo');
                        endif;
                        ?>

                    </div>
                </div>
                <div class="card card-row card-success">
                    <div class="card-header">
                        <h3 class="card-title">
                            Feito
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event, 4)" ondragover="allowDrop(event)">

                        <?php
                        if (isset($feitos)) :
                            echo $this->include('kanban/feito');
                        endif;
                        ?>

                    </div>
                </div>

                <div class="card card-row card-danger">
                    <div class="card-header">
                        <h3 class="card-title">
                            Cancelados
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event, 5)" ondragover="allowDrop(event)">

                        <?php
                        if (isset($cancelados)) :
                            echo $this->include('kanban/cancelado');
                        endif;
                        ?>

                    </div>
                </div>

            </div>
    </div>
    </section>

    <!-- Fim -->
    </div>
    </section>
    </div>

    <?= $this->include('modals/tarefas') ?>
        
    </section>
  </div>
 
                    </div>
    <?= $this->include('layouts/footer') ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </body>

</html>