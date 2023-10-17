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
            <h1>Editar Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

  <div class="container mt-5">
    <form method="post" id="update_cliente" name="update_cliente" 
    action="<?= site_url('/clientes/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $cliente['id']; ?>">

      <div class="form-group">
        <label>Imagem</label>
        <?=$mime?>
        <img scr="http://localhost/sis/writable/uploads/users/<?php echo $cliente['img'] ?>">
        <input type="text" name="nome" class="form-control" value="<?php echo $cliente['nome']; ?>">
      </div>
      
     
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Savar</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
 
  <?= $this->include('layouts/footer') ?>

  </body>

</html>