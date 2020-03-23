<section class="invoice-print mb-1">
  <div class="row">

    <fieldset class="col-12 col-md-5 d-flex flex-column flex-md-row justify-content-end">
      <div class="input-group">
          <a href="<?php echo base_url('pedidos') ?>" class="btn btn-success right waves-effect waves-light">Voltar para pedidos</a>
      </div>
    </fieldset>
    <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">
      <button class="btn btn-primary btn-imprimir mb-1 mb-md-0 waves-effect waves-light"> <i class="feather icon-file-text"></i> Imprimir</button>
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
          <p><?php echo $pedido->ref ?></p>
          <h6 class="mt-2">DATA DO PEDIDO</h6>
          <p><?php echo formataDataView($pedido->data_cadastro) ?></p>
        </div>
      </div>
    </div>

    <div id="invoice-customer-details" class="row pt-2">
      <div class="col-sm-6 col-12 text-left">
        <h5>Resumo do pedido</h5>
        <div class="recipient-info my-2">
          <p><?php echo $pedido->ref ?></p>
        </div>
        <div class="recipient-contact pb-2">
          <p>
            <i class="feather icon-mail"></i>
          email
          </p>
          <p>
            <i class="feather icon-phone"></i>
            telefone
          </p>
        </div>
      </div>
      <div class="col-sm-6 col-12 text-right">
        <h4>STATUS DO PEDIDO:</h4>
        <h5><?php echo $pedido->titulo_status; ?></h5>

      </div>
    </div>

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
                  <td><?php echo $item->nome_produto ?></td>
                  <td><?php echo $item->qtd ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
</section>
