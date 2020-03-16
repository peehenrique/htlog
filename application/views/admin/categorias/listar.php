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
          <a href="<?php echo base_url('admin/categorias/modulo') ?>" class="btn btn-success mt-2 right">Nova categoria</a>
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
                  <th scope="col">ID</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Categoria Pai</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($categorias as $row) {
                  echo '<tr>';
                  echo '<td>'. $row->id .'</td>';
                  echo '<td>'. $row->nome .'</td>';
                  echo '<td>'. $this->categorias_model->getCatPaiNome($row->id_cat_pai) .'</td>';
                  echo '<td class="text-center">'. ($row->ativo == 1? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>').'</td>';
                  echo "<td class='text-right'>";
                  echo '<a href="'. base_url('admin/categorias/modulo/'. $row->id).'" title="Editar" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" style="margin-right:5px"><i class="fa fa-pencil-square"></i></button>';
                  echo '<a href="'. base_url('admin/categorias/del/'. $row->id).'" title="Apagar" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light btn-apagar-registro"><i class="fa fa-trash-o"></i></button>';
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
