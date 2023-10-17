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
        <div class="d-flex justify-content-end">
          <a data-toggle="modal" data-target="#modal_fatura" class="btn btn-success mb-2" onclick="faturas.novaFatura()" ;>Nova Fatura</a>
        </div>        
      </div>
      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
      ?>
 
      <div class="mt-3">
        <table class="table table-bordered" id="contratos-lista">
          <thead>
            <tr>
              <th>Fatura Id</th>
              <th>Descrição</th>
              <th>Contrato</th>
              <th>Cliente</th>
              <th>Emissão</th>
              <th>Vencimento</th>
              <th>Valor</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>

            <?php if ($faturas) : ?>
              <?php foreach ($faturas as $fatura) : ?>
                <tr>
                  <td class="col-1"><?php echo $fatura['fat_id']; ?></td>
                  <td class="col-2"><?php echo $fatura['descricao']; ?></td>
                  <td class="col-2">
                  <?php if($fatura['contrato_id'] == 0){
                        echo "";
                      }else{
                        echo $fatura['contrato'];
                      } ?> </td>
                  <td class="col-2">
                  <?php if($fatura['cliente_id'] == null){
                        echo "";
                      }else{
                        echo $fatura['username'];
                      } ?> </td>    
                  <td class="col-1"><?php echo date_format(new DateTime($fatura['fat_emissao']), 'd/m/Y'); ?></td>
                  <td class="col-1"><?php echo date_format(new DateTime($fatura['fat_vencimento']), 'd/m/Y'); ?></td>
                  <td class="col-1"><?php echo number_format($fatura['fat_valor'], 2, ',', '.'); ?></td>
                  <td class="col-2">
                    <a class="btn btn-primary btn-sm" onclick="faturas.edit(<?= $fatura['fat_id'] ?>)">Editar</a>
                    <a href="<?php echo base_url('faturas/deletar/' . $fatura['fat_id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
  </div>

  <?= $this->include('modals/faturas') ?>
              </div>
  <?= $this->include('layouts/footer') ?>
  </body>

</html>