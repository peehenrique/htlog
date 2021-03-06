
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
          <a href="<?php echo base_url('admin/produtos/modulo') ?>" class="btn btn-success mt-2 right">Novo produto</a>
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
                  <th scope="col">Nome</th>
                  <th scope="col">Empresa</th>
                  <th scope="col">Categoria</th>
                  <th scope="col">Estoque</th>
                  <th scope="col" class="text-center">Status</th>
                  <th scope="col" class="text-right">Opções</th>
                </tr>
              </thead>

              <tbody>
                <?php
                foreach ($produtos as $row) {
                  echo '<tr>';
                  echo '<td>'. $row->id .'</td>';
                  echo '<td>'. $row->nome_produto .'</td>';
                  echo '<td>'. $row->nome_marca .'</td>'; // marca
                  echo '<td>'. $row->nome .'</td>'; //categoria
                  echo '<td>'. ($row->controlar_estoque == 1 ? $row->estoque : 'Nao controla estoque').'</td>';
                  echo '<td class="text-center">'. ($row->ativo == 1? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>').'</td>';
                  echo "<td class='text-right'>";
                  echo '<a href="'. base_url('admin/produtos/modulo/'. $row->id).'" title="Editar" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light" style="margin-right:5px"><i class="fa fa-pencil-square"></i></button>';
                  echo '<a href="'. base_url('admin/produtos/del/'. $row->id).'" title="Apagar" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light btn-apagar-registro"><i class="fa fa-trash-o"></i></button>';
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
