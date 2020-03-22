<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca_model extends CI_Model{

  public function getBusca($query=NULL, $id_empresa=NULL)
  {
    if ($query) {
      $this->db->select('produtos.*, produtos_fotos.*, categorias.nome as nome_categoria');
      $this->db->from('produtos');
      $this->db->where(['produtos.ativo' => 1, 'produtos.id_marca' => $id_empresa]);
      $this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
      $this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
      $this->db->like('produtos.nome_produto', $query, 'both');
      $this->db->or_like('produtos.cod_produto', $query, 'both');
      $this->db->group_by('produtos.id');
      return $this->db->get()->result();
    }
  }

}
