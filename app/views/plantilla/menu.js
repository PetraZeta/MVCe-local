/*Animacion y funcionalidad del boton que abre el menu*/

document.querySelector(".abrirSidebarMenu").addEventListener("click", abrirMenu);

let diag1=document.querySelector(".diagonal-1");
let hor=document.querySelector(".horizontal");
let diag2=document.querySelector(".diagonal-2"); 
let menu=document.querySelector("header"); 
let main_act = document.querySelector("main");

function abrirMenu() {
  //activar las clases que convierten las barras en aspa
  diag1.classList.toggle("activardiagonal-1");
  hor.classList.toggle("activarhorizontal");
  diag2.classList.toggle("activardiagonal-2");
/*Desapaerer el menu y centrar el main*/
  menu.classList.toggle("header_activar");
  main_act.classList.toggle("main_activar");

}  
 /*Animacion y funcionalidad del boton que abre el submenu*/
/*selecionar barra vertical del signo +*/
let vert = document.querySelectorAll(".vertical");
/*selecionar el signo +*/
let openSubmenu = document.querySelectorAll(".abrirSubMenu");

console.log(openSubmenu[0]);
console.log(openSubmenu[1]);
console.log(vert[2]);

$(".abrirSubMenu").on('click', function (e) {

  $('.vertical').addClass('activarVertical');
  console.log(openSubmenu[0]);
  
});
/*     $(document).ready(function() {
       let $menu = $('.menu').find('ul').find('li');

        $menu.hover(function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideDown();
        }, function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideUp();
        });
    });  */
/*EVENTOS QUE TRAEN DATOS POR AJAX*/

$(document).ready(main);
	//funcion que que abre y cierra los submenus y el buscador



	function main() {
 /*    $('.tienda').click(function () { */
     /*  alert($(this).attr('data-id')); */
 /*      const idTienda = $(this).attr('data-id');
      $.post(BASE_URL + "Tienda", { idT: idTienda }, function () {
        location.href = BASE_URL + "Tienda/index/" + idTienda;
      }); */
			/* 	e.preventDefault;
				console.log($(this));
				if ($(this).hasClass('activado')) {
					$(this).removeClass('activado');
					$(this).children('ul').slideUp();
				} else {
					$('.menu li ul').slideUp();
					$('.menu li').removeClass('activado');
					$(this).addClass('activado');
					$(this).children('ul').slideDown();

				} */
			/* $(this).children('.children').slideToggle(); */
			//acceder a su hijo abrir submenu y modificar las clases de su hijo spiner vertical
/*     }); */
     //quitar el boton de +
    $('.buscar').click(function() {
      $(this).children('.abrirSubMenu').hide();
    }); 
    ///MOSTRAR DE NUEVO EL + NO ME FUNCIONA
    $('.buscar').blur(function() {
      $(this).children('.abrirSubMenu').show();
    }); 
		//buscador. 
    if ($('.search').length) {
      $('.search').on("keyup", function (e) {
				consulta = $('.search').val();
				$.ajax({
					url: BASE_URL + 'Inicio/buscador',
					type: "POST",
					async: true,
					data: 'q=' + consulta,
					dataType: 'html',
					success: function(data) {
						$(".respuesta").empty();
            $(".respuesta").append(data);
            //solucionado hacer que desaparezca el div resultado si input value == ''
            if ($('.search').val() == '') {
              $(".respuesta").empty();
            }
					}

				});
      });
		}
		/*TODO--->click en algun p de la lista de sugerencias que abra el modal carta producto*/
		$('.verProducto').click(function(e) {
      e.preventDefault();
      console.log('hola');
			$.post(
				BASE_URL + 'Catalogo/pintarModal',
			 {
         id: $(this).data('id')
        } ,
        function (data) {
          $(".respuesta").empty();
          $(".respuesta").append(data);
        }
		   );
		});

	}



