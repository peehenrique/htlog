<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends MX_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('loja_model');
    $this->load->model('pedidos_model');
    $this->load->library('carrinhocompra');

    if (!$this->ion_auth->logged_in())
    {
      redirect('login');
    }

  }

  public function index()
  {
    $data['user'] = $this->ion_auth->user()->row();

    $data['pedidos'] = $this->pedidos_model->listarPedidos($data['user']->id_cliente);

    $query = $this->loja_model->getDadosLoja();
    $data['titulo'] = "Pedidos";
    $data['dados_loja'] = $query;
    $data['categorias'] = $this->loja_model->getCategorias();
    $data['view'] = 'pedidos/listar';

    $this->load->view('loja/index', $data);

  }

  public function pedido($id=null)
  {

    $query = $this->pedidos_model->getPedidoId($id);
    if (!$query) {
      echo "Erro ao tentar imprimir o ID enviado";
      exit;
    }

    $data['titulo'] = "Pedido";
    $data['view'] = 'pedidos/pedido';
    $data['pedido'] = $query;
    $data['itens'] = $this->pedidos_model->getItens($query->id);

    $this->load->view('loja/index', $data);
  }



}
