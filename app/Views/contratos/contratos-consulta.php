<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?>  </title>
  
<?= $this->include('layouts/header') ?>
<script>
function pagarFatura(valor) {
    document.getElementById('faturaPaga').value = valor;
}
</script>
<?= $this->include('layouts/sidebars') ?>
<?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
      $vencimento = $hoje->addMonths(1);
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

                                  <form id="consulta" name="consulta">                       
                                  <div class="form-group">
                                    <label>Contrato</label>
                                    <div class="input-group">
                                        <input type="hidden" name="cont_id" id="cont_id" value="<?= isset($contrato_obj)? $contrato_obj['cont_id'] : '' ?>" disabled>
                                        <input type="text" name="contrato" class="form-control" value="<?= isset($contrato_obj)? $contrato_obj['contrato'] : '' ?>" disabled>
                                    </div>
                                  </div>
                                <div class="form-group">
                                        <label>Cliente</label>
                                        <div class="input-group">
                                              <input type="text" name="contrato" class="form-control" value="<?= isset($cliente)? $cliente['username'] : '' ?>" disabled>
                                              <a href="<?php echo site_url('/clientes/create') ?>" class="btn btn-success mb-2">Novo Cliente</a>
                                        </div>
                                </div>
                                  <div class="form-group">
                                    <label>Valor</label>
                                        <div class="input-group">
                                        <input type="double" name="cont_valor" id="valor" class="form-control" value="<?= isset($contrato_obj)? number_format($contrato_obj['cont_valor'], 2, ',', '.') : '' ?>" disabled>                    
                                        </div>
                                  </div>
                                </form>
                              </div>
                            </div><br>
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#emitir-fatura">
Nova Fatura
</button>
                           
                        <!-- Fim Exibição dos Contratos -->
                        <div class="row">   
                      <!-- Inicio das Faturas -->     
                                    <div class="col-sm-6">
                                        <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                        Faturas deste Contrato
                                            </h3>
                                        </div>
                                                                                     
                                        <?php  if (isset($faturas)){
                                        if (empty($faturas)){
                                            echo '<p>    Nenhuma fatura a exibir! </p>';
                                            } else {
                                            echo    $this->include('contratos/faturas');
                                            }
                                        }
                                        ?>
                                    
                                        
                                    </div>
                                    </div>
                                    <!-- Inicio dos Pagamentos -->
                                    <div class="col-sm-6">  
                                       <div class="card">
                                        <div class="card-header">
                                        <h3 class="card-title">
                                            Pagamentos deste Contrato
                                        </h3>
                                        </div>
                                    <?php if (isset($pagamentos)){
                                        if (empty($pagamentos)){
                                            echo '<p> Nada a exibir! </p>';
                                            } else { 
                                            echo $this->include('contratos/pagamentos');
                                            }
                                    }
                                     ?>
                                    </div>
                                    </div>
                        </div>
                </div>
            </div>
        </div>
      </div>        
    </section>
  </div>

<div class="modal fade" id="emitir-fatura">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <div class="modal-header">
<h4 class="modal-title">Nova Fatura</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

    <form method="post" id="nova_fatura" name="nova_fatura" action="<?= site_url('/faturas/a_inserir') ?>">
        <div class="form-group">
        <label>Contrato</label>
        <div class="input-group">
        <input type="number" name="contrato_id" id="contrato_id" value="<?php echo $contrato_obj['cont_id'] ?>" class="col-lg-1" disabled>
         <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $contrato_obj['cont_id'] ?>" class="col-lg-1">

        <input type="text" name="contrato" id="contrato" value="<?php echo $contrato_obj['contrato'] ?>" class="col-lg-11" disabled>
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
    <input type="date" name="fat_emissao" value="<?= date_format($hoje, 'Y-m-d')?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
   
    </div>
    </div>
    </div>
    <div class="col-lg-6">     
        <label>Vencimento:</label>
        <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
        </div>
        <input type="date" name="fat_vencimento" value="<?= date_format($vencimento, 'Y-m-d') ?>" class="form-control" data-inputmask-alias="date" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-10">
        <div class="form-group">
        <label>Valor</label>
        <input type="double" name="fat_valor" id="fat_valor" class="form-control" value="<?= isset($fatura_obj)? number_format($fatura_obj['fat_valor'], 2, ',', '.') : '' ?>">                    
        </div>  </div>
        <div class="col-lg-2">
        <div class="form-group">
        <label>Quantidade</label>
        <select name="qte" id="qte" class="form-control" value="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        </div>
        </div>   
        </div>
</div>
        <div class="modal-footer justify-content-between">    
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
          </form>
        </div>
</div>

</div>

</div>


    <div class="modal fade" id="pagar-fatura">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
           <h4 class="modal-title">Pagamento da Fatura</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>
    <div class="modal-body">

                    <form method="post" id="pagamento-fatura" name="pagamento-fatura" 
                    action="<?= site_url('/pagamentos/a_inserir') ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                        <label>Fatura</label>
                        <div class="input-group">
                        <input type="hidden" name="cont_id" id="cont_id" value="<?php echo $contrato_obj['cont_id'] ?>">  
                        <input type="text" name="faturaPaga" id="faturaPaga" class="form-control" value="" readonly>                               
                        </div>
                        </div>
                        <div class="form-group col-md-6">
                        <label>Nº Documento</label>
                        <div class="input-group">
                        <input type="int" name="pag_doc" class="form-control" value="">
                        </div>
                        </div>
                    </div>
                    <div class="row">    
                      <div class="form-group col">
                        <label>Valor</label>
                        <input type="double" name="pag_valor" id="pag_valor" class="form-control" value="0,00">                    
                      </div>
                      <div class="form-group col">
                        <label>Data do Pagamento</label>
                      <input type="date" name="pag_data" value="<?= date_format($hoje, 'Y-m-d') ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                      </div>
                    </div> 
                    <div class="form-group  col">
                        <label>Conta</label>
                        <div class="input-group">
                              <?php echo $bancos ?>
                              </select>
                        </div>
                      </div>
    </div>
                     
    
    
        <div class="modal-footer justify-content-between">    
           <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
           <button type="submit" class="btn btn-primary">Salvar</button>
           </form>
        </div>
                      </div>
    </div>
                    </div>
</div>

<?= $this->include('layouts/footer') ?>
</body>

</html>