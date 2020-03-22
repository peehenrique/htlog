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
        <a href="<?php echo base_url('admin/pedidos/') ?>" class="btn btn-success mt-2 right">Voltar para pedidos</a>
      </div>

    </div>
        <div class="card-content">
          <div class="card-body">
            <form class="form form-vertical" action="<?php echo base_url('admin/pedidos/mudarstatus'); ?>" method="post">
                <input type="hidden" name="id_pedido" value="<?= $pedido->id; ?>">

              <?php
              errosValidacao();
              getMsg('msgCadastro');
              ?>

              <div class="form-body">
                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="controlar_estoque">Status do pedido</label>
                      <select class="custom-select form-control" name="id_status">
                        <?php foreach ($status as $s){ ?>
                          <?php if($status) { ?>
                            <option value="<?= $s->id_status ?>" <?= ($s->id_status == $pedido->id_status ? 'selected="selected"' : '') ?>><?= $s->titulo_status ?></option>
                          <?php } else{ ?>
                            <option value="<?= $s->id_status ?>"><?= $s->titulo_status ?></option>
                          <?php } ?>
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
