


var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$(document).on('click', '.btGerarPDF', function(){
  doc.fromHTML($('#conteudo').html(), 15, 15, {
      'width': 1280,
          'elementHandlers': specialElementHandlers
  });
  doc.save('exemplo-pdf.pdf');

});
