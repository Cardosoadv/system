<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?>  </title>
  
<?= $this->include('layouts/header') ?>

<?= $this->include('layouts/sidebars') ?>
<?php
     if(isset($_SESSION['msg'])){
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


<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a data-toggle="modal" data-target="#modal_rubrica" onClick="rubricas.novaRubrica();" class="btn btn-success mb-2">Nova Rubrica</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="bancos-list">
       <thead>
          <tr>
             <th>Rubrica</th>
             <th>Código da Rubrica</th>
             <th>Elemento</th>

          </tr>
       </thead>
       <tbody>
          <?php if($rubricas): ?>
          <?php foreach($rubricas as $rubrica): ?>
          <tr>
             <td><?php echo $rubrica['rubrica']; ?></td>
             <td><?php echo $rubrica['cod_rubrica']; ?></td>
             <td><?php echo $rubrica['elemento']; ?></td>
             <td>
             <a class="btn btn-secondary btn-sm" onclick="rubricas.filho(<?=$rubrica['rubrica_id']?>)"> +Filho </a>
             <a class="btn btn-primary btn-sm" onclick="rubricas.edit(<?=$rubrica['rubrica_id']?>)">Editar </a>
              <a href="<?php echo base_url('configuracao/deleterubrica/'.$rubrica['rubrica_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>

<?= $this->include('modals/rubrica') ?>
 
      </div>
    </section>
  </div>
<?= $this->include('layouts/footer') ?>
</body>

</html>