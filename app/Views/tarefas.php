<?php

/**
 ****  A fazer
 * A função responsaveis do js não esta funcionando
 *
 * -> Otimizar o js de forma que fique em arquivo separado e apenas seja necessário indicar os parametros
 */
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>





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

        <div class="container mt-4">
          <div class="d-flex justify-content-end">
            <a data-toggle="modal" data-target="#modal_tarefa" class="btn btn-success mb-2" onclick="tarefas.novaTarefa()" ;>Nova Tarefa</a>
          </div> 
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          ?>
          <div class="mt-3">
            <table class="table table-bordered" id="Lista de Tarefas">
              <thead>
                <tr>
                  <th>Tarefa</th>
                  <th>Prazo</th>
                  <th>Prioridade</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($tarefas) : ?>
                  <?php foreach ($tarefas as $tarefa) : ?>
                    <tr>
                      <td><?php echo $tarefa['task']; ?></td>
                      <td><?php echo date_format(new DateTime($tarefa['prazo']), 'd/m/Y'); ?></td>
                      <td><?php echo $tarefa['prioridade']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" onclick="tarefas.edit(<?= $tarefa['id'] ?>)">Editar</a>
                        <a href="<?php echo base_url('tarefas/deletetarefa/' . $tarefa['id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <?= $this->include('modals/tarefas') ?>


    </section>
  </div>
  <?= $this->include('layouts/footer') ?>
  </body>

</html>