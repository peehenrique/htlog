<section class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"><?php echo $titulo; ?></h4>
      </div>
      <div class="card-content">
        <div class="card-body">

          <?php
          getMsg('msgCadastro');
          ?>
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th scope="col">Numero do pedido</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($pedidos as $pedido): ?>

                  <tr>
                    <td><?php echo $pedido->ref; ?></td>
                    <td><?php echo $pedido->titulo_status; ?></td>
                    <td class="text-right">
                      <a href="<?php echo base_url('admin/pedidos/mudar/'.$pedido->id.'') ?>" class="btn btn-primary btn-mudar-status-pedido">Mudar Status</a>
                      <a href="<?php echo base_url('admin/pedidos/visualizar/'.$pedido->id.'') ?>" class="btn btn-success">Visualizar Pedido</a>
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


<div class="modal_dinamico">

</div>
