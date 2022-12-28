/*******************************BUSCADOR QUE TRAEN DATOS POR AJAX*/
	
//buscador. 
if ($('.search').length) {
  $('.search').on("keyup", function (e) {
    consulta = $('.search').val(),
    $.ajax({
      url: BASE_URL + 'Inicio/buscador',
      type: "POST",
      async: true,
      data: 'q=' + consulta,
      dataType: 'html',
      success: function (data) {
        console.log(consulta);
        $(".respuesta").empty();
        //$(".encabezado").append(`<h1>Productos: ${consulta}</h1>`);
        $(".respuesta").append(data);
      
        // hacer que desaparezca el div resultado si input value == ''
        if ($('.search').val() == '') {
          $(".respuesta").empty();
        }
      }
    });
  });

}

