<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('home_model');
    $this->load->library('carrinhocompra');
    $this->load->library('pagination');

    if (!$this->ion_auth->logged_in())
    {
      redirect('login');
    }

  }

  public function index($pular=null,$produto_por_pagina=null)
  {
    $config['base_url'] = base_url('');
    $config['total_rows'] = $this->home_model->contarProdutos();
    $produto_por_pagina = 10;
    $config['per_page'] = $produto_por_pagina;

    $this->pagination->initialize($config);
    $data['links_paginacao'] = $this->pagination->create_links();

    $query = $this->home_model->getDadosLoja();
    $data['titulo'] = $query->titulo;
    $data['view'] = 'home';
    $data['produtos'] = $this->home_model->getProdutos($pular,$produto_por_pagina);
    $data['categorias'] = $this->home_model->getCategorias();
    $data['quantidadeProdutos'] = $this->home_model->contarProdutos();
    $data['palavra_chave'] = "";

    $this->load->view('loja/index', $data);

  }

}
