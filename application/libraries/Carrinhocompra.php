<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinhocompra{

  public function __construct()
  {
    //VERIFICA SE JA EXISTE ITEM NO CARRINHO
    if ( !isset($_SESSION['carrinho']) ) {
      $_SESSION['carrinho'] = [];
    }

  }

  // ADICIONAR UM PRODUTO NO Carrinho
  public function add($id, $qtd)
  {
    if (isset($_SESSION['carrinho'][$id])) {
      $_SESSION['carrinho'][$id] = $_SESSION['carrinho'][$id] + $qtd;
    } else{
      $_SESSION['carrinho'][$id] = $qtd;
    }
  }

  //ALTERA QUANTIDADE
  public function altera($id, $qtd)
  {
    if (isset($_SESSION['carrinho'][$id])) {
      if ($qtd > 0) {
        $_SESSION['carrinho'][$id] = $qtd;
      } else{
        $this->apaga($id);
      }
    }
  }

  //APAGAR PRODUTO
  public function apaga($id)
  {
    unset($_SESSION['carrinho'][$id]);
  }

  //LIMPAR CARRINHO
  public function limpa()
  {
    unset($_SESSION['carrinho']);
  }
  //LISTAR OS PRODUTOS
  public function listarProdutos()
  {
    $CI =& get_instance();
    $CI->load->model('loja/carrinho_model');

    $retorno = [];
    $indice = 0;

    foreach ($_SESSION['carrinho'] as $id => $qtd) {
      $query = $CI->carrinho_model->getProduto($id);

      $retorno[$indice]['id'] = $query->id;
      $retorno[$indice]['nome'] = $query->nome_produto;
      $retorno[$indice]['produto_foto'] = $query->foto;
      // $retorno[$indice]['valor'] = $query->valor;
      $retorno[$indice]['qtd'] = $qtd;
      // $retorno[$indice]['subtotal'] = number_format( $qtd * $query->valor, 2, '.', '');
      // $retorno[$indice]['peso'] = $query->peso;

      $indice++;
    }

    return $retorno;

  }

  //TOTAL DO CARRINHO
  public function total()
  {
    $produto = $this->listarProdutos();
    $total = 0;
    foreach ($produto as $indice => $linha) {
      $total += $linha['subtotal'];
    }

    return $total;
  }

  //PESO TOTAL PRODUTOS
  public function totalPeso()
  {
    $produto = $this->listarProdutos();
    $total = 0;

    foreach ($produto as $indice => $linha) {
      $total += $linha['peso'] * $linha['qtd'];
    }

    return $total;
  }

  //TOTAL DE ITEM
  public function totalItem()
  {
    $produto = $this->listarProdutos();
    return count($produto);
  }

  //PEGAR O MAIOR PRODUTO
  public function getMaiorProduto()
  {
    $produto = $this->listarDimensao();
    $maior = NULL;
    $item = [];

    foreach ($produto as $indice => $linha) {
      if ($maior == NULL) {
        $maior = $linha['dimensao'];
        $item = $linha;
      } else{
        if ($linha['dimensao'] > $maior) {
          $maior = $linha['dimensao'];
          $item = $linha;
        }
      }
    }

    return $item;

  }


  //LISTAR DIMENSAO DOS PRODUTOS PEGAR PRODUTO COM CAIXA MAIOR
  public function listarDimensao()
  {
    $CI =& get_instance();
    $CI->load->model('loja/carrinho_model');

    $retorno = [];
    $indice = 0;

    foreach ($_SESSION['carrinho'] as $id => $qtd) {
      $query = $CI->carrinho_model->getProdutoDimensao($id);

      $retorno[$indice]['id'] = $query->id;
      $retorno[$indice]['altura'] = $query->altura;
      $retorno[$indice]['largura'] = $query->largura;
      $retorno[$indice]['comprimento'] = $query->comprimento;
      $retorno[$indice]['dimensao'] = $query->altura + $query->largura + $query->comprimento;

      $indice++;
    }

    return $retorno;

  }

}
