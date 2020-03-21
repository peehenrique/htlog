<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('carrinhocompra');
  }

  function index()
  {

    if ($this->ion_auth->logged_in() && $this->ion_auth->in_group(2))
    {
      redirect('loja');
    }

    $this->form_validation->set_rules('email', 'E-mail', 'required');
    $this->form_validation->set_rules('senha', 'Senha', 'required');

    if ($this->form_validation->run() == TRUE) {

      $identity = $this->input->post('email');
      $password = $this->input->post('senha');
      $remember = ($this->input->post('manter_conectado') != NULL ? TRUE : FALSE);

      if ($this->ion_auth->login($identity, $password, $remember)) {

        if ($this->ion_auth->in_group(2)) {

          if ($this->carrinhocompra->totalItem() != 0) {
            redirect('checkout', 'refresh');
          } else{
            redirect('loja', 'refresh');
          }

        } else{
          $this->ion_auth->logout();
          redirect('/','refresh');
        }


      } else{
        redirect('login','refresh');
      }

    } else{
      $this->load->view('login/index');
    }


  }


  public function sair(){
    $this->ion_auth->logout();
    redirect('/','refresh');
  }


}
