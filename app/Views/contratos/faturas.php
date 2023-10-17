<table class="table table-bordered" id="faturas-lista">
       <thead>
          <tr>
             <th>Fatura Id</th>
             <th>Emissão</th>
             <th>Vencimento</th>
             <th>Valor</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody> 
          <?php if($faturas): ?>
          <?php foreach($faturas as $fatura): ?>
          <tr class="<?php
            $fat_pag = array_column($pagamentos, 'fatura_id');

            if(in_array($fatura['fat_id'],$fat_pag)){
            echo 'bg-success';
            }elseif($fatura['fat_vencimento']<$hoje){
            echo 'bg-danger';    
            }?>">
             <td><?php echo $fatura['fat_id']; ?></td>
             <td><?php echo date_format(new DateTime($fatura['fat_emissao']), 'd/m/Y'); ?></td>
              <td><?php echo date_format(new DateTime($fatura['fat_vencimento']), 'd/m/Y'); ?></td>
             <td><?php echo number_format($fatura['fat_valor'], 2, ',', '.'); ?></td>
             <td>
              <a data-toggle="modal" data-target="#pagar-fatura" class="btn btn-success btn-sm" onclick="pagarFatura('<?php echo $fatura['fat_id']; ?>')">Pagar</a>   
              <a href="<?php echo base_url('faturas/editar/'.$fatura['fat_id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('faturas/deletar/'.$fatura['fat_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
          
       </tbody>
     </table>           

