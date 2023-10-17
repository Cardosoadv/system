<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')?>">
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
                <h3>150</h3>
                <p>Tarefas</p>
              </div>
              <div class="icon">
                <i class="ion ion-chevron-down"></i>
              </div>
              <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>
                <p>Receitas</p>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
              </div>
              <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="#" class="small-box-footer">Veja mais <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
        <!-- fim do painel superior-->
        <div class="row">

        <div class="form-group col">
          <label>Responsáveis</label>
          <div class="input-group">
          <select name="responsavel[]" id="responsaveis" class="responsaveis" multiple="multiple" style="width: 100%">
          </select>
          </div>
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

  <script src="<?= base_url('plugins/select2/js/select2.full.min.js')?>"></script>
  <script>
    $(document).ready(function () {
    //Initialize Select2 Elements
    $('#responsaveis').select2({
    ajax: {
    url: "<?= base_url('testes/ajax_advogados/')?>",
    dataType: "JSON",
    delay: 250,
    minimumInputLength: 3,  


    processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      console.log(data);
      return {
        results: data.username
      };
      
    }
  }
});
  });
  </script>


  </body>

</html>