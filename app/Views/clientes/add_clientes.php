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
            <h1>Novo Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Novo Cliente</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

  <div class="container mt-5">
    <form method="post" id="add_create" name="add_create" 
    action="<?= site_url('/clientes/store') ?>">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" name="c_name" class="form-control">
      </div>

      <div class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask>
      </div>

      <div class="form-group">
        <label>CNPJ</label>
        <input type="text" name="cnpj" class="form-control"  data-inputmask='"mask": "999.999.999/9999-99"' data-mask>
      </div>

      <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="c_phone" class="form-control"  data-inputmask='"mask": "(99) 99999-9999"' data-mask>
      </div>

      <div class="form-group">
        <label>E-mail</label>
        <input type="text" name="c_email" class="form-control">
      </div>


      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Salvar Cliente</button>
      </div>
    </form>
  </div>

<?= $this->include('layouts/footer') ?>