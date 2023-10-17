<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

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
              <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
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
          <form method="post" id="inserir" name="inserir" action="<?= site_url('/clientes/adicionar') ?>" enctype="multipart/form-data">
            <div class="row">

              <div class="form-group col-5">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
              </div>

              <div class="form-group col">
                <label>username</label>
                <input type="text" name="username" class="form-control">
              </div>

            </div>

            <div class="form-row">

              <div class="form-group col">
                <label>Imagem</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="img" name="img">
                    <label class="custom-file-label" for="img">Arquivo</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="form-group col">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control col" data-inputmask='"mask": "999.999.999-99"' data-mask>
              </div>

              <div class="form-group col">
                <label>CNPJ</label>
                <input type="text" name="cnpj" class="form-control col" data-inputmask='"mask": "999.999.999/9999-99"' data-mask>
              </div>
            </div>

            <div class="form-row">

              <div class="form-group col">
                <label>Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control">
              </div>

              <div class="form-group col">
                <label>Telefone</label>
                <input type="text" name="telefone" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
              </div>

            </div>
            <div class="form-row">

              <div class="form-group col">
                <label>E-mail</label>
                <input type="email" name="email" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block mt-5">Salvar Cliente</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>

  <?= $this->include('layouts/footer') ?>

  </body>

</html>