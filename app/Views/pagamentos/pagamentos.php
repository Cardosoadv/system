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
              <form method="post" id="pagamentos" name="pagamentos" 
                    action="<?= isset($pagamento_obj)? site_url('/pagamentos/update') : site_url('/pagamentos/inserir') ?>">

                <div class="form-row">
                      <div class="form-group col">
                        <label>Fatura</label>
                        <div class="input-group">
                              <?php echo $faturas ?>
                              </select>
                              <a href="<?php echo site_url('/clientes/create') ?>" class="btn btn-success mb-2">Novo Cliente</a>
                        </div>
                      </div>

                      <div class="form-group  col">
                        <label>Nº Documento</label>
                        <div class="input-group">
                          <input type="hidden" name="pag_id" id="pag_id" value="<?= isset($pagamento_obj)? $pagamento_obj['pag_id'] : '' ?>">
                          <input type="int" name="pag_doc" class="form-control" value="<?= isset($pagamento_obj)? $pagamento_obj['pag_doc'] : '' ?>">
                        </div>
                      </div>  
                </div>
                <div class="form-row">
                      <div class="form-group  col">
                        <label>Valor</label>
                        <input type="double" name="pag_valor" id="pag_valor" class="form-control" value="<?= isset($pagamento_obj)? number_format($pagamento_obj['pag_valor'], 2, ',', '.') : '' ?>">                    
                      </div>
                     
                      <div class="form-group  col">
                        <label>Data do Pagamento</label>
                      <input type="date" name="pag_data" value="<?= isset($pagamento_obj)? $pagamento_obj['pag_data'] : '' ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                      </div>

                      <div class="form-group  col">
                        <label>Conta</label>
                        <div class="input-group">
                              <?php echo $bancos ?>
                              </select>
                        </div>
                      </div>
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