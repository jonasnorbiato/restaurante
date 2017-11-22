
$(document).ready(function(){
   $(".btn-apagar").click( function(event) {
      var apagar = confirm('Deseja realmente excluir este registro?');
      if (apagar){
              
      }else{
         event.preventDefault();
      } 
   });
});


$(function () {
    $('#fupload').change(function() {
         $('.nomeArquivo').html('<b>Arquivo Selecionado:</b>' + $(this).val());
    });
});



