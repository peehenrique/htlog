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
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/vendors/css/charts/apexcharts.css'); ?>">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/bootstrap-extended.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/colors.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/components.css'); ?>">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/core/menu/menu-types/vertical-menu.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/core/colors/palette-gradient.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/app-assets/css/pages/dashboard-ecommerce.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/vendors/css/tables/datatable/datatables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('/public/novo/app-assets/css/plugins/forms/wizard.css') ?>">

  <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">


  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" href="<?php echo base_url('/public/novo/assets/css/style.css'); ?>">
  <!-- END: Custom CSS-->

  <script type="text/javascript">
  var url_loja = "<?php echo base_url()?>";
  </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  <!-- BEGIN: Header-->

  <!-- BEGIN: Main Menu-->
  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <img src="<?php echo base_url('public/novo/app-assets/images/logo.jpg') ?>" class="logo" alt="">
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header"><span>Menu</span>
        </li>
        <li class="<?php if($this->uri->uri_string()=="admin/principal"){echo 'active';}elseif($this->uri->uri_string()=="admin"){echo 'active';}?> nav-item"><a href="<?php echo base_url('admin') ?>"><i class="feather icon-home"></i><span class="menu-title">Dashboard</span></a>
        </li>
        <li class="<?php if($this->uri->uri_string()=="admin/pedidos"){echo 'active';}?> nav-item"><a href="<?php echo base_url('admin/pedidos') ?>"><i class="feather icon-inbox"></i><span class="menu-title">Pedidos</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="feather icon-save"></i><span class="menu-title">Cadastro</span></a>
          <ul class="menu-content">
            <li class="<?php if($this->uri->uri_string()=="admin/produtos"){echo 'active';}?>"><a href="<?php echo base_url('admin/produtos') ?>"><i class="feather icon-circle"></i><span class="menu-item">Produtos</span></a>
            </li>
            <li class="<?php if($this->uri->uri_string()=="admin/categorias"){echo 'active';}?>"><a href="<?php echo base_url('admin/categorias') ?>"><i class="feather icon-circle"></i><span class="menu-item">Categorias</span></a>
            </li>
            <li class="<?php if($this->uri->uri_string()=="admin/marcas"){echo 'active';}?>"><a href="<?php echo base_url('admin/marcas') ?>"><i class="feather icon-circle"></i><span class="menu-item">Empresas</span></a>
            </li>
          </ul>
        </li>
        <li class="<?php if($this->uri->uri_string()=="admin/clientes"){echo 'active';}?> nav-item"><a href="<?php echo base_url('admin/clientes') ?>"><i class="feather icon-users"></i><span class="menu-title">Clientes</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="feather icon-activity"></i><span class="menu-title">Relatórios</span></a>
          <ul class="menu-content">
            <li><a href=""><i class="feather icon-circle"></i><span class="menu-item">Diário</span></a>
            </li>
            <li><a href=""><i class="feather icon-circle"></i><span class="menu-item">Por período</span></a>
            </li>
            <li><a href=""><i class="feather icon-circle"></i><span class="menu-item">Mais enviados</span></a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="#"><i class="feather icon-settings"></i><span class="menu-title">Configurações</span></a>
          <ul class="menu-content">
            <li><a href=""><i class="feather icon-circle"></i><span class="menu-item">Config Geral</span></a>
            </li>
            <li class="<?php if($this->uri->uri_string()=="admin/usuarios"){echo 'active';}?>"><a href="<?php echo base_url('admin/usuarios') ?>"><i class="feather icon-circle"></i><span class="menu-item">Usuários</span></a>
            </li>
          </ul>
        </li>
        <li class=" nav-item"><a href="<?php echo base_url('admin/login/sair'); ?>"><i class="feather icon-log-out"></i><span class="menu-title">Sair</span></a>
        </li>

      </ul>
    </div>
  </div>
  <!-- END: Main Menu-->
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

  <!-- BEGIN: Vendor JS-->
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/vendors.min.js'); ?>"></script>    <!-- BEGIN Vendor JS-->

  <!-- BEGIN: Theme JS-->
  <script src="<?php echo base_url('/public/novo/app-assets/js/core/app-menu.js'); ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/js/core/app.js'); ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/js/scripts/components.js'); ?>"></script>
  <!-- <script src="<?php echo base_url('/public/novo/app-assets/js/scripts/pages/dashboard-ecommerce.js'); ?>"></script> -->

  <!-- END: Page JS-->
  <!-- BEGIN: Page JS-->
  <script src="<?php echo base_url('/public/novo/app-assets/js/scripts/datatables/datatable.js') ?>"></script>
  <!-- END: Page JS-->

  <!-- //BIBLIOTECA DE UPLOAD JS-->
  <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>


  <!-- BEGIN: Page Vendor JS-->
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/vfs_fonts.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/extensions/jquery.steps.min.js') ?>"></script>
  <script src="<?php echo base_url('/public/novo/app-assets/vendors/js/forms/validation/jquery.validate.min.js') ?>"></script>
  <!-- END: Page Vendor JS-->


  <!-- BEGIN: Page JS-->
  <script src="<?php echo base_url('/public/novo/app-assets/js/scripts/forms/wizard-steps.js') ?>"></script>
  <!-- END: Page JS-->

  <script src="<?php echo base_url('/public/dist/jquery-mask/dist/jquery.mask.min.js'); ?>"></script>

  <script src="<?php echo base_url('/public/js/main.js'); ?>"></script>

</body>
<!-- END: Body-->

</html>
