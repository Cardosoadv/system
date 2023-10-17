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


        <a href="<?php echo site_url('/faturas/salvar') ?>" class="btn btn-success mb-2">Nova Fatura</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
     <?php $Saldo = array_sum($saldo_inicial);
     $total_pagamentos = 0;
     $total_despesas=0;     
     ?>
<h4> Despesas </h4>
  <div class="mt-3">
     <table class="table table-bordered" id="despesas-lista">
       <thead>
          <tr>
             <th>Data</th>
             <th>Despesa</th>
             <th>Valor</th>
          </tr>
       </thead>
       <tbody>
      
          <?php if($despesas): ?>
          <?php foreach($despesas as $despesa): ?>
          <tr>
             <td><?php echo date_format(new DateTime($despesa['data_pagamento']), 'd/m/Y'); ?></td>
             <td><?php echo $despesa['despesa']; ?></td>
             <td>R$ <?php echo number_format($despesa['valor'], 2, ',', '.'); ?></td>
             <?php $total_despesas = $total_despesas +$despesa['valor'];?>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
            <tfoot>
              <tr>
<tf> </tf>
<tf>Valor Total da Despesa</tf>
<tf>
R$ <?php echo number_format($total_despesas, 2, ',', '.'); ?>
</tf>

              </tr>
            </tfoot>


     </table>
  </div>
  <h4> Pagamentos </h4>
  <div class="mt-3">
     <table class="table table-bordered" id="Pagamentos-lista">
       <thead>
          <tr>
             <th>Data</th>
             <th>Pagamento</th>
             <th>Valor</th>
          </tr>
       </thead>
       <tbody>
      
          <?php if($pagamentos): ?>
          <?php foreach($pagamentos as $pagamento): ?>
          <tr>
             <td><?php echo date_format(new DateTime($pagamento['pag_data']), 'd/m/Y'); ?></td>
             <td><?php echo $pagamento['contrato']; ?></td>
             <td>R$ <?php echo number_format($pagamento['pag_valor'], 2, ',', '.'); ?></td>
             <?php $total_pagamentos = $total_pagamentos +$pagamento['pag_valor'];?>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
            <tfoot>
              <tr>
<tf> </tf>
<tf>Valor Total dos Recebimentos</tf>
<tf>
 R$ <?php echo number_format($total_pagamentos, 2, ',', '.'); ?>
</tf>

              </tr>
            </tfoot>


     </table>
  </div>
<h4> Saldo da Conta </h4> R$<?php
echo number_format(($Saldo + $total_pagamentos - $total_despesas), 2, ',', '.');
?>



</div>
 
<?= $this->include('layouts/footer') ?>

</body>

</html>