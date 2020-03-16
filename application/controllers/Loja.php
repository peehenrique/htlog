<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller {

	public function __construct(){
	parent::__construct();

	$this->load->model('loja_model');
	$this->load->library('carrinhocompra');
	$this->load->library('pagination');

}

	public function index($pular=null,$produto_por_pagina=null)
	{
		$config['base_url'] = base_url();
		$config['total_rows'] = $this->loja_model->contarProdutos();
		$produto_por_pagina = 10;
		$config['per_page'] = $produto_por_pagina;

		$this->pagination->initialize($config);
		$data['links_paginacao'] = $this->pagination->create_links();

		$query = $this->loja_model->getDadosLoja();
		$data['titulo'] = $query->titulo;
		$data['view'] = 'loja/home';
		$data['produtos'] = $this->loja_model->getProdutos($pular,$produto_por_pagina);
		$data['categorias'] = $this->loja_model->getCategorias();
		$data['quantidadeProdutos'] = $this->loja_model->contarProdutos();
		$data['palavra_chave'] = "";

		$this->load->view('loja/index', $data);

	}

}
