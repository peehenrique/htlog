var App = function(){


var atualizarQtdCarrinho = function(){

  $('.btn-atualizar-qtd-carrinho').on('click', function(){

    var id_produto = $(this).attr('data-id');
    var qtd_compra = $("#carrinho_qtd_"+id_produto).val();

    if (qtd_compra != 0) {

      $.ajax({
        type: 'post',
        url: url_loja +'checkout/alterar',
        data: {id:id_produto, qtd: qtd_compra},
        dataType: 'JSON'
      }).then (function(res){

        if (res.erro == 0) {
          // location.reload();
          $(location).attr('href', url_loja+'checkout');
        } else{
          alert(res.msg);

        }

      }, function(){
        alert('Erro ao remover produto');
      });

    } else{
      alert('Nao pode passar valor 0');
    }

  });
}

  var addProdutoCarrinho = function (){
    $('.btn-add-to-cart').on('click', function(){

      var id_produto = $(this).attr('data-id');
      var qtd_produto = $('#qtd_produto_'+id_produto).val();
      var estoque_valor = $('#estoque_valor'+id_produto).val();

      if (qtd_produto == "") {


        if (confirm("Preencha o campo estoque")) {
          location.reload();
        } else{
          location.reload();
        }

      } else{
        $.ajax({
          type: 'post',
          url: url_loja +'checkout/addProduto',
          data: {id:id_produto,qtd:qtd_produto,estoque:estoque_valor},
          dataType: 'JSON'
        }).then (function(res){

          if (res.erro == 0) {
            $('.total-carrinho-menu').html(res.itens);

          } else{
            alert(res.msg);

            $('.add-to-cart').removeClass("d-none");
            $('.view-in-cart').addClass("d-none");
            $('.view-in-cart').removeClass("d-inline-block");

          }

        }, function(){
          alert('Erro ao adicionar produto');
        });
      }

    });
  }


  var limitarInputQtd = function(){

    var quantityCounter = $(".quantity-counter"),
      CounterMin = 1,
      CounterMax = 1000000000;
    if (quantityCounter.length > 0) {
      quantityCounter.TouchSpin({
        min: CounterMin,
        max: CounterMax
      }).on('touchspin.on.startdownspin', function () {
        var $this = $(this);
        $('.bootstrap-touchspin-up').removeClass("disabled-max-min");
        if ($this.val() == 1) {
          $(this).siblings().find('.bootstrap-touchspin-down').addClass("disabled-max-min");
        }
      }).on('touchspin.on.startupspin', function () {
        var $this = $(this);
        $('.bootstrap-touchspin-down').removeClass("disabled-max-min");
        if ($this.val() == CounterMax) {
          $(this).siblings().find('.bootstrap-touchspin-up').addClass("disabled-max-min");
        }
      });
    }

  }


var removerItemCarrinho = function(){

  $('.remover-item-carrinho').on('click', function(){

    var id_produto = $(this).attr('data-id');

    $.ajax({
      type: 'post',
      url: url_loja +'checkout/apagar_item',
      data: {id:id_produto},
      dataType: 'JSON'
    }).then (function(res){

      if (res.erro == 0) {
        $(location).attr('href', url_loja+'carrinho');
        // $(this).closest(".ecommerce-card").remove();
      } else{

      }

    }, function(){
      alert('Erro ao remover produto');
    });

  });

}

var limparCarrinho = function(){

  $('.btn-limpar-carrinho').on('click', function(){

    $.ajax({
      type: 'post',
      url: url_loja +'checkout/limpar',
      data: {limpar:true},
      dataType: 'JSON'
    }).then (function(res){

      if (res.erro == 0) {
        $('.total-carrinho-menu').html("0");
        $(location).attr('href', url_loja+'');
      } else{
      }

    }, function(){
      // alert('Erro ao remover produto');
    });


  });
}

  var getCarrinhoitem = function(){

    $.getJSON(url_loja+'checkout/getCarrinhoTopo', function(res){

      if (res.erro == 0) {
        $('.total-carrinho-menu').html(res.itens);

      }

    });

  }
  //

  return {
    init: function(){
      addProdutoCarrinho();
      getCarrinhoitem();
      limitarInputQtd();
      atualizarQtdCarrinho();
      removerItemCarrinho();
      limparCarrinho();
    }
  }

}();

jQuery(document).ready(function(){
  App.init();
});
