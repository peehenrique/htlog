
<?php if ($carrinho){ ?>


  <div class="content-body">
    <form action="#" class="icons-tab-steps checkout-tab-steps wizard-circle">
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
                <!-- <a href="javascript:void(0)" class="remover-item-carrinho" data-id="<?php echo $linha['id'] ?>">
                <div class="wishlist remove-wishlist">
                <i class="feather icon-x align-middle"></i> Remover
              </div>
            </a> -->

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
      <div class="card-header flex-column align-items-start">
        <h4 class="card-title">Add New Address</h4>
        <p class="text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-name">Full Name:</label>
                <input type="text" id="checkout-name" class="form-control required" name="fname">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-number">Mobile Number:</label>
                <input type="number" id="checkout-number" class="form-control required" name="mnumber">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-apt-number">Flat, House No:</label>
                <input type="number" id="checkout-apt-number" class="form-control required" name="apt-number">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-landmark">Landmark e.g. near apollo hospital:</label>
                <input type="text" id="checkout-landmark" class="form-control required" name="landmark">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-city">Town/City:</label>
                <input type="text" id="checkout-city" class="form-control required" name="city">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-pincode">Pincode:</label>
                <input type="number" id="checkout-pincode" class="form-control required" name="pincode">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="checkout-state">State:</label>
                <input type="text" id="checkout-state" class="form-control required" name="state">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <label for="add-type">Address Type:</label>
                <select class="form-control" id="add-type">
                  <option>Home</option>
                  <option>Work</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6 offset-md-6">
              <div class="btn btn-primary delivery-address float-right">
                SAVE AND DELIVER HERE
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="customer-card">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">John Doe</h4>
        </div>
        <div class="card-content">
          <div class="card-body actions">
            <p class="mb-0">9447 Glen Eagles Drive</p>
            <p>Lewis Center, OH 43035</p>
            <p>UTC-5: Eastern Standard Time (EST) </p>
            <p>202-555-0140</p>
            <hr>
            <div class="btn btn-primary btn-block delivery-address">DELIVER TO THIS ADDRESS</div>
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
