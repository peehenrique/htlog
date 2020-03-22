<section id="ecommerce-header">
  <div class="row">
    <div class="col-sm-12">
      <div class="ecommerce-header-items">
        <div class="result-toggler">
          <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon d-block d-lg-none"><i class="feather icon-menu"></i></span>
          </button>
          <div class="search-results">
            <?php echo "$quantidadeProdutos produtos encontrados" ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Ecommerce Content Section Starts -->
<!-- background Overlay when sidebar is shown  starts-->
<div class="shop-content-overlay"></div>
<!-- background Overlay when sidebar is shown  ends-->

<!-- Ecommerce Search Bar Starts -->
<section id="ecommerce-searchbar">
  <div class="row mt-1">
    <div class="col-sm-12">
      <form action="<?php echo base_url('buscar') ?>" method="post">
        <fieldset class="form-group position-relative form_buscar">
          <input type="text" class="form-control search-product" id="palavra_chave" name="palavra_chave" value="<?= ($palavra_chave != "" ? $palavra_chave : "") ?>" placeholder="Digite ou codigo do produto e clique em ENTER">
          <div class="form-control-position">
            <i class="feather icon-search"></i>
          </div>
        </fieldset>
        <button type="submit" class="btn bg-gradient-primary mr-1 mb-1 waves-effect waves-light btn_pesquisar_produtos d-none" name="button">Pesquisar produtos</button>
      </form>
    </div>
  </div>
</section>
<!-- Ecommerce Search Bar Ends -->
