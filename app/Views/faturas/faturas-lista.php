<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?>  </title>
  
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
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <a href="<?php echo site_url('/faturas/salvar') ?>" class="btn btn-success mb-2">Nova Fatura</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>

  <div class="mt-3">
     <table class="table table-bordered" id="contratos-lista">
       <thead>
          <tr>
             <th>Fatura Id</th>
             <th>Id do Contrato</th>
             <th>Contrato</th>
             <th>Emissão</th>
             <th>Vencimento</th>
             <th>Valor</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
           
          <?php if($faturas): ?>
          <?php foreach($faturas as $fatura): ?>
          <tr>
             <td><?php echo $fatura['fat_id']; ?></td>
             <td><?php echo $fatura['contrato_id']; ?></td>
             <td><a href="<?php echo base_url('contratos/editar/'.$fatura['cont_id']);?>"><?php echo $fatura['contrato']; ?></a></td>
             <td><?php echo date_format(new DateTime($fatura['fat_emissao']), 'd/m/Y'); ?></td>
              <td><?php echo date_format(new DateTime($fatura['fat_vencimento']), 'd/m/Y'); ?></td>
             <td><?php echo number_format($fatura['fat_valor'], 2, ',', '.'); ?></td>
             <td>
              <a href="<?php echo base_url('faturas/editar/'.$fatura['fat_id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('faturas/deletar/'.$fatura['fat_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<?= $this->include('layouts/footer') ?>
</body>

</html>