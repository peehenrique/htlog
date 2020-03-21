<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('loja/busca_model');
    $this->load->model('loja_model');
  	$this->load->library('carrinhocompra');
    if (!$this->ion_auth->logged_in())
    {
      redirect('/');
    }
  }

  public function index()
  {

    $query = $this->loja_model->getDadosLoja();
		$data['titulo'] = $query->titulo;
    $data['categorias'] = $this->loja_model->getCategorias();
    $data['clientes'] = NULL;
    $data['view'] = NULL;
    $data['quantidadeProdutos'] = "0";


    if ($this->input->post('palavra_chave')) {
      $data['resultado'] = $this->busca_model->getBusca($this->input->post('palavra_chave'));
      $data['palavra_chave'] = $this->input->post('palavra_chave');
      $data['view'] = 'loja/buscar';
      $data['quantidadeProdutos'] = count($data['resultado']);
    }

    if ($this->input->post('palavra_chave') == "") {
      redirect('/', 'refresh');
    }

    $this->load->view('loja/index', $data);

  }

}
