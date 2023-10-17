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

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}
</script>



    <?= $this->include('layouts/header') ?>


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
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- inicio -->

        <section class="content pb-3">
            <div class="container-fluid h-100">
                <div class="card card-row card-secondary" >
                    <div class="card-header">
                        <h3 class="card-title">
                            Backlog
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <!-- Inicio da Tarefa --><div class="tarefa" id="tarefa0" draggable="true" ondragstart="drag(event)" >    
                    <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title">Titulo da Tarefa</h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-link">id da tarefa</a>
                                    <a href="#" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                Corpo da tarefa
                            </div>
                        </div></div><!-- Fim da Tarefa-->

                    </div>
                </div>
                <div class="card card-row card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            A fazer
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <!-- Inicio da Tarefa --><div class="tarefa" id="tarefa1" draggable="true" ondragstart="drag(event)" >
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title">Titulo da Tarefa 1</h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-link">id da tarefa</a>
                                    <a href="#" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                Corpo da tarefa
                            </div>
                        </div>
                    </div></div><!-- Fim da Tarefa-->
                </div>
                <div class="card card-row card-default">
                    <div class="card-header bg-info">
                        <h3 class="card-title">
                            Fazendo
                        </h3>
                    </div>
                    <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">

                        <!-- Inicio da Tarefa --><div class="tarefa" id="tarefa2" draggable="true"  ondragstart="drag(event)">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title">Titulo da Tarefa 2</h5>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-link">id da tarefa</a>
                                    <a href="#" class="btn btn-tool">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                Corpo da tarefa
                            </div>
                        </div>
                    </div></div><!-- Fim da Tarefa-->


            </div>
            <div class="card card-row card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        Feito
                    </h3>
                </div>
                <div class="card-body" ondrop="drop(event)" ondragover="allowDrop(event)">

                    <!-- Inicio da Tarefa --><div class="tarefa" id="tarefa3" draggable="true"  ondragstart="drag(event)">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Titulo da Tarefa 3</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">id da tarefa</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            Corpo da tarefa com a div
                        </div>
                    </div>
                </div></div><!-- Fim da Tarefa-->



            </div>
    </div>
    </div>
    </div>
    </section>






    <!-- Fim -->
    </div>
    </section>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
   
    <?= $this->include('layouts/footer') ?>