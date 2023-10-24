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
          
          <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          ?>
          <div class="mt-3">

          <h1>Importar Despesas</h1>
          <form action="<?= site_url('/upload/despesas');?>" name="importDespesas" id="importDespesas" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <input type="file" name="import" />
          <input type="submit" value="Enviar" />
          </form>
          <br>
          <h1>Importar Receitas</h1>
          <form action = "<?= site_url('/upload/receitas');?>" name="import" id="import" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          <input type="file" name="import" />
          <input type="submit" value="Enviar" />
          </form>


          </div>
        </div>
     



    </section>
  </div>
  <?= $this->include('layouts/footer') ?>

  </body>

</html>