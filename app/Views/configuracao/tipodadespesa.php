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
      $('#form_tipo_despesa')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('configuracao/ajax_editar_tipo_despesa')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="tipo_despesa_id"]').val(data.tipo_despesa_id);
            $('[name="tipo_despesa"]').val(data.tipo_despesa);

            $('#modal_tipo_despesa').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('<?= lang('App.Configuracao.editarTipoDespesa')?>'); // Set title to Bootstrap modal title
            document.getElementById('form_tipo_despesa').action = "<?= site_url('/configuracao/editartipodadespesa/') ?>"+id;

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
        <a data-toggle="modal" data-target="#modal_tipo_despesa" class="btn btn-success mb-2">Novo Tipo da Despesa</a>
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
             <th>Tipo da Despesa</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
          <?php if($tipo_despesas): ?>
          <?php foreach($tipo_despesas as $tipo_despesa): ?>
          <tr>
             <td><?php echo $tipo_despesa['tipo_despesa']; ?></td>
             <td>
              <a class="btn btn-primary btn-sm" onclick="edit(<?=$tipo_despesa['tipo_despesa_id']?>)">Editar</a>
              <a href="<?php echo base_url('configuracao/deletetipodedespesa/'.$tipo_despesa['tipo_despesa_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>



<div class="modal fade" id="modal_tipo_despesa" name="modal_tipo_despesa">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
           <h4 class="modal-title">Cadastrar Tipo da Despesa</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
           </div>
    <div class="modal-body">
            <form method="get" id="form_tipo_despesa" name="form_tipo_despesa" action="<?= site_url('/configuracao/salvartipodedespesa/') ?>">
            <div class="row">
                <div class="form-group col-md-6">
                <label>Tipo da Despesa</label>
                <div class="input-group"> 
                <input type="hidden" name="tipo_despesa_id" placeholder="tipo_despesa_id" class="form-control" value="">    
                <input type="text" name="tipo_despesa" placeholder="tipo_despesa" class="form-control" value="">                               
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