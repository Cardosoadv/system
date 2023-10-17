<div class="modal fade" id="modal_rubrica" name="modal_rubrica">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Rubrica</h4>
                <button type="button" class="close" onClick="rubricas.close();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" id="form_rubrica" name="form_rubrica" action="<?= site_url('/configuracao/salvarrubrica/') ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Rubrica</label>
                            <div class="input-group">
                                <input type="hidden" name="rubrica_id" placeholder="rubrica_id" class="form-control" value="">
                                <input type="text" name="rubrica" placeholder="rubrica" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Código da Rubrica</label>
                            <div class="input-group">
                                <input type="text" name="cod_rubrica" placeholder="cod_rubrica" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Conta Pai</label>
                            <div class="input-group">
                                <?php echo $pai ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Elemento</label>
                            <div class="input-group">
                                <select name="elemento" class="form-control">
                                    <option value="Ativo">Ativo</option>
                                    <option value="Passivo">Passivo</option>
                                    <option value="Receita">Receita</option>
                                    <option value="Despesa">Despesa</option>
                                    <option value="Patrimônio Líquido">Patrimônio Líquido</option>
                                </select>    
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" onClick="rubricas.close();">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div> 