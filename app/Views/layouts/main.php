  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Adicionar Processo</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url()?>">Home</a></li>
              <li class="breadcrumb-item active">Adicionar Processo</li>
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
                    action="<?= site_url('/submit-form') ?>">
                      <div class="form-group">
                        <label>processo_no</label>
                        <input type="text" name="processo_no" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Cliente</label>
                        <input type="text" name="cliente" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Observação</label>
                        <input type="text" name="observacao" class="form-control">
                        <script>
                          CKEDITOR.replace( 'observacao' );
                        </script>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
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

    
