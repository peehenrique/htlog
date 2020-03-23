<section class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Últimos pedidos</h4>
      </div>
      <div class="card-content">
        <div class="card-body">

          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th scope="col">Numero do pedido</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-center">Data enviado</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($pedidos as $pedido): ?>

                  <tr>
                    <td><?php echo $pedido->ref; ?></td>
                    <td><?php echo $pedido->titulo_status; ?></td>
                    <td><?php echo formataDataView($pedido->data_cadastro) ?></td>
                    <td class="text-right">
                      <a href="<?php echo base_url('pedidos/pedido/'.$pedido->id.'') ?>" class="btn btn-success">Visualizar Pedido</a>
                    </td>
                  </tr>

                <?php endforeach; ?>

              </tbody>

            </table>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>
