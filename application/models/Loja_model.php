<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loja_model extends CI_Model{

  public function getDadosLoja(){
    $this->db->where('id', 1);
    return $this->db->get('config')->row();
  }

  public function getCategorias()
  {
    $this->db->where(['ativo' => 1, 'id_cat_pai' => NULL]);
    return $this->db->get('categorias')->result();
  }

  public function getSubCategoria($id=NULL)
  {
    if ($id) {
      $this->db->where(['ativo' => 1, 'id_cat_pai' => $id]);
      return $this->db->get('categorias')->result();
    } else{
      return false;
    }
  }

  public function getProdutos($pular=null,$produto_por_pagina=null)
  {
    $this->db->select('produtos.id, produtos.nome_produto, produtos.valor, produtos.meta_link, produtos.informacao, produtos.estoque, produtos_fotos.foto, categorias.nome as nome_categoria');
    $this->db->from('produtos');
    if ($pular && $produto_por_pagina) {
      $this->db->limit($produto_por_pagina,$pular);
    } else{
      $this->db->limit($produto_por_pagina);
    }
    $this->db->join('produtos_fotos', 'produtos_fotos.id_produto = produtos.id', 'left');
    $this->db->join('categorias', 'categorias.id = produtos.id_categoria', 'left');
    $this->db->where(['produtos.ativo' => 1]);
    $this->db->order_by('produtos.id', 'RANDOM');
    $this->db->group_by('produtos.id');
    // $this->db->distinct();
    return $this->db->get()->result();

  }

  public function getQtd($id)
  {

    $this->db->select('produtos.id, produtos.estoque');
    $this->db->from('produtos');
    $this->db->where(['id' => $id]);
    $this->db->limit(1);
    return $this->db->get()->row();


  }

  public function contarProdutos()
  {
    return $this->db->count_all('produtos');
  }

}
