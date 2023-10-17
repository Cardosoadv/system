
<?php
foreach ($backlogs as $backlog) : ?>
    <!-- Inicio da Tarefa -->
    <div class="tarefa" id="<?php echo $backlog['id'] ?>" draggable="true" ondragstart="drag(event,<?= $backlog['id'] ?>)">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h5 class="card-title"><?php echo $backlog['task'] ?></h5>
                <div class="card-tools">
                    <a class="btn btn-tool btn-link"><?php echo $backlog['id'] ?></a>
                    <a class="btn btn-tool" onclick="tarefas.edit(<?= $backlog['id'] ?>)">
                        <i class="fas fa-pen"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <p> <?php echo $backlog['detalhes'] ?></p>
            </div>
        </div>
    </div><br/>
    <!-- Fim da Tarefa-->
<?php endforeach; ?>
