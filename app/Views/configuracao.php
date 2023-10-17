<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

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
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- inicio do painel superior-->
        <div class="row">
          <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <div class="inner">
                <h3>Rubricas</h3>
              </div>
              <div class="icon">
                <i class="ion ion-chevron-down"></i>
              </div>
              <a href="<?php echo site_url('configuracao/rubrica') ?>" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>Bancos</h3>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo site_url('configuracao/bancos') ?>" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Tipo da Despesa</h3>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="<?php echo site_url('configuracao/tipodadespesa') ?>" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <p>Despesas</p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a href="<?php echo site_url('configuracao/rubricas') ?>" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



        </div>
        <!-- fim do painel superior-->
        <div class="row">




        </div>


      </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  </div>
  <?= $this->include('layouts/footer') ?>

  </body>

</html>