<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function __construct(){
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			redirect('admin/login');
		}

    if ($this->ion_auth->in_group(2))
    {
      redirect('');
    }

		$this->load->model('dashboard_model');

	}

	public function index()
	{
		$data['titulo'] = "Dashboard";
		$data['view'] = 'principal/dashboard';
		$data['t_produtos']  = $this->dashboard_model->getTotal('produtos');
		$data['t_pedidos']  = $this->dashboard_model->getTotal('pedidos');
		$data['t_clientes']  = $this->dashboard_model->getTotal('clientes');
		$data['t_categorias']  = $this->dashboard_model->getTotal('categorias');
		$data['pedidos'] = $this->dashboard_model->getPedidos();
		$data['clientes'] = $this->dashboard_model->getClientes();

		$this->load->view('template/index', $data);
	}



}
