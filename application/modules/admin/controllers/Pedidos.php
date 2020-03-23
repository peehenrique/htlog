<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller{

  public function __construct(){
    parent::__construct();

    if (!$this->ion_auth->logged_in())
    {
      redirect('admin/login');
    }

    $this->load->model('pedidos_model');
    $this->load->helper('form');
  }

  function index()
  {

    $data['titulo'] = "Lista de Pedidos";
    $data['view'] = 'admin/pedidos/listar';
    $data['pedidos'] = $this->pedidos_model->getPedidos();

    // echo "<pre>";
    // print_r($data['pedidos']);
    // exit;

    $this->load->view('admin/template/index', $data);
  }

  public function getPedido($id=NULL)
  {
    if (!$id) {
      $retorno['erro'] = 58;
      $retorno['msg'] = "Erro, vc deve informar uma ID valida";
      echo json_encode($retorno);
      exit;
    }

    $query = $this->pedidos_model->getPedidoId($id);
    if (!$query) {
      $retorno['erro'] = 59;
      $retorno['msg'] = "Erro, nao foi encontrado nenhum pedido com a ID informada";
      echo json_encode($retorno);
      exit;
    }

    $retorno['erro'] = 0;
    $retorno['id_pedido'] = $query->id;
    $retorno['status'] = $query->titulo_status;

    echo json_encode($retorno);
    exit;
  }

  public function mudarstatus()
  {


    $pedido['status'] = $this->input->post('id_status');
    $pedido['ultima_atualizacao'] = dataDiaDb();

    $id_pedido = $this->input->post('id_pedido');

    $this->pedidos_model->doUpdate($pedido, $id_pedido);

    redirect('admin/pedidos', 'refresh');

  }

  public function mudar($id=NULL)
  {
    $query = $this->pedidos_model->getPedidoId($id);
    $data['status'] = $this->pedidos_model->getStatus();
    $data['pedido'] = $query;

    $data['titulo'] = 'Alterar status [#'.$query->id.']';


    $data['view'] = 'admin/pedidos/mudar';
    $this->load->view('admin/template/index', $data);

  }

  public function imprimir($id=NULL)
  {

      if (!$id) {
        echo "Precisa enviar um ID para poder imprimir";
        exit;
      }

      $query = $this->pedidos_model->getPedidoId($id);
      if (!$query) {
        echo "Erro ao tentar imprimir o ID enviado";
        exit;
      }

      $data['titulo'] = 'Imprimir pedido [#'.$query->id.']';
      $data['pedido'] = $query;
      $data['config'] = $this->pedidos_model->getDadosLoja();
      $data['itens'] = $this->pedidos_model->getItens($query->id);

      $data['view'] = 'admin/pedidos/imprimir';
      $this->load->view('admin/template/pedido_imprimir', $data);

  }

  public function visualizar($id=NULL)
  {
    if (!$id) {
      echo "Precisa enviar um ID para poder imprimir";
      exit;
    }

    $query = $this->pedidos_model->getPedidoId($id);
    if (!$query) {
      echo "Erro ao tentar imprimir o ID enviado";
      exit;
    }

    $data['titulo'] = 'Imprimir pedido [#'.$query->id.']';
    $data['pedido'] = $query;
    $data['config'] = $this->pedidos_model->getDadosLoja();
    $data['itens'] = $this->pedidos_model->getItens($query->id);

    $data['view'] = 'admin/pedidos/visualizar';
    $this->load->view('admin/template/index', $data);

  }

}
