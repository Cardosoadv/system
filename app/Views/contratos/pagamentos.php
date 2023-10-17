<table class="table table-bordered" id="pagamentos-lista">             
       <thead>
          <tr>
             <th>Pagamento Id</th>
             <th>Id da Fatura</th>
             <th>Fatura</th>
             <th>Nº Documento</th>
             <th>Valor</th>
             <th>Data</th>
             <th>Ação</th>
          </tr>
       </thead>
       <tbody>
           
          <?php if($pagamentos): ?>
          <?php foreach($pagamentos as $pagamento): ?>
          <tr>
             <td><?php echo $pagamento['pag_id']; ?></td>
             <td><?php echo $pagamento['fatura_id']; ?></td>
             <td><?php echo $pagamento['pag_doc']; ?></td>
             <td><?php echo number_format($pagamento['pag_valor'], 2, ',', '.'); ?></td>
             <td><?php echo date_format(new DateTime($pagamento['pag_data']), 'd/m/Y'); ?></td>
             <td>
              <a href="<?php echo base_url('pagamentos/editar/'.$pagamento['pag_id']);?>" class="btn btn-primary btn-sm">Editar</a>
              <a href="<?php echo base_url('pagamentos/deletar/'.$pagamento['pag_id']);?>" class="btn btn-danger btn-sm">Deletar</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
          
          
       </tbody>
     </table>      

