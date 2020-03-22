<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model{

  public function getClientes()
  {

    $this->db->select('clientes.*, users.*');
    $this->db->from('clientes');
    $this->db->join('users', 'users.id_cliente = clientes.id', 'left');
    return $this->db->get()->result();
  }

  public function doInsert($dados=NULL)
  {
    if (is_array($dados)) {
      $this->db->insert('clientes', $dados);
      $id_cliente_new = $this->db->insert_id();
      $this->session->set_userdata('id_cliente_new', $id_cliente_new);

      if ($this->db->affected_rows() > 0) {
        setMsg('msgCadastro', 'Cliente cadastrado com sucesso', 'sucesso');
      } else{
        setMsg('msgCadastro', 'Nao foi possivel realizar o cadastro do cliente', 'erro');
      }
    }
  }

  public function getClientesId($id=NULL)
  {
    if ($id) {
      $this->db->where('id', $id);
      $this->db->limit(1);
      $query = $this->db->get('clientes');
      return $query->row();
    }
  }

  public function doUpdate($dados=NULL, $id_cliente=NULL)
  {
    if (is_array($dados) && $id_cliente) {

      $this->db->update('clientes', $dados, array('id' => $id_cliente));

      if ($this->db->affected_rows() > 0) {
        setMsg('msgCadastro', 'Cliente atualizado com sucesso', 'sucesso');
      } else{
        setMsg('msgCadastro', 'Nao foi possivel atualizar o cliente', 'erro');
      }
    }
  }

  public function doDelete($id_cliente=NULL)
  {
    if ($id_cliente) {
      $this->db->delete('clientes', array('id' => $id_cliente));
      if ($this->db->affected_rows() > 0) {
        setMsg('msgCadastro', 'Cliente deletado com sucesso', 'sucesso');
      } else{
        setMsg('msgCadastro', 'Nao foi possivel deletar o cliente', 'erro');
      }
    }
  }

  public function getMarcas()
  {
    $this->db->where('ativo', 1);
    $this->db->order_by('nome_marca', 'asc');
    return $this->db->get('marca')->result();
  }


  public function getEmpresasDados($id=null)
  {
    $this->db->where('id_cliente', $id);
    $this->db->limit(1);
    return $this->db->get('users')->row();
  }


}
