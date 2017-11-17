<h4>Kilometros totales por vehiculo
<button type="button" class="btn btn-link" data-toggle="modal" data-target="#modalKm">Ver</button>
</h4>
<!-- Modal -->
<div class="modal fade" id="modalKm" role="dialog">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4>Logistica</h4>
    </div>
    <div class="modal-body">
    <div class="row">
        <div class="col-xs-6 col-xs-offset-3">
            <div class="table-responsive container-fluid">
            <table class="table table-condensed  table-hover text-left">
                <caption>Kilometros totales por vehiculo</caption>
                   <thead>
                       <th>Vehiculo</th>
                       <th>Km</th>
                   </thead>
                    <?php foreach($kilometros as $km){ ?>
                    <tbody>
                    <tr>
                        <td>
                           <?php echo $km['patente'];?>   
                        </td>
                        <td>
                           <?php echo $km['km'] . " km";?>   
                        </td>
                    </tr>
                    </tbody>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    </div>
    <div class="modal-footer">
      
    </div>
  </div>
</div>
</div>                                