<div class="row">
    <div class="col-12 col-lg-6 text-right">
        <h1 class="fw-bold  m-2 encabezado" style=" margin-top: 10px;">Todos los Productos </h1>
    </div>
    <div class="col-12 col-lg-6 my-auto" id="filtro">
        <button type="button" class="btn btn-outline-dark " id="btnFiltrar">
            Filtrar<img src="<?php echo BASE_URL; ?>app/assets/icon/filtro.svg" alt="flecha" class="mx-2">
        </button>
    </div>
    <div class="menu_filtros d-none mx-3 my-5 col-12 ">
        <div class="row">
            <div class="col col-lg-4 filters" id='tipo'>
                <li><a id="z" href="#">Calzado</a></li>
                <li><a id="r" href="#">Ropa</a></li>
                <li><a id="c" href="#">Complementos</a></li>
            </div>
            <div class="col col-lg-4 filters" id='genero'>
                <li><a id="m" href="#">Mujer</a></li>
                <li><a id="h" href="#">Hombre</a></li>
                <li><a id="x" href="#">Unisex</a></li>
            </div>
            <div class="col col-lg-4 filters">
                <p class="text-start fs-4">Ordenar por: </p>
                <li><a id="precio" href="#">Más barato primero</a></li>
                <li><a id="popular" href="#">Más Me Gusta</a></li>
            </div>

            <!--   <div class="col col-lg-4" id='tipo'>
                <li>
                    <input type="radio" id="ropa" name="tipo" value="r">
                    <label class="mx-3" for="ropa">Ropa</label>
                </li>
                <li>
                    <input type="radio" id="calzado" name="tipo" value="z">
                    <label for="calzado">Calzado</label>

                <li>
                    <input type="radio" id="complementos" name="tipo" value="c">
                    <label for="html">Complementos</label>
                </li>
            </div>
            <div class="col col-lg-4" id='genero'>
                <li>
                    <input type="radio" id="mujer" name="sexo" value="m">
                    <label for="mujer">Mujer</label>
                </li>
                <li>
                    <input type="radio" id="hombre" name="sexo" value="h">
                    <label for="hombre">Hombre</label>
                </li>
              
            </div> -->


            <div class="col col-lg-4">
                <p class="text-start fs-4">Ordenar por: </p>
                <li><a id="" href="#">Más barato primero</a></li>
                <li><a id="" href="#">Más Me Gusta</a></li>
            </div>
            <div class="input-group">

                <label for="precio" class="form-label">
                    <input class="form-range" type="range" id="precio" min="0" max="500" step="5" value="0" style="width: 90%;">
                    Precio max: <span class="mx-3" id="prec"> 10</span><span>€</span>
                    <input type="hidden" id="price" value="10" />
                </label>
            </div>

        </div>
    </div>
</div>

<script>
    //  $('#filtro').on('click', function(e) {


    /*  $("#genero").on("click", "li", function(e) {
         let id = e.target.getAttribute("id");
         let nombre = $(this).text();
         console.log(nombre);
         $.post(BASE_URL + "Catalogo/pintarCatalogo", {
             genero: id
         }, function(data) {
             $("#catag").empty();
             $(".encabezado").text(`Todos los producos de ${nombre}`);
             $("#catag").append(data);
         });

     });
     $("#tipo").on("click", "li", function(e) {
         let id = e.target.getAttribute("id");
         let nombre = $(this).text();
         console.log(nombre);
         $.post(BASE_URL + "Catalogo/pintarCatalogo", {
             tipo: id
         }, function(data) {
             $("#catag").empty();
             $(".encabezado").text(`Productos: ${nombre}`);
             $("#catag").append(data);
         });

     }); */
    // });
    /*    $("#precio").on("change", function(e) {
           console.log("hola");
       }, false); */
    $(document).ready(function() {
        $('#filtro').on('click', mostrarFiltros);
        filterSearch();
        $('input[type=radio]').click(function() {
            filterSearch();
        });
        $('#precio').on('change', precioRango);
    });


    function precioRango(e) {
        console.log('hola');
        $('#prec').html($(this).val() + "");
        $('#price').val($(this).val());
        filterSearch();
    }

    function filterSearch() {
        let genero = '';
        let tipo = '';
        let precio = $('#price').val();
        console.log(precio);
        $.ajax({
            url: "Catalogo/traerFiltrados",
            method: "POST",
            dataType: "json",
            data: {
                precio: precio,
                genero: genero,
                tipo: tipo
            },
            success: function(data) {
                $(".respuesta").html(data.html);
                console.log(data.html);
            }
        })
    }

    function mostrarFiltros(e) {
        let menu = $('.menu_filtros');
        if (menu.hasClass('d-none')) {
            menu.removeClass('d-none');
            menu.addClass('d-block');
        } else {
            menu.addClass('d-none');
        }
    }
    //buscador. 
    /* if ($('.search').length) {
        $('.search').on("keyup", function(e) {
            consulta = $('.search').val(),
                $.ajax({
                    url: BASE_URL + 'Inicio/buscador',
                    type: "POST",
                    async: true,
                    data: 'q=' + consulta,
                    dataType: 'html',
                    success: function(data) {
                        console.log(consulta);
                        $(".respuesta").empty();
                        $(".respuesta").text(`<h1>Todos los productos de ${consulta}</h1>`);
                        $(".respuesta").append(data);

                        // hacer que desaparezca el div resultado si input value == ''
                        if ($('.search').val() == '') {
                            $(".respuesta").empty();
                        }
                    }
                });
        });

    }
 */


    /*  $('#genero').on('click', 'li', function(e) {
            console.log($(this).attr('id'));
        });
    */
    /*     document.querySelectorAll(" li").forEach(el => {
            el.addEventListener("click", e => {
                let id = e.target.getAttribute("id");
                let padre = $(this).parent().parent().attr("id");
                console.log("Se ha clickeado el id " + id + " su padre " + padre);
                $.post(BASE_URL + "Catalogo/filtros", {
                    genero: id
                });
            });
        }); */



    /*          $('#c').on('click', function(e) {
                console.log('comp');
            });
            $('#z').on('click', function(e) {
                console.log('calzado');
            });
            $('#r').on('click', function(e) {
                console.log('rop');
            });
            $('#h').on('click', function(e) {
                console.log('hombre');
            });
            $('#m').on('click', function(e) {
                console.log('mujer');
            });
            $('#x').on('click', function(e) {
                console.log('unisex');
            });
            $('#precio').on('click', function(e) {
                console.log('precio');
            });
            $('#popular').on('click', function(e) {
                console.log('pop');
            }); */
</script>