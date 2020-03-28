<section>
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="row">
          <div class="col">
            <div class="card-header">
              <h4 class="card-title"><?php echo $titulo; ?></h4>
            </div>
          </div>

          <div class="col">
            <a href="<?php echo base_url('admin/clientes/') ?>" class="btn btn-success mt-2 right">Voltar para clientes</a>
          </div>

        </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="<?php echo base_url('admin/clientes/core'); ?>" method="post">

              <?php if ($dados) { ?>
                <input type="hidden" name="id_cliente" value="<?= $dados->id; ?>">
              <?php  }  ?>
              <?php if ($empresadados) { ?>
                <input type="hidden" name="id_usuario" value="<?= $empresadados->id; ?>">
              <?php  }  ?>
              <?php
              errosValidacao();
              getMsg('msgCadastro');
              ?>

              <div class="form-body">

                <div class="row">

                  <div class="col-3">
                    <div class="form-group">
                      <label for="nome">Nome do usuário</label>
                      <input type="text" name="nome" class="form-control" placeholder="Nome*" value="<?php echo ( $dados != NULL ? $dados->nome : set_value('nome')); ?>">
                    </div>
                  </div>

                  <?php if ($dados): ?>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="nome">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Nome*" value="<?php echo ( $empresadados != NULL ? $empresadados->email : set_value('email')); ?>">
                      </div>
                    </div>
                  <?php endif; ?>


                  <div class="col-3">
                    <div class="form-group">
                      <label for="nome">CPF</label>
                      <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" value="<?php echo ( $dados != NULL ? $dados->cpf : set_value('cpf')); ?>">
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-group">
                      <label for="nome">Telefone</label>
                      <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" value="<?php echo ( $dados != NULL ? $dados->telefone : set_value('telefone')); ?>">
                    </div>
                  </div>

                </div>


                <?php if (!$dados): ?>
                  <div class="row">

                    <div class="col-6">
                      <div class="form-group">
                        <label for="nome">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="">
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="nome">Senha</label>
                        <input type="password" name="senha" class="form-control" value="" placeholder="Senha">
                      </div>
                    </div>

                  </div>
                <?php endif; ?>

                <div class="row">


                  <?php if ($dados): ?>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="nome">Senha</label>
                        <input type="password" name="senha" class="form-control" value="" placeholder="Senha">
                      </div>
                    </div>
                  <?php endif; ?>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="controlar_estoque">Status Cliente</label>
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

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="eventLocation1">Empresa</label>
                      <select class="custom-select form-control" name="id_marca">
                        <option value="">Selecione uma marca</option>
                        <?php foreach ($marcas as $marca): ?>
                          <?php if($empresadados) { ?>
                            <option value="<?php echo $marca->id; ?>" <?= ($marca->id == $empresadados->id_empresa ? 'selected="selected"' : '') ?>><?php echo $marca->nome_marca; ?></option>
                          <?php } else{ ?>
                            <option value="<?php echo $marca->id; ?>"><?php echo $marca->nome_marca; ?></option>
                          <?php } ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-4 center">
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
