<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model{

public function listarPedidos($id=null)
{
  if ($id) {
    $this->db->select('pedidos.*, status_pedido.*');
    $this->db->from('pedidos');
    $this->db->where('pedidos.id_cliente', $id);
    $this->db->join('status_pedido', 'status_pedido.id_status = pedidos.status', 'left');
    return $this->db->get()->result();
  }
}

}
