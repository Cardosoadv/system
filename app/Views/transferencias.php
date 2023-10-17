<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <?= $this->include('layouts/header') ?>

  <?= $this->include('layouts/sidebars') ?>
  <?php

    use App\Models\BancoModel;

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
            <a data-toggle="modal" data-target="#modal_trasferencia" class="btn btn-success mb-2" onclick="transferencias.novaTransferencia()" ;>Nova Transferencia</a>
          </div> 
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          ?>
          <div class="mt-3">
            <table class="table table-bordered" id="transferencia-list">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Descrição</th>
                  <th>De</th>
                  <th>Para</th>
                  <th>Valor</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($transferencias) : ?>
                  <?php foreach ($transferencias as $transferencia) : ?>
                    <tr>
                      <td><?php echo date_format(new DateTime($transferencia['data']), 'd/m/Y'); ?></td>
                      <td><?php echo $transferencia['descricao']; ?></td>
                      <td><?php $BancoModels = new BancoModel(); $bancoOrigem = $BancoModels->getBanco($transferencia['origem']); echo $bancoOrigem['banco']; ?>       </td>
                      <td><?php $bancoDestino = $BancoModels->getBanco($transferencia['destino']); echo $bancoDestino['banco']; ?></td>
                      <td>R$ <?php echo number_format($transferencia['valor'], 2, ',', '.'); ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" onclick="transferencias.edit(<?= $transferencia['transf_id'] ?>)">Editar</a>
                        <a href="<?php echo base_url('/transferencias/deletetransferencia/' . $transferencia['transf_id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>


        <?= $this->include('modals/transferencias') ?>       



    </section>
  </div>
  <?= $this->include('layouts/footer') ?>

  </body>

</html>