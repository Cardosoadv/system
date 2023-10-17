<?php
foreach($fazendos as $fazendo): ?>
<!-- Inicio da Tarefa -->
<div class="tarefa" id="<?php echo $fazendo['id']?>" draggable="true" ondragstart="drag(event)">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><?php echo $fazendo['task']?></h5>
            <div class="card-tools">
                <a class="btn btn-tool btn-link" onclick="tarefas.edit(<?= $fazendo['id'] ?>)"><?php echo $fazendo['id'] ?></a>
                <a class="btn btn-tool" onclick="tarefas.edit(<?= $fazendo['id'] ?>)">
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
          <p>  <?php echo $fazendo['detalhes'] ?></p>
        </div>
    </div>
</div><br/>
<!-- Fim da Tarefa-->
<?php endforeach; ?>