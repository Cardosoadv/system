<!-- Inicio do Modal -->
<div class="modal fade" id="modal_despesa" name="modal_despesa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Despesa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_despesa" name="form_despesa" action="<?= site_url('/despesas/salvardespesa') ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Despesa</label>
                            <div class="input-group">
                                <input type="hidden" name="despesas_id" placeholder="despesas_id" class="form-control" value="">
                                <input type="text" name="despesa" placeholder="Descreva a despesa" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Data de Vencimento</label>
                            <div class="input-group">
                                <input type="date" name="data_vencimento" value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-4" id = "botaoLancarpagamento">
                        <label> </label>    
                        <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-secondary active"  >
                                    <input type="checkbox" name="pgtoRealizado" id="pgtoCheckbox" onChange="pagto()">
                                    Preencher data de Pagamento</label>
                            </div>
                        </div>

                        <div class="form-group col-md-8" id="informacoesPagamento" style="display: none">
                            <label>Data de Pagamento</label>
                            <div class="input-group">

                                <input type="date" name="data_pagamento" value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col">
                            <label>Conta</label>
                            <div class="input-group">
                                <?= $id_conta ?>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label>Rubrica</label>
                            <div class="input-group">
                                <?= $id_rubrica ?>
                            </div>
                        </div>

                        <div class="form-group col">
                            <label>Tipo de Despesa</label>
                            <div class="input-group">
                                <?= $id_tipo_despesa ?>
                            </div>
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

                    <div class= "row">
                                <div class="align-self-center form-group col">
                                    
                                    <input type="range" name="rateioSlider" value="50" min="0" max="100" class="container-fluid" oninput="fabiano.value=value; rodrigo.value = 100 - value" onchange="fabiano.value=value; rodrigo.value = 100 - value">
                               
                                    </div>
                                <div class= "col">
                                    <div class="form-group col">
                                        <label>Fabiano</label>    
                                        <input type="text" id="fabiano" value="50" readonly>
                                    </div>
                                    <div class="form-group col">
                                        <label>Rodrigo</label>    
                                        <input type="text" id="rodrigo" value="50" readonly>
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
<script>
    function pagto() {

        var pgtoCheckbox = document.getElementById("pgtoCheckbox");
        if (pgtoCheckbox.checked === true) {
            var informacoesPagamento = document.getElementById("informacoesPagamento");
            informacoesPagamento.style.display = "block";

        } else {
            this.informacoesPagamento.style.display = "none";
        }
    }
</script>


<!--Fim do Modal-- >