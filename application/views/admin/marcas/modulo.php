



















<section>
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
    <div class="row">
      <div class="col">
        <div class="card-header">
          <h4 class="card-title"><?php echo $titulo; ?></h4>
        </div>
      </div>

      <div class="col">
        <a href="<?php echo base_url('admin/marcas/') ?>" class="btn btn-success mt-2 right">Voltar para empresas</a>
      </div>

    </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="<?php echo base_url('admin/marcas/core'); ?>" method="post">
              <?php if ($dados) { ?>
                <input type="hidden" name="id_marca" value="<?= $dados->id; ?>">
              <?php  }  ?>

              <?php
              errosValidacao();
              getMsg('msgCadastro');
              ?>

              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="nome">Nome da Empresa</label>
                      <input type="text" name="nome_marca" class="form-control" placeholder="Nome*" value="<?php echo ( $dados != NULL ? $dados->nome_marca : set_value('nome_marca')); ?>">
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="controlar_estoque">Status da Empresa</label>
                      <select class="custom-select form-control" name="ativo">
                        <?php if($dados) { ?>
                          <option value="0" <?= ($dados->ativo == 0 ? 'selected="selected"' : '') ?>>Inativo</option>
                          <option value="1" <?= ($dados->ativo == 1 ? 'selected="selected"' : '') ?>>Ativo</option>
                        <?php } else{ ?>
                          <option value="0" >Inativo</option>
                          <option value="1" selected="selected">Ativo</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>


                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block mr-1 mb-1 waves-effect waves-light">Salvar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
