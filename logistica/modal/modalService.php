<h4>Recomendacion de service del modelo
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Ver</button>
</h4>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Logistica</h4>
    </div>
    <div class="modal-body">
        <?php foreach($recomendacion as $rec){ 
            switch($rec['modelo']){
                case $rec['modelo']=='1634':
                //  
                    echo '<caption>Recomendado para el modelo</caption>';
                    echo '<table class="table table-bordered table-striped text-left">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Service</th>';
                    echo '<th>Km recomendados</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>Cambio de aceite</td>';  
                    echo '<td>5000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Cambio de filtro</td>';  
                    echo '<td>15000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Direccion</td>';  
                    echo '<td>30000</td>'; 
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                //
            break;
            case $rec['modelo']=='Daily':
                                //  
                    echo '<caption>Recomendado para el modelo</caption>';
                    echo '<table class="table table-bordered table-striped text-left">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Service</th>';
                    echo '<th>Km recomendados</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>Cambio de aceite</td>';  
                    echo '<td>6000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Cambio de filtro</td>';  
                    echo '<td>20000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Direccion</td>';  
                    echo '<td>40000</td>'; 
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                //
                break;
            case $rec['modelo']=='1710':
                                //  
                    echo '<caption>Recomendado para el modelo</caption>';
                    echo '<table class="table table-bordered table-striped text-left">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Service</th>';
                    echo '<th>Km recomendados</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    echo '<tr>';
                    echo '<td>Cambio de aceite</td>';  
                    echo '<td>7000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Cambio de filtro</td>';  
                    echo '<td>20000</td>'; 
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Direccion</td>';  
                    echo '<td>35000</td>'; 
                    echo '</tr>';
                    echo '</tbody>';
                    echo '</table>';
                //
                break;
            }}
        ?>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>