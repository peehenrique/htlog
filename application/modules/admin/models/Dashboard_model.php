<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

  public function getTotal($tabela=NULL)
  {
    if ($tabela) {
      $query = $this->db->get($tabela);
      return $query->num_rows();
    }
  }


  public function getPedidos()
  {

    $this->db->select('pedidos.*, status_pedido.*');
    $this->db->from('pedidos');
    $this->db->join('status_pedido', 'status_pedido.id_status = pedidos.status', 'left');
    return $this->db->get()->result();

  }

  public function getClientes()
  {
    $this->db->select('clientes.nome, clientes.data_cadastro');
    $this->db->from('clientes');
    $this->db->order_by('data_cadastro', 'desc');
    $this->db->limit(10);
    return $this->db->get()->result();
  }

}
