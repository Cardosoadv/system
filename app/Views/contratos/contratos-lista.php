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
            <h1><?= $title ?></h1>
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


        <a href="<?php echo site_url('/contratos/salvar') ?>" class="btn btn-success mb-2">Novo Contrato</a>
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
             <th>Contrato Id</th>
             <th>Id do Cliente</th>
             <th>Cliente</th>
             <th>Valor</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
           
          <?php if($clientes): ?>
          <?php foreach($clientes as $cliente): ?>
          <tr>
             <td><?php echo $cliente['cont_id']; ?></td>
             <td><?php echo $cliente['cliente_id']; ?></td>
             <td><a href="<?php echo base_url('contratos/editar/'.$cliente['cont_id']);?>"><?php echo $cliente['username']; ?></a></td>
             <td><?php echo number_format($cliente['cont_valor'], 2, ',', '.'); ?></td>
             <td>
              <a href="<?php echo base_url('contratos/consultar/'.$cliente['cont_id']);?>" class="btn btn-secondary btn-sm">Consultar</a>   
              <a href="<?php echo base_url('contratos/editar/'.$cliente['cont_id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('contratos/deletar/'.$cliente['cont_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
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