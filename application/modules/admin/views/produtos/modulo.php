<section id="number-tabs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="row">
          <div class="col">
            <div class="card-header">
              <h4 class="card-title"><?php echo $titulo ?></h4>
            </div>
          </div>
          <div class="col">
            <a href="<?php echo base_url('admin/produtos/') ?>" class="btn btn-success mt-2 right">Voltar para produtos</a>
          </div>

        </div>

        <div class="card-content">
          <div class="card-body">
            <?php
            errosValidacao();
            getMsg('msgCadastro');
            ?>
            <form action="<?php echo base_url('admin/produtos/core'); ?>" method="post" id="form-submit" class="number-tab-steps wizard-circle">

              <?php if ($dados) { ?>
                <input type="hidden" name="id_produto" value="<?= $dados->id; ?>">
              <?php  }  ?>

              <!-- Step 1 -->
              <h6>Dados do Produto</h6>
              <fieldset>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="nome_produto">Nome Produto </label>
                      <input type="text" name="nome_produto" class="form-control" placeholder="Nome produto" value="<?php echo ( $dados != NULL ? $dados->nome_produto : set_value('nome_produto')); ?>">
                    </div>
                  </div>

                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="cod_produto">Codigo do produto</label>
                      <input type="text" name="cod_produto" class="form-control" placeholder="Codigo" value="<?php echo ( $dados != NULL ? $dados->cod_produto : set_value('cod_produto')); ?>">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="cod_produto">Palete</label>
                      <input type="text" name="palete" class="form-control" placeholder="Palete do produto" value="<?php echo ( $dados != NULL ? $dados->palete : set_value('palete')); ?>">
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="controlar_estoque">Estoque</label>
                      <input type="text" name="estoque" class="form-control" placeholder="Estoque" value="<?php echo ( $dados != NULL ? $dados->estoque : set_value('estoque')); ?>">

                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-sm-3 hidden">
                    <div class="form-group">
                      <label for="controlar_estoque">Controlar estoque?</label>
                      <select class="custom-select form-control" name="controlar_estoque">
                        <?php if($dados) { ?>
                          <option value="0" <?= ($dados->controlar_estoque == 0 ? 'selected="selected"' : '') ?>>Nao</option>
                          <option value="1" <?= ($dados->controlar_estoque == 1 ? 'selected="selected"' : '') ?>>Sim</option>
                        <?php } else{ ?>
                          <option value="0">Nao</option>
                          <option value="1" selected="selected">Sim</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>


                </div>
              </fieldset>

              <!-- Step 2 -->
              <h6>Adicionais</h6>
              <fieldset>

                <div class="row">

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="location1">Categoria</label>
                      <select class="custom-select form-control" name="id_categoria">
                        <option value="">Selecione uma categoria</option>
                        <?php foreach ($categorias as $categoria): ?>
                          <?php if($dados) { ?>
                            <option value="<?php echo $categoria->id; ?>" <?= ($categoria->id == $dados->id_categoria ? 'selected="selected"' : '') ?>><?php echo $categoria->nome; ?></option>
                          <?php } else{ ?>
                            <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nome; ?></option>
                          <?php } ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="eventLocation1">Empresa</label>
                      <select class="custom-select form-control" name="id_marca">
                        <option value="">Selecione uma empresa</option>
                        <?php foreach ($marcas as $marca): ?>
                          <?php if($dados) { ?>
                            <option value="<?php echo $marca->id; ?>" <?= ($marca->id == $dados->id_marca ? 'selected="selected"' : '') ?>><?php echo $marca->nome_marca; ?></option>
                          <?php } else{ ?>
                            <option value="<?php echo $marca->id; ?>"><?php echo $marca->nome_marca; ?></option>
                          <?php } ?>
                        <?php endforeach; ?>

                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="eventLocation1">Produto Ativo</label>
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



                </div>


                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="valor">Detalhes</label>
                      <textarea name="informacao" class="form-control" rows="8" cols="80"><?php echo ( $dados != NULL ? $dados->informacao : set_value('informacao')); ?></textarea>
                    </div>

                  </div>

                </div>
              </fieldset>

              <!-- Step 3 -->
              <h6>Fotos</h6>
              <fieldset>
                <div class="row">
                  <div class="col-sm-12">

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Foto do produto</label>
                      <div class="col-md-6">
                        <div id="file_upload_fotos_produtos">Upload</div>
                      </div>
                    </div>

                    <!-- CAMPO PARA UPLOAD PRODUTO -->
                    <div class="form-group">
                      <div class="row retorno_fotos_produtos">

                        <?php if ($fotos): ?>
                          <?php foreach ($fotos as $foto): ?>
                            <div class="col img_foto_produtos_view">
                              <img width="120px" src="<?= base_url('uploads/fotos_produtos/'.$foto->foto); ?>" />
                              <input type="hidden" value="<?php echo $foto->foto; ?>" name="foto_produto[]" />
                              <a href="#" class="btn btn-danger btn-apagar-foto-produto"> <i class="fa fa-trash"></i> </a>
                            </div>
                          <?php endforeach; ?>
                        <?php endif; ?>

                      </div>
                    </div>


                  </div>

                </div>
              </fieldset>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
