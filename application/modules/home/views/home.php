<?php $this->load->view('top_header'); ?>
<!-- listagem de produtos -->


<section id="ecommerce-products" class="grid-view">

  <?php foreach ($produtos as $produto): ?>
    <input type="hidden" class="produto_id" value="<?php echo $produto->id?>">

    <div class="card ecommerce-card">
      <div class="card-content">
        <div class="item-img text-center">
          <?php
          $foto_produto =  base_url('uploads/fotos_produtos/'. $produto->foto . '');
          $sem_foto =  base_url('public/img/no_produto.png');
          ?>
          <img class="img-fluid" src="<?= ($produto->foto ? $foto_produto : $sem_foto) ?>" alt="img-placeholder">
        </div>
        <div class="card-body">

          <div class="item-wrapper">
            <div class="item-rating">
              <div class="badge badge-primary badge-md">
                <span><?php echo $produto->nome_categoria; ?></span> <i class="feather icon-star"></i>
              </div>
            </div>
            <div class="estoque">
              <p class="texto_estoque"><b>Estoque:</b> <span><?php echo $produto->estoque; ?></span> </p>
              <input type="hidden" id="estoque_valor<?php echo $produto->id?>" value="<?php echo $produto->estoque; ?>">
              <div class="input-group quantity-counter-wrapper">
                <input type="number" class="quantity-counter" min="1" max="<?php echo $produto->estoque; ?>" id="qtd_produto_<?php echo $produto->id?>" placeholder="Estoque" value="1">
              </div>
            </div>

          </div>

          <div class="item-name">
            <?php echo $produto->nome_produto ?>
          </div>
          <div>
            <p class="item-description">
              <?php
              if ($produto->informacao == "") {
                echo "Nao contem descricao";
              } else{
                echo $produto->informacao;
              }

              ?>
            </p>
          </div>
        </div>
        <div class="item-options text-center">

          <div class="cart btn-add-to-cart" data-id="<?php echo $produto->id ?>">
            <i class="feather icon-shopping-cart"></i> <span class="add-to-cart">Adicionar ao carrinho</span>
            <!-- <a href="<?php echo base_url('checkout'); ?>" class="view-in-cart d-none">Visualizar carrinho</a> -->
          </div>

        </div>
      </div>
    </div>



  <?php endforeach; ?>


</section>
<!-- Ecommerce Products Ends -->


  <footer class="footer footer-static footer-light">
    <?php echo '<div class="paginacao">'.$links_paginacao.'</div>'; ?>
    </footer>
