<?php
foreach($cancelados as $cancelado): ?>
<!-- Inicio da Tarefa -->
<div class="tarefa" id="<?php echo $cancelado['id']?>" draggable="true" ondragstart="drag(event)">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><?php echo $cancelado['task']?></h5>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-link"><?php echo $cancelado['id'] ?></a>
                <a class="btn btn-tool" onclick="tarefas.edit(<?= $cancelado['id'] ?>)">
                        <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php echo $cancelado['detalhes'] ?>
        </div>
    </div>
</div>
<!-- Fim da Tarefa-->
<?php endforeach; ?>