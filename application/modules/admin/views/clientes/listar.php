<section class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="row">
        <div class="col">
          <div class="card-header">
            <h4 class="card-title"><?php echo $titulo; ?></h4>
          </div>
        </div>
        <div class="col">
          <a href="<?php echo base_url('admin/clientes/modulo') ?>" class="btn btn-success mt-2 right">Novo Cliente</a>
        </div>
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
                  <th scope="col">Empresa</th>
                  <th scope="col">CPF</th>
                  <th scope="col">E-mail</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($clientes as $row) {
                  echo '<tr>';
                  echo '<td>'. $row->nome .'</td>';
                  echo '<td>'. $row->cpf .'</td>';
                  echo '<td>'. $row->email .'</td>';
                  echo '<td class="text-center">'. ($row->ativo == 1? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>').'</td>';
                  echo "<td class='text-right'>";
                  echo '<a href="'. base_url('admin/clientes/modulo/'. $row->id_cliente).'" title="Editar" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" style="margin-right:5px"><i class="fa fa-pencil-square"></i></button>';
                  echo '<a href="'. base_url('admin/clientes/del/'. $row->id_cliente).'" title="Apagar" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light btn-apagar-registro"><i class="fa fa-trash-o"></i></button>';
                  echo "</td>";
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
</section>
