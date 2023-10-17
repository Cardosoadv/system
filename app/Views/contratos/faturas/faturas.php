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
            <h1><?php echo $titulo ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $titulo ?></li>
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
                  <div class="col-md-8">
                      <form method="post" id="add_create" name="add_create" 
                    action="<?= isset($fatura_obj)? site_url('/faturas/update') : site_url('/faturas/inserir') ?>">
                     <input type="hidden" name="fat_id" id="fat_id" value="<?= isset($fatura_obj)? ($fatura_obj)['fat_id'] : '' ?>"> 
                          
                          <div class="form-group">
                      <label>Contrato</label>
                      <div class="input-group">
                            <?php echo $comboContratos ?>
                            </select>
                      </div>
                        </div>
                  </div>
                      <div class="col-md-4"> 
                         <label> Adicionar Contrato  </label>
                            <a href="<?php echo site_url('/contratos/create') ?>" class="btn btn-success mb-2"> Novo Contrato </a>
                      </div>
                </div> 
<div class="row">
<div class="col-lg-6">                 
    <div class="form-group">
    <label>Emissão:</label>
    <div class="input-group">
    <div class="input-group-prepend">    
    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
    </div>
    <input type="date" name="fat_emissao" value="<?= isset($fatura_obj)? $fatura_obj['fat_emissao'] : '' ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
    </div>
    </div>
</div>
<div class="col-lg-6">     

        <label>Vencimento:</label>
        <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
        </div>
        <input type="date" name="fat_vencimento" value="<?= isset($fatura_obj)? $fatura_obj['fat_vencimento'] : '' ?>" class="form-control" data-inputmask-alias="date" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
        </div>
        </div>
</div>    
                      
                      
                      <div class="form-group">
                        <label>Valor</label>
                        <input type="double" name="fat_valor" id="fat_valor" class="form-control" value="<?= isset($fatura_obj)? number_format($fatura_obj['fat_valor'], 2, ',', '.') : '' ?>">                    
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