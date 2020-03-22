<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends MX_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    echo "acessou a pagina teste modulo";
  }

}
