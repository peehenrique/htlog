<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <title><?php echo $titulo; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/vendors/css/vendors.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/vendors/css/extensions/nouislider.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/vendors/css/ui/prism.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/vendors/css/forms/select/select2.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
  <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/bootstrap-extended.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/colors.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/components.css'); ?>">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/core/menu/menu-types/horizontal-menu.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/core/colors/palette-gradient.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/css/plugins/extensions/noui-slider.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/css/pages/app-ecommerce-shop.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/css/plugins/forms/wizard.css') ?>">
  <link rel="stylesheet" type="text/css" href=".<?php echo base_url('/public/novo/app-assets/css/plugins/extensions/toastr.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/vendors/css/tables/datatable/datatables.min.css'); ?>">

  <!-- END: Page CSS-->

  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/assets/css/loja.css'); ?>">
  <!-- END: Custom CSS-->

  <script type="text/javascript">
  var url_loja = "<?php echo base_url()?>";
  </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar ecommerce-application navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center" data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item"><a class="navbar-brand" href="<?php echo base_url() ?>">
          <img src="<?php echo base_url('public/novo/app-assets/images/logo.jpg') ?>" class="logo" alt="">
        </a></li>
      </ul>
    </div>
    <div class="navbar-wrapper">
      <div class="navbar-container content">
        <div class="navbar-collapse" id="navbar-mobile">
          <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav">
              <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
            </ul>

            <!-- <ul class="nav navbar-nav">
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown"><i class="feather icon-bar-chart-2"></i><span data-i18n="Charts &amp; Maps">Categorias</span></a>
            <ul class="dropdown-menu">

            <?php foreach ($categorias as $categoria):?>

            <li data-menu="">
            <a class="dropdown-item" href="<?php echo base_url('categoria/'. $categoria->meta_link) ?>" data-toggle="dropdown"><?php echo $categoria->nome ?></a>
          </li>

        <?php endforeach; ?>

      </ul>
    </li>
  </ul> -->
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url('/'); ?>">
        <i class="feather icon-package"></i>
        <span class="selected-language">Listar Produtos</span>
      </a>
    </li>
  </ul>

</div>
<ul class="nav navbar-nav float-right">
  <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

  <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="<?php echo base_url('finalizar-pedido'); ?>"><i class="ficon feather icon-shopping-cart"></i>
    <span class="badge badge-pill badge-primary badge-up total-carrinho-menu">0</span></a>
  </li>
  <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $this->session->userdata['username'] ?></span></div><span><img class="round" src="<?php echo base_url('public/novo/app-assets/images/logo_agencia.png'); ?> " alt="avatar" width="45" height="40"></span>
  </a>
  <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo base_url('minha-conta'); ?>"><i class="feather icon-user"></i> Editar perfil</a>
    <a class="dropdown-item" href="<?php echo base_url('pedidos'); ?>"><i class="feather icon-mail"></i> Meus pedidos</a>
    <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('login/sair'); ?>"><i class="feather icon-power"></i> Sair</a>
  </div>
</li>
</ul>
</div>
</div>
</div>
</nav>

<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">

      <?php
      if (isset($view)) {
        $this->load->view($view);
      }
      ?>

    </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="<?php echo base_url('/public/js/jquery.min.js'); ?>"></script>

<script src="<?php echo base_url('public/novo/app-assets/vendors/js/vendors.min.js') ?>"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/ui/jquery.sticky.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/ui/prism.min.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/extensions/wNumb.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/extensions/nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/forms/select/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/extensions/jquery.steps.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/extensions/toastr.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') ?>"></script>


<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url('/public/novo/app-assets/js/core/app-menu.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/js/core/app.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/js/scripts/components.js'); ?>"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo base_url('/public/novo/app-assets/js/scripts/pages/app-ecommerce-shop.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/js/scripts/pagination/pagination.js'); ?>"></script>
<script src="<?php echo base_url('/public/novo/app-assets/js/scripts/datatables/datatable.js') ?>"></script>

<!-- END: Page JS-->

<script src="<?php echo base_url('/public/dist/jquery-mask/dist/jquery.mask.min.js'); ?>"></script>

<script src="<?php echo base_url('/public/novo/assets/js/loja.js'); ?>"></script>



</body>
<!-- END: Body-->

</html>
