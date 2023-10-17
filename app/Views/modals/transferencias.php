<!-- Inicio do Modal -->
<div class="modal fade" id="modal_transferencia" name="modal_transferencia">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Transferencia</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="transferencias.close();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_transferencia" name="form_transferencia" action="<?= site_url('/transferencias/salvartransferencia') ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Transferencia</label>
                            <div class="input-group">
                                <input type="hidden" name="transf_id" placeholder="transf_id" class="form-control" value="">
                                <input type="text" name="descricao" placeholder="Descreva a transferencia" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Data da Transferencia</label>
                            <div class="input-group">
                                <input type="date" name="data" value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                    </div>
                        <div class="form-group col">
                            <label>Origem</label>
                            <div class="input-group">
                                <?= $origem ?>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label>Destino</label>
                            <div class="input-group">
                                <?= $destino ?>
                            </div>
                        </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Valor</label>
                            <div class="input-group">
                                <input type="text" name="valor" class="form-control">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" onClick="transferencias.close();">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Fim do Modal-- >