<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> <?= $title ?> </title>

  <?= $this->include('layouts/header') ?>

  <script type="text/javascript">
  function edit(id)
    {
      save_method = 'update';
      $('#form_processo')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('processo/ajax_editar')?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="processo_id"]').val(data.id);
            $('[name="processo_no"]').val(data.processo_no);
            $('[name="cliente_id"]').val(data.cliente_id);
            $('[name="observacao"]').val(data.observacao);

            $('#modal_processo').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('<?= lang('App.Processo.editarProcesso')?>'); // Set title to Bootstrap modal title
            document.getElementById('form_processo').action = "<?= site_url('/processo/editar/') ?>"+id;

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
              <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


      <a data-toggle="modal" data-target="#modal_processo" class="btn btn-success mb-2">Novo Processo</a>
      </div>
      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
      }
      ?>
      <div class="mt-3">
        <table class="table table-bordered" id="contratos-lista">
          <thead>
            <tr>
              <th>Nº Processo</th>
              <th>Cliente</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>

            <?php if ($processos) : ?>
              <?php foreach ($processos as $processo) : ?>
                <tr>
                  <td><?php echo $processo['processo_no']; ?></td>
                  <td><?php echo $processo['nome']; ?></td>
                  <td>
                    <a class="btn btn-primary btn-sm" onclick="edit(<?=$processo['id']?>)">Editar</a>  
                    <a href="<?php echo base_url('processo/deletar/' . $processo['id']); ?>" class="btn btn-danger btn-sm">Deletar</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>


      <!-- Inicio do Modal -->
      <div class="modal fade" id="modal_processo" name="modal_processo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cadastrar Processo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" id="form_processo" name="form_processo" action="<?= site_url('/processo/salvar') ?>">
                <div class="row">

                  <div class="form-group">
                    <label>Processo</label>
                    <div class="input-group">
                      <input type="hidden" name="processo_id" placeholder="processo_id" class="form-control" value="">
                      <input type="text" name="processo_no" placeholder="processo_no" class="form-control" value="" data-inputmask='"mask": "9999999-99.9999.9.99.9999"' data-mask>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Observação</label>
                    <div class="input-group">
                      <input type="text" name="observacao" placeholder="observacao" value="" class="form-control">
                    </div>
                  </div>

                  <div class="form-group col">
                    <label>Cliente</label>
                    <div class="input-group">
                      <?= $cliente ?>
                    </div>
                  </div>

                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
              </form>
            </div>
          </div><!-- Fim do Modal -->
        </div>
      </div>






    </section>
  </div>

  <?= $this->include('layouts/footer') ?>

  </body>

</html>