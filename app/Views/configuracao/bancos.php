<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?>  </title>
  
<?= $this->include('layouts/header') ?>

<script type="text/javascript">
  function edit(id)
    {
      save_method = 'update';
      $('#form_banco')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('configuracao/ajax_editar_banco')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            var X = data.saldo_inicial;
            var Y = X.replace(".",",");
            console.log(Y);
            $('[name="banco_id"]').val(data.banco_id);
            $('[name="banco"]').val(data.banco);
            $('[name="agencia"]').val(data.agencia);
            $('[name="conta"]').val(data.conta);
            $('[name="saldo_inicial"]').val(Y);

            $('#modal_banco').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('<?= lang('App.Configuracao.editarBancos')?>'); // Set title to Bootstrap modal title
            document.getElementById('form_banco').action = "<?= site_url('/configuracao/editarbanco/') ?>"+id;

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            alert('Erro receber dados do AJAX');
        }
    });
    }
</script>

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


<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a data-toggle="modal" data-target="#modal_banco" class="btn btn-success mb-2">Nova Conta</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="bancos-list">
       <thead>
          <tr>
             <th>Banco</th>
             <th>Agencia</th>
             <th>Conta</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
          <?php if($bancos): ?>
          <?php foreach($bancos as $banco): ?>
          <tr>
             <td><?php echo $banco['banco']; ?></td>
             <td><?php echo $banco['agencia']; ?></td>
             <td><?php echo $banco['conta']; ?></td>
             <td>
              <a class="btn btn-primary btn-sm" onclick="edit(<?=$banco['banco_id']?>)">Editar</a>
              <a href="<?php echo base_url('configuracao/deletebanco/'.$banco['banco_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>



<div class="modal fade" id="modal_banco" name="modal_banco">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
           <h4 class="modal-title">Cadastrar Banco</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>
    <div class="modal-body">
            <form method="get" id="form_banco" name="form_banco" action="<?= site_url('/configuracao/salvarbanco/') ?>">
            <div class="row">
                <div class="form-group col-md-6">
                <label>Banco</label>
                <div class="input-group"> 
                <input type="hidden" name="banco_id" placeholder="banco_id" class="form-control" value="">    
                <input type="text" name="banco" placeholder="banco" class="form-control" value="">                               
                </div>
                </div>
                <div class="form-group col-md-6">
                <label>Agencia</label>
                <div class="input-group">
                <input type="text" name="agencia" placeholder="agencia" class="form-control" value="">
                </div>
                </div>
                <div class="form-group col-md-6">
                <label>Conta</label>
                <div class="input-group">
                <input type="text" name="conta" placeholder="conta" class="form-control" value="">
                </div>
                </div>
                </div>
                <div class="row">    
                <div class="form-group col">
                <label>Saldo Inicial</label> 
                        <input type="text" name="saldo_inicial" placeholder="saldo_inicial" class="form-control" value="0,00">                    
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
    </section>
  </div>
<?= $this->include('layouts/footer') ?>
</body>

</html>