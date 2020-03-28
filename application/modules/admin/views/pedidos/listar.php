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
                  <th scope="col">ID</th>
                  <th scope="col">Numero do pedido</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>

                <?php foreach ($pedidos as $pedido): ?>
                  <tr>
                    <td><?php echo $pedido->id; ?></td>
                    <td> <b><?php echo $pedido->ref; ?></b> </td>
                    <?php
                    switch ($pedido->status) {
                      case 2:
                        echo '<td><p class="text-info">'.$pedido->titulo_status.'</p></td>';
                        break;
                      case 3:
                        echo '<td><p class="text-info">'.$pedido->titulo_status.'</p></td>';
                        break;
                      case 4:
                        echo '<td><p class="text-success">'.$pedido->titulo_status.'</p></td>';
                        break;

                      default:
                        echo '<td><p class="text-warning">'.$pedido->titulo_status.'</p></td>';
                        break;
                    }
                    ?>

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
