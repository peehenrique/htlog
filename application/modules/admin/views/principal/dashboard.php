<section id="dashboard-ecommerce">
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-primary p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-users text-primary font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1"><?php echo $t_pedidos ?></h2>
          <p class="mb-2">Pedidos</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-success p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-credit-card text-success font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1"><?php echo $t_clientes ?></h2>
          <p class="mb-2">Clientes</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-danger p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1"><?php echo $t_produtos ?></h2>
          <p class="mb-2">Produtos</p>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header d-flex flex-column align-items-start pb-0">
          <div class="avatar bg-rgba-warning p-50 m-0">
            <div class="avatar-content">
              <i class="feather icon-package text-warning font-medium-5"></i>
            </div>
          </div>
          <h2 class="text-bold-700 mt-1"><?php echo $t_categorias ?></h2>
          <p class="mb-2">Categorias</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-12">
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
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($pedidos as $row) {
                  echo '<tr>';
                  echo '<td>'. $row->ref .'</td>';
                  echo '<td class="text-center">'. formataDataView($row->data_cadastro) .'</td>';
                  switch ($row->status) {
                    case 4:
                    echo '<td class="text-center"><i class="fa fa-circle font-small-3 text-success mr-50"></i>'. $row->titulo_status .'</td>';
                    break;

                    default:
                    echo '<td class="text-center"><i class="fa fa-circle font-small-3 text-warning mr-50"></i>'. $row->titulo_status .'</td>';
                    break;
                  }
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>

            <a href="<?php echo base_url('admin/pedidos') ?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light center">Visualizar todos os pedidos</a>
          </div>
        </div>

      </div>
    </div>

    <div class="col-lg-6 col-md-6 col-12">
      <div class="card">

        <div class="card-header d-flex justify-content-between align-items-end">
          <h4 class="card-title">Ultimos clientes</h4>
        </div>
        <div class="card-content">
          <div class="card-body pb-0">
            <table class="table table-hover-animation mb-0">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Data Cadastro</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($clientes as $row) {
                  echo '<tr>';
                  echo '<td>'. $row->nome .'</td>';
                  echo '<td>'. formataDataView($row->data_cadastro) .'</td>';
                  echo "</tr>";
                }
                ?>
              </tbody>

            </table>

            <a href="<?php echo base_url('admin/clientes') ?>" class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light center">Visualizar todos os clientes</a>

          </div>
        </div>

      </div>
    </div>




  </div>

</section>
<!-- Dashboard Ecommerce ends -->
