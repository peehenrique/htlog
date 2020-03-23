<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('loja_model');
    $this->load->model('loja/checkout_model');
    $this->load->library('carrinhocompra');
    if (!$this->ion_auth->logged_in())
    {
      redirect('/');
    }
  }

  public function index()
  {

    $query = $this->loja_model->getDadosLoja();

    $data['titulo'] = 'Carrinho de compra';
    $data['dados_loja'] = $query;
    $data['categorias'] = $this->loja_model->getCategorias();
    $data['view'] = 'loja/carrinho';
    $data['carrinho'] = $this->carrinhocompra->listarProdutos();

    $data['usuario'] = $this->checkout_model->getDadosUsuario($this->session->userdata['id_cliente']);


    // echo "<pre>";
    // print_r($data['usuario']);
    // echo "</pre>";

    $this->load->view('loja/index', $data);

  }

  public function add()
  {
    // $this->carrinhocompra->add(18, 1);
  }

  public function addProduto()
  {
    if ($this->input->post('id')) {
      $id = $this->input->post('id');
      $qtd = $this->input->post('qtd');

      $estoque = $this->input->post('estoque');

      if ($qtd > $estoque) {
        $json = ['erro' => 16, 'msg' => 'Selecione o estoque disponivel'];
        echo json_encode($json);
      } else{

        $this->carrinhocompra->add($id, $qtd);

        $json = ['erro' => 0, 'msg' => 'Produto adicionado ao carrinho', 'itens' => $this->carrinhocompra->totalItem()];
        echo json_encode($json);
      }


    }
  }

  public function limpar()
  {

    if ($this->input->post('limpar') == 'true') {
      $this->carrinhocompra->limpa();
      $json = ['erro' => 0];
      echo json_encode($json);
    }
  }

  public function alterar()
  {
    if ($this->input->post('id') && $this->input->post('qtd')) {
      $id = $this->input->post('id');
      $qtd = $this->input->post('qtd');

      $produto_quantidade = $this->loja_model->getQtd($id);

      if ($qtd > $produto_quantidade->estoque) {
        $json = ['erro' => 16, 'msg' => 'Selecione o estoque disponivel: '.$produto_quantidade->estoque];
        echo json_encode($json);
      } else{

        $this->carrinhocompra->altera($id, $qtd);
        $json = ['erro' => 0];
        echo json_encode($json);
      }


    }
  }

  public function apagar_item()
  {
    if ($this->input->post('id')) {
      $id = $this->input->post('id');
      $this->carrinhocompra->apaga($id);

      $json = ['erro' => 0];
      echo json_encode($json);
    }

  }

  public function getCarrinhoTopo()
  {
    $json = ['erro' => 0, 'itens' => $this->carrinhocompra->totalItem()];
    echo json_encode($json);
  }

}
