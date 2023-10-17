<!-- Inicio do Modal -->
<div class="modal fade" id="modal_fatura" name="modal_fatura">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cadastrar Fatura</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="row">
                    <div class="col">
                        <form method="post" id="form_fatura" name="form_fatura" action="<?= site_url('/faturas/salvarfatura') ?>">
                            <input type="hidden" name="fat_id" id="fat_id" value=" ">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <div class="input-group">
                                            <input type="text" name="descricao" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label>Emissão:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" name="fat_emissao" value="<?php echo date('Y-m-d', $hoje->getTimestamp())?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label>Vencimento:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="fat_vencimento" value=" " class="form-control" data-inputmask-alias="date" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lançar Contrato?</label>
                                        <div class="input-group">
                                            <a class="btn btn-success mb-2" onclick="faturas.lancarContrato()" id="lc">Lançar Contrato</a>
                                        </div>
                                    </div>
                                    <div class="form-group lancar-contrato" id="lancarContrato" style="display: none">
                                        <label>Contrato</label>
                                        <div class="input-group">
                                            <?php echo $contratos ?>
                                            </select>
                                        </div><br />

                                        <label> Adicionar Contrato </label>
                                        <a href="<?php echo site_url('/contratos/create') ?>" class="btn btn-success mb-2"> Novo Contrato </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Lançar Cliente?</label>
                                        <div class="input-group">
                                            <a class="btn btn-success mb-2" onclick="faturas.lancarCliente()" id="lcliente">Lançar Cliente</a>
                                        </div>
                                    </div>
                                    <div class="form-group lancar-cliente" id="lancarCliente" style="display: none">
                                        <label>Cliente</label>
                                        <div class="input-group">
                                            <?php echo $clientes ?>
                                            </select>
                                        </div><br />

                                        <label> Adicionar Cliente </label>
                                        <a href="<?php echo site_url('/cliente/create') ?>" class="btn btn-success mb-2"> Novo Cliente </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label>Valor</label>
                                    <input type="double" name="fat_valor" id="fat_valor" class="form-control" value="0,00">
                                </div>
                                <div class="form-group col">
                                        <label>Rubrica</label>
                                        <div class="input-group">
                                            <?php echo $rubrica ?>
                                            </select>
                                        </div><br />
                                </div>
                                <div class="form-group col">
                                <label>Parcelas </label>
                                  <select name="parcelas" id="parcelas" class="form-control">
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                  </select>
                                </div>
                                <div class="form-group col">
                                        <label>Banco</label>
                                        <div class="input-group">
                                            <?php echo $bancos ?>
                                            </select>
                                        </div><br />
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
                                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 