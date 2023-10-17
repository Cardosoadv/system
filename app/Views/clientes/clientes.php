<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <?= $this->include('layouts/header') ?>

  <?= $this->include('layouts/sidebars') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
              <li class="breadcrumb-item active">Lista de Clientes</li>
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
            <a data-toggle="modal" data-target="#modal_cliente" class="btn btn-success mb-2" onclick="clientes.novoCliente()">Novo Cliente</a>
          </div>
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          ?>
          <div class="mt-3">
            <table class="table table-bordered" id="clientes-list">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($clientes) : ?>
                  <?php foreach ($clientes as $cliente) : ?>
                    <tr>
                      <td><?php echo $cliente['nome']; ?></td>
                      <td><?php echo $cliente['email']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" onclick="clientes.edit(<?= $cliente['id'] ?>)">Editar</a>
                        <a href="<?php echo base_url('clientes/delete/' . $cliente['id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>




        <?= $this->include('modals/clientes') ?> 

    </section>
  </div>

  <?= $this->include('layouts/footer') ?>

  </body>

</html>