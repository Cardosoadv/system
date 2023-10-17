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
            <a data-toggle="modal" data-target="#modal_despesa" class="btn btn-success mb-2" onclick="despesas.novaDespesa()" ;>Nova Despesa</a>
          </div> 
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          ?>
          <div class="mt-3">
            <table class="table table-bordered" id="bancos-list">
              <thead>
                <tr>
                  <th>Despesa</th>
                  <th>Data de Vencimento</th>
                  <th>Data de Pagamento</th>
                  <th>Valor</th>
                  <th>Ação</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($despesas) : ?>
                  <?php foreach ($despesas as $despesa) : ?>
                    <tr>
                      <td><?php echo $despesa['despesa']; ?></td>
                      <td><?php echo date_format(new DateTime($despesa['data_vencimento']), 'd/m/Y'); ?></td>
                      <td><?php if($despesa['data_pagamento'] == '0000-00-00'){
                        echo "";
                      }else{
                        echo date_format(new DateTime($despesa['data_pagamento']), 'd/m/Y');
                      } ?></td>
                      <td>R$ <?php echo number_format($despesa['valor'], 2, ',', '.'); ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" onclick="despesas.edit(<?= $despesa['despesas_id'] ?>)">Editar</a>
                        <a href="<?php echo base_url('/despesas/deletedespesa/' . $despesa['despesas_id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>


        <?= $this->include('modals/despesas') ?>       



    </section>
  </div>
  <?= $this->include('layouts/footer') ?>

  </body>

</html>