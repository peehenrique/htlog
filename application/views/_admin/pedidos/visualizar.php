<section class="invoice-print mb-1">
  <div class="row">

    <fieldset class="col-12 col-md-5 d-flex flex-column flex-md-row justify-content-end">
      <div class="input-group">
          <a href="<?php echo base_url('admin/pedidos') ?>" class="btn btn-success right waves-effect waves-light">Voltar para pedidos</a>
      </div>
    </fieldset>
    <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
      <button class="btn btn-primary btn-imprimir mb-1 mb-md-0 waves-effect waves-light"> <i class="feather icon-file-text"></i> Imprimir</button>
      <button class="btn btn-outline-primary btn-download  ml-0 ml-md-1 waves-effect waves-light"> <i class="feather icon-download"></i> Download</button>
    </div>
  </div>
</section>

<section class="card invoice-page">
  <div id="invoice-template" class="card-body">
    <!-- Invoice Company Details -->
    <div id="invoice-company-details" class="row">
      <div class="col-sm-6 col-12 text-left pt-1">
        <div class="media pt-1">
          <img src="<?php echo base_url('public/novo/app-assets/images/logo.jpg') ?>" alt="company logo">
        </div>
      </div>
      <div class="col-sm-6 col-12 text-right">
        <h1>Pedido</h1>
        <div class="invoice-details mt-2">
          <h6>PEDIDO NO.</h6>
          <p><?php echo $pedido->id ?></p>
          <h6 class="mt-2">DATA DO PEDIDO</h6>
          <p><?php echo formataDataView($pedido->data_cadastro) ?></p>
        </div>
      </div>
    </div>
    <!--/ Invoice Company Details -->

    <!-- Invoice Recipient Details -->
    <div id="invoice-customer-details" class="row pt-2">
      <div class="col-sm-6 col-12 text-left">
        <h5>Descrição</h5>
        <div class="recipient-info my-2">
          <p><?php echo $pedido->nome ?></p>
          <p><?php echo $pedido->cpf ?></p>
        </div>
        <div class="recipient-contact pb-2">
          <p>
            <i class="feather icon-mail"></i>
            <?php echo $pedido->email ?>
          </p>
          <p>
            <i class="feather icon-phone"></i>
            <?php echo $pedido->telefone ?>
          </p>
        </div>
      </div>
      <div class="col-sm-6 col-12 text-right">
        <h5><?php echo $pedido->titulo_status; ?></h5>
        <!-- <div class="company-info my-2">
          <p>9 N. Sherwood Court</p>
          <p>Elyria, OH</p>
          <p>94203</p>
        </div>
        <div class="company-contact">
          <p>
            <i class="feather icon-mail"></i>
            hello@pixinvent.net
          </p>
          <p>
            <i class="feather icon-phone"></i>
            +91 999 999 9999
          </p>
        </div> -->
      </div>
    </div>
    <!--/ Invoice Recipient Details -->

    <!-- Invoice Items Details -->
    <div id="invoice-items-details" class="pt-1 invoice-items-table">
      <div class="row">
        <div class="table-responsive col-12">
          <table class="table table-striped table-borderless">
            <thead>
              <tr>
                <th>Produto</th>
                <th>Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($itens as $item): ?>
                <tr>
                  <td><?php echo $item->nome_item ?></td>
                  <td><?php echo $item->quantidade ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <!-- Invoice Footer -->
    <div id="invoice-footer" class="text-right pt-3">
      <p>Texto rodape....
      </p><p class="bank-details mb-0">
        <span class="mr-4">INFO: <strong>FTSBUS33</strong></span>
        <span>INFO2: <strong>G882-1111-2222-3333</strong></span>
      </p>
    </div>
    <!--/ Invoice Footer -->

  </div>
</section>
