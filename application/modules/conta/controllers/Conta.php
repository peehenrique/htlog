<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Conta extends MX_Controller {

	public function __construct()
	{
		parent::__construct();
		//Codeigniter : Write Less Do More
		$this->load->library('carrinhocompra');

		if (!$this->ion_auth->logged_in())
		{
			redirect('login');
		}

	}

	public function index(){
		echo "Minha Conta";
	}

}
