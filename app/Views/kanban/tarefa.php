<!-- Inicio da Tarefa -->
<div class="tarefa" id="tarefa<?php echo $tarefa['id']?>" draggable="true" ondragstart="drag(event)">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h5 class="card-title"><?php echo $tarefa['task']?></h5>
            <div class="card-tools">
                <a class="btn btn-tool btn-link" onclick="tarefa.edit(<?= $feito['id'] ?>)"><?php echo $tarefa['id'] ?></a>
                <a class="btn btn-tool" onclick="tarefa.edit(<?= $feito['id'] ?>)">
                    <i class="fas fa-pen"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
          <p>  <?php echo $tarefa['detalhes'] ?></p>
        </div>
    </div>
</div>
</div><br/>
<!-- Fim da Tarefa-->
