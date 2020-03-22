<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MX_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('loja_model');
    $this->load->model('checkout_model');
    $this->load->library('carrinhocompra');
    $this->load->helper('string');
    if (!$this->ion_auth->logged_in())
    {
      redirect('/');
    }
  }

  public function index()
  {

    $query = $this->loja_model->getDadosLoja();

    $data['titulo'] = 'Finalizar pedido';
    $data['dados_loja'] = $query;
    $data['categorias'] = $this->loja_model->getCategorias();
    $data['view'] = 'checkout';
    $data['carrinho'] = $this->carrinhocompra->listarProdutos();

    $data['usuario'] = $this->checkout_model->getDadosUsuario($this->session->userdata['id_cliente']);

    $this->load->view('loja/index', $data);

  }


  public function pedido()
  {
    $carrinho = $this->carrinhocompra->listarProdutos();

    $this->form_validation->set_rules('nome', 'Nome completo', 'required|trim');
    if ($this->form_validation->run()) {

      $id_cliente = $this->session->userdata['id_cliente'];
      $ref_pedido = random_string('numeric', 8);


      //GRAVA PEDIDO
      $pedido = [
        'id_cliente' => $id_cliente,
        'data_cadastro' => dataDiaDb(),
        'ref' => $ref_pedido,
        'status' => 1

      ];

      $this->checkout_model->doInsertPedido($pedido);
      $id_pedido = $this->session->userdata('last_id_pedido');

      // PRODUTOS DO PEDIDO
      foreach ($carrinho as $indice => $linha) {
        $produto = [
          'id_pedido' => $id_pedido,
          'id_produto' => $linha['id'],
          'qtd' => $linha['qtd']
        ];

        $quantidadeAtual = $this->checkout_model->getProdutoId($linha['id']);

        $quantidade['estoque'] = $quantidadeAtual->estoque - $linha['qtd'];
        $id_produto = $linha['id'];

        $this->checkout_model->doInsertPedidoProdutos($produto);
        $this->checkout_model->atualizarEstoque($quantidade, $id_produto);
      }

      $this->carrinhocompra->limpa();

      if ($id_pedido) {
        redirect('pedidos', 'refresh');
      }
    }

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
