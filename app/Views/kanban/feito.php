<?php
foreach ($feitos as $feito) : ?>
    <!-- Inicio da Tarefa -->
    <div class="tarefa" id="<?php echo $feito['id'] ?>" draggable="true" ondragstart="drag(event)" droppable="false">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h5 class="card-title"><?php echo $feito['task'] ?></h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-link" onclick="tarefas.edit(<?= $feito['id'] ?>)"><?php echo $feito['id'] ?></a>
                    <a class="btn btn-tool" onclick="tarefas.edit(<?= $feito['id'] ?>)">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $feito['detalhes'] ?>
                </p>
            </div>
        </div>
    </div> <br />
    <!-- Fim da Tarefa-->
<?php endforeach; ?>