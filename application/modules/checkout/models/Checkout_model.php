<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model{

  public function getDadosUsuario($id=null)
  {
    if ($id) {
      $this->db->where('id', $id);
      $this->db->limit(1);
      return $this->db->get('clientes')->row();
    }
  }

  public function doInsertPedido($dados=NULL)
  {
    if (is_array($dados)) {
      $this->db->insert('pedidos', $dados);
      $last_id_pedido = $this->db->insert_id();
      $this->session->set_userdata('last_id_pedido', $last_id_pedido);
    }
  }

  public function doInsertPedidoProdutos($dados=NULL)
  {
    if (is_array($dados)) {
      $this->db->insert('pedidos_produtos', $dados);
    }
  }

  public function atualizarEstoque($qtd = null, $id_produto = null)
  {
      $this->db->update('produtos', $qtd, array('id' => $id_produto));
  }

  public function getProdutoId($id = null)
  {
    $this->db->where('id', $id);
    $this->db->limit(1);
    return $this->db->get('produtos')->row();
  }
}
