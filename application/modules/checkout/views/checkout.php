
<?php if ($carrinho){ ?>


  <div class="content-body">
    <form action="<?php echo base_url('checkout/pedido'); ?>"  method="post" class="icons-tab-steps checkout-tab-steps wizard-circle">
      <!-- Checkout Place order starts -->
      <h6><i class="step-icon step feather icon-shopping-cart"></i>Pedido</h6>
      <fieldset class="checkout-step-1 px-0">
        <section id="place-order" class="list-view product-checkout">
          <div class="checkout-items">


            <?php foreach ($carrinho as $indice => $linha): ?>
              <!-- <tr>
              <td><?php echo $linha['id'] ?></td>
              <td><?php echo $linha['nome'] ?></td>
              <td><?php echo $linha['produto_foto'] ?></td>
              <td>
              <input type="tel" name="carrinho_qtd" id="carrinho_qtd_<?php echo $linha['id'] ?>" value="<?php echo $linha['qtd'] ?>">
              <a href="javascript:void(0)" class="btn btn-warning btn-atualizar-qtd-carrinho" data-id="<?php echo $linha['id'] ?>"> <i class="fa fa-undo"></i> </a>
            </td>
            <td> <a href="javascript:void(0)" class="btn btn-danger remover-item-carrinho" data-id="<?php echo $linha['id'] ?>">X</a> </td>

          </tr> -->

          <div class="card ecommerce-card">
            <div class="card-content">
              <div class="item-img text-center">
                <a href="javascript:void(0)">
                  <?php
                  $foto_produto =  base_url('uploads/fotos_produtos/'. $linha['produto_foto'] . '');
                  $sem_foto =  base_url('public/img/no_produto.png');
                  ?>
                  <img class="img-fluid" src="<?= ($linha['produto_foto'] ? $foto_produto : $sem_foto) ?>">
                </a>
              </div>
              <div class="card-body">
                <div class="item-name">
                  <a href="javascript:void(0)"><?php echo $linha['nome'] ?></a>
                  <span></span>
                </div>
                <div class="item-quantity mt-2">
                  <p class="quantity-title">Quantidade selecionado</p>

                  <div class="carrinho_estoque">
                    <input type="tel" name="carrinho_qtd" class="form-control" id="carrinho_qtd_<?php echo $linha['id'] ?>" value="<?php echo $linha['qtd'] ?>">
                    <a href="javascript:void(0)" class="btn btn-warning btn-atualizar-qtd-carrinho" data-id="<?php echo $linha['id'] ?>"> <i class="fa fa-undo"></i> </a>
                  </div>

                </div>
              </div>
              <div class="item-options text-center">
                <div class="item-wrapper">


                </div>


                <a href="javascript:void(0)" class="remover-item-carrinho" data-id="<?php echo $linha['id'] ?>">

                  <div class="wishlist remove-wishlist">
                    <i class="feather icon-x align-middle"></i> Remover
                  </div>

                </a>

              </div>
            </div>
          </div>

        <?php endforeach; ?>


      </div>
      <div class="checkout-options">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <button class="btn btn-danger btn-limpar-carrinho btn-block ">LIMPAR CARRINHO</button>
              <hr>
              <div class="btn btn-primary btn-block place-order">PROSSEGUIR</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </fieldset>
  <!-- Checkout Place order Ends -->

  <!-- Checkout Customer Address Starts -->
  <h6><i class="step-icon step feather icon-home"></i>Informações</h6>
  <fieldset class="checkout-step-2 px-0">

    <section id="checkout-address" class="list-view product-checkout">
      <div class="card">

        <div class="card-content">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="nome">Nome Completo:</label>
                  <input type="text" id="nome" class="form-control required" value="<?= ($usuario != "" ? $usuario->nome : "") ?>" name="nome">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="telefone">Telefone:</label>
                  <input type="text" id="telefone" value="<?= ($usuario != "" ? $usuario->telefone : "") ?>" class="form-control" name="telefone">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="cnpj">CNPJ</label>
                  <input type="text" id="cnpj" value="<?= ($usuario != "" ? $usuario->telefone : "") ?>" class="form-control" name="cnpj">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="endereco">Endereço</label>
                  <input type="text" id="endereco" value="<?= ($usuario != "" ? $usuario->endereco : "") ?>" class="form-control" name="endereco">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="cidade">Cidade</label>
                  <input type="text" id="cidade" value="<?= ($usuario != "" ? $usuario->cidade : "") ?>" class="form-control" name="cidade">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="cep">CEP:</label>
                  <input type="text" id="cep" value="<?= ($usuario != "" ? $usuario->cep : "") ?>" class="form-control" name="cep">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="estado">Estado:</label>
                  <input type="text" id="estado" value="<?= ($usuario != "" ? $usuario->estado : "") ?>" class="form-control" name="estado">
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="form-group">
                  <label for="bairro">Bairro:</label>
                  <input type="text" id="bairro" value="<?= ($usuario != "" ? $usuario->bairro : "") ?>" class="form-control" name="bairro">
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="customer-card">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Resumo</h4>
          </div>
          <div class="card-content">
            <div class="card-body actions">
              <p>Data de entrega</p>
              <hr>
              <button type="submit" class="btn btn-primary btn-block delivery-address">Solicitar Pedido</button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </fieldset>

  <!-- Checkout Customer Address Ends -->

</form>

</div>

<?php } else{
  redirect('', 'refresh');
} ?>
