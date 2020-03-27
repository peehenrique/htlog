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
        <a href="<?php echo base_url('admin/categorias/') ?>" class="btn btn-success mt-2 right">Voltar para categorias</a>
      </div>

    </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="<?php echo base_url('admin/categorias/core'); ?>" method="post">
              <?php if ($dados) { ?>
                <input type="hidden" name="id_categoria" value="<?= $dados->id; ?>">
              <?php  }  ?>

              <?php
              errosValidacao();
              getMsg('msgCadastro');
              ?>

              <div class="form-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="nome">Nome da Categoria</label>
                      <input type="text" name="nome" class="form-control" placeholder="Nome*" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')); ?>">
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="controlar_estoque">Categoria Pai</label>
                      <select class="custom-select form-control" name="id_cat_pai">
                        <option value="0" >Nenhuma categoria pai</option>
                        <?php foreach ($cat_pai as $cat){ ?>
                          <?php if($dados) { ?>
                            <option value="<?= $cat->id ?>" <?= ($dados->id_cat_pai == $cat->id ? 'selected="selected"' : '') ?>><?= $cat->nome ?></option>
                          <?php } else{ ?>
                            <option value="<?= $cat->id ?>"><?= $cat->nome ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="controlar_estoque">Status Categoria</label>
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
