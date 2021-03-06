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


  public function getPedidoId($id=NULL)
  {

    $this->db->where('id', $id);
    $this->db->limit(1);
    $this->db->select('pedidos.*, status_pedido.*');
    $this->db->from('pedidos');
    $this->db->join('status_pedido', 'status_pedido.id_status = pedidos.status');
    return $this->db->get()->row();
  }

  public function getItens($id=NULL)
  {
    if ($id) {
      $this->db->select('pedidos_produtos.*, produtos.nome_produto, produtos.id');
      $this->db->from('pedidos_produtos');
      $this->db->where('id_pedido', $id);
      $this->db->join('produtos', 'produtos.id = pedidos_produtos.id_produto', 'left');

      return $this->db->get()->result();
    }
  }


  public function getStatus()
  {
    $this->db->order_by('titulo_status', 'asc');
    return $this->db->get('status_pedido')->result();

  }


}
