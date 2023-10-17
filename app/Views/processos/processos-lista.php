
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


        <a href="<?php echo site_url('/pagamentos/salvar') ?>" class="btn btn-success mb-2">Novo Pagamento</a>
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
             <th>Processo Id</th>
             <th>Nº Processo</th>
             <th>Observação</th>
             <th>Cliente Id</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
           
          <?php if($processos): ?>
          <?php foreach($processos as $processo): ?>
          <tr>
             <td><?php echo $processo['id']; ?></td>
             <td><?php echo $processo['processo_no']; ?></td>
             <td><a href="#" alt= "<?php echo $processo['observacao']; ?>"><i class="bi bi-chat-dots"></i></>a> </td>
             <td><?php echo $processo['cliente_id']; ?></td>
             <td>
              <a href="<?php echo base_url('processos/editar/'.$processo['id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('processos/deletar/'.$processo['id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<?= $this->include('layouts/footer') ?>