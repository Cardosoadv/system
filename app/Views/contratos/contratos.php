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

        <div class="card card-default">
            <div class="card-header">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                      <form method="post" id="add_create" name="add_create" 
                    action="<?= isset($contrato_obj)? site_url('/contratos/update') : site_url('/contratos/inserir') ?>">
                        
                        
                      <div class="form-group">
                        <label>Contrato</label>
                        <div class="input-group">
                            <input type="hidden" name="cont_id" id="cont_id" value="<?= isset($contrato_obj)? $contrato_obj['cont_id'] : '' ?>">
                        <input type="text" name="contrato" class="form-control" value="<?= isset($contrato_obj)? $contrato_obj['contrato'] : '' ?>">
                        </div>               
                     
                        <div class="form-group">
                      <label>Cliente</label>
                      <div class="input-group">
                            <?php echo $comboClientes ?>
                            </select>
                            <a href="<?php echo site_url('/clientes/create') ?>" class="btn btn-success mb-2">Novo Cliente</a>
                      </div>
                      <div class="form-group">
                        <label>Valor</label>
                        <input type="double" name="cont_valor" id="valor" class="form-control" value="<?= isset($contrato_obj)? number_format($contrato_obj['cont_valor'], 2, ',', '.') : '' ?>">                    
                      </div>
                     
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                      </div>
                    </form>
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