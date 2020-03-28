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

    $this->perPage = 15;

  }

  public function index($pular=null,$produto_por_pagina=null)
  {

    $config['base_url'] = base_url('');

    $id_empresa = $this->session->userdata['id_empresa'];
    $produtos = $this->home_model->getProdutosporEmpresa($id_empresa);

    $config['total_rows'] = count($produtos);

    $produto_por_pagina = 10;
    $config['per_page'] = $produto_por_pagina;

    $this->pagination->initialize($config);
    $data['links_paginacao'] = $this->pagination->create_links();

    $query = $this->home_model->getDadosLoja();
    $data['titulo'] = $query->titulo;
    $data['view'] = 'home';
    $data['produtos'] = $this->home_model->getProdutos($pular,$produto_por_pagina,$id_empresa);
    $data['categorias'] = $this->home_model->getCategorias();
    $data['quantidadeProdutos'] = count($produtos);
    $data['palavra_chave'] = "";

    $this->load->view('loja/index', $data);

  }


  public function testehome()
  {

    // Obter dados de postagens do banco de dados
    $data = array();
    $conditions['order_by'] = "id DESC";
    $conditions['limit'] = $this->perPage;
    $data['produtos'] = $this->home_model->getRows($conditions);

    // Passe os dados da postagem para visualizar

    $this->load->view('home/teste', $data);

  }

  function loadMoreData(){
    $conditions = array();
    // Obter o último ID da postagem
    $lastID = $this->input->post('id');

    // Obtém as linhas da postagem num
    $conditions['where'] = array('produtos.id <'=>$lastID);
    $conditions['returnType'] = 'count';
    $data['postNum'] = $this->home_model->getRows($conditions);

    // Obter dados de postagens do banco de dados
    $conditions['returnType'] = '';
    $conditions['order_by'] = "produtos.id DESC";
    $conditions['limit'] = $this->perPage;
    $data['produtos'] = $this->home_model->getRows($conditions);

    $data['postLimit'] = $this->perPage;

    // Passa os dados para visualizar
    $this->load->view('home/load', $data, false);

  }

}
