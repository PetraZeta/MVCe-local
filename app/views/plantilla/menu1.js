/*******************************BUSCADOR QUE TRAEN DATOS POR AJAX*/
//mostrar el input del buscador cuando se hace click y 
/* $('.buscar').click(function() {
  $(this).children('.abrirSubMenu').hide();
}); 
$('.buscar').blur(function() {
  $(this).children('.abrirSubMenu').show();
});  */
//buscador. 
if ($('.search').length) {
  $('.search').on("keyup", function (e) {
    consulta = $('.search').val(),
      precio = $('#precio').val(),
      genero = $('#sexo').val(),
      tipo=$('#tipo').val()
       console.log(consulta);
    $.ajax({
      url: BASE_URL + 'Inicio/buscador',
      type: "POST",
      async: true,
      data: 'q=' + consulta, precio, genero, tipo,
      dataType: 'html',
      success: function(data) {
        $(".respuesta").empty();
        $(".respuesta").append(data);
       
        // hacer que desaparezca el div resultado si input value == ''
        if ($('.search').val() == '') {
          $(".respuesta").empty();
        }
        //Esta respuesta pinta los productos devueltos y muestra en una vista.  
        /*  $('.verProducto').on('click', function (e) {
 
          $.post(
            BASE_URL + 'Inicio/pintarModal',
            {
              id: $(this).data('id'),
              id_tienda: $(this).data('tienda'),
              id_marca: $(this).data('marca')

            } ,
            function (data) {
              $("#cartaProd").modal({
                modal: true,
                buttons: {
                  Ok: function () {
                    $( this ).modal( "close" );
                  }
                }
              });
              $("#cartaProd").html(data);
            }); 
        });*/
      }
    });
  });

}




	
	






