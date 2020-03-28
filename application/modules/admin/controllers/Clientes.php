<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

  public function __construct(){
    parent::__construct();

    if (!$this->ion_auth->logged_in())
    {
      redirect('admin/login');
    }

    $this->load->model('clientes_model');
    $this->load->helper('form');

  }

  public function index()
  {
    $data['titulo'] = "Lista de clientes";
    $data['view'] = 'admin/clientes/listar';
    $data['clientes'] = $this->clientes_model->getClientes();
    $this->load->view('admin/template/index', $data);
  }

  public function modulo($id_cliente=NULL)
  {
    $dados = NULL;

    if ($id_cliente) {

      $dados = $this->clientes_model->getClientesId($id_cliente);


      if (!$dados) {
        setMsg('msgCadastro', 'Cliente nao econtrado', 'erro');
        redirect('admin/clientes', 'refresh');
      }

      $data['titulo'] = 'Atualizar cliente';
    } else{
      $data['titulo'] = 'Novo cliente';
    }

    $data['dados'] = $dados;
    $data['empresadados'] = $this->clientes_model->getEmpresasDados($id_cliente);
    $data['view'] = 'admin/clientes/modulo';
    $data['marcas'] = $this->clientes_model->getMarcas();
    $data['navegacao'] = array('titulo' => 'Lista clientes', 'link' => 'admin/clientes');

    $this->load->view('admin/template/index', $data);
  }

  public function core()
  {

    $this->form_validation->set_rules('nome', 'Nome', 'required|trim');

    if ($this->form_validation->run() == TRUE) {

      // ATUALIZA CLIENTE

      // DADOS CLIENTE
      $dadosCliente['nome'] = $this->input->post('nome');
      $dadosCliente['cpf'] = $this->input->post('cpf');
      $dadosCliente['telefone'] = $this->input->post('telefone');
      $dadosCliente['ativo'] = $this->input->post('ativo');

      // CLIENTE JA EXISTE E ATUALIZA NA BASE
      if ($this->input->post('id_cliente')) {

        $dadosCliente['ultima_atualizacao'] = dataDiaDb();
        $this->clientes_model->doUpdate($dadosCliente, $this->input->post('id_cliente'));

        if ($this->input->post('id_marca')) {
          $id_empresa = $this->input->post('id_marca');
        } else{
          $id_empresa = NULL;
        }

        //ATUALIZA USUARIO
        $id = $this->input->post('id_usuario');
        $data = array(
          'nome' => $this->input->post('nome'),
          'id_empresa' => $id_empresa,
          'email' => $this->input->post('email'),
          'password' => $this->input->post('senha')
        );
        $this->ion_auth->update($id, $data);

        redirect('admin/clientes', 'refresh');

      } else{
        // CADASTRO DE NOVO CLIENTE
        $dadosCliente['data_cadastro'] = dataDiaDb();
        $this->clientes_model->doInsert($dadosCliente);

        //RECUPERA ID DO CLIENTE CADASTRADO
        $id_cliente_new = $this->session->userdata('id_cliente_new');

        if ($this->input->post('id_marca')) {
          $id_empresa = $this->input->post('id_marca');
        } else{
          $id_empresa = NULL;
        }

        // GRAVAMOS O USUARIO
        $username = $this->input->post('nome');
        $password = $this->input->post('senha');
        $email = $this->input->post('email');
        $additional_data = [
          'id_cliente' => $id_cliente_new,
          'id_empresa' => $id_empresa
        ];
        $group = [2];
        $this->ion_auth->register($username, $password, $email, $additional_data, $group);

        redirect('admin/clientes/modulo', 'refresh');
      }

    } else{
      $this->modulo();
    }

  }

  public function del($id_cliente=NULL)
  {
    if ($id_cliente) {
      $this->clientes_model->doDelete($id_cliente);
      setMsg("msgCadastro", "Cliente deletado com sucesso", "sucesso");
      redirect('admin/clientes', 'refresh');

    } else{
      setMsg("msgCadastro", "Nao foi possivel deletar o cliente", "erro");
      redirect('admin/clientes', 'refresh');
    }
  }

}
