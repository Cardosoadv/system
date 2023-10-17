<!-- Versão funcional em 23/02/2022  -->
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
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
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
        <a href="<?php echo site_url('/clientes/create') ?>" class="btn btn-success mb-2">Novo Cliente</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="clientes-list">
       <thead>
          <tr>
             <th>Cliente Id</th>
             <th>Nome</th>
             <th>CPF</th>
             <th>CNPJ</th>
             <th>Telefone</th>
             <th>E-mail</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($clientes): ?>
          <?php foreach($clientes as $cliente): ?>
          <tr>
             <td><?php echo $cliente['id']; ?></td>
             <td><?php echo $cliente['c_name']; ?></td>
             <td><?php echo $cliente['cpf']; ?></td>
             <td><?php echo $cliente['cnpj']; ?></td>
             <td><?php echo $cliente['c_phone']; ?></td>
             <td><?php echo $cliente['c_email']; ?></td>
             <td>
              <a href="<?php echo base_url('clientes/singlecliente/'.$cliente['id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('clientes/delete/'.$cliente['id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#clientes-list').DataTable();
  } );
</script>
      </div>
    </section>
  </div>
  
<?= $this->include('layouts/footer') ?>