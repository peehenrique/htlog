<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p>Ola, <strong><?php echo $user->username ?></strong></p>

        <div class="col-lg-12 col-md-6 col-12">
          <div class="card">

            <div class="card-header d-flex justify-content-between align-items-end">
              <h4 class="card-title">Ultimos pedidos</h4>
            </div>
            <div class="card-content">
              <div class="card-body pb-0">
                <table class="table table-hover-animation mb-0">
                  <thead>
                    <tr>
                      <th scope="col">REF</th>
                      <th scope="col" class="text-center">Data enviado</th>
                      <th scope="col" class="text-center">Status</th>
                      <th scope="col" class="text-center">Opções</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    foreach ($pedidos as $row) {
                      echo '<tr>';
                      echo '<td>'. $row->ref .'</td>';
                      echo '<td>'. formataDataView($row->data_cadastro) .'</td>';
                      echo '<td class="text-center"><i class="fa fa-circle font-small-3 text-warning mr-50"></i>'. $row->titulo_status .'</td>';
                      echo '<td><a href="#" class="btn btn-success">Visualizar Pedido</a></td>';
                      echo "</tr>";
                    }
                    ?>
                  </tbody>

                </table>

              </div>
            </div>

          </div>
        </div>


    </div>

  </div>

</div>
