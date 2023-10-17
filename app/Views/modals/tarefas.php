<!-- Modal inserir e editar -->
<div class="modal fade" id="modal_tarefa" name="modal_tarefa">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="form_tarefa" name="form_tarefa" action="<?= site_url('/tarefas/salvartarefa') ?>">
                        <div class=" row">
                            <div class="form-group col-md-6">
                                <label>Tarefa</label>
                                <div class="input-group">
                                    <input type="hidden" name="id" placeholder="id" class="form-control" value="">
                                    <input type="text" name="task" placeholder="task" class="form-control" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prazo</label>
                                <div class="input-group">
                                    <input type="date" name="prazo" value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" spellcheck="false" data-ms-editor="true">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Responsavel</label>
                                <div class="input-group">
                                    <?= $Responsaveis ?>
                                </div>
                            </div>
                            <div class="form-group col">
                                <label>Prioridade</label>
                                <div class="input-group">
                                    <select name="prioridade" class="form-control" style="width: 100%;">
                                        <option value="1">Muito Baixa</option>
                                        <option value="2">Baixa</option>
                                        <option value="3">Média</option>
                                        <option value="4">Alta</option>
                                        <option value="5">Muito Alta</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label>Detalhes</label>
                                <div class="input-group">
                                    <textarea name="detalhes" placeholder="detalhes" class="form-control">

                                </textarea>
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