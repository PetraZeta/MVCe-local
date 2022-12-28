//funciones asociadas a eventos de click de botones


// pasa el id de usuario y de producto para añadir a la bbdd
function sumaFavorito( productId) {
    $.ajax({
        url: BASE_URL + 'Usuario/agregarFavorito',
        type: 'post',
        data: {productId: productId},
        success: function (data) {
            //TODO..sumar 1 a prducto.favoritos 
             if (data != 0) {
                swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Producto agregado a favoritos',
                showConfirmButton: false,
                timer: 3000
            });  
            }
            // si el usuario no esta loggeado
            else {
                swal.fire({
                position: 'top-center',
                icon: 'warning',
                title: 'Este producto ya esta entre tus favoritos',
                showConfirmButton: false,
                timer: 3000
            }); 
            }
        }
    });
}

// para eliminar un producto d favoritos
function eliminarFavorito(productId) {
    $.ajax({
        url: BASE_URL + 'Usuario/eliminarFavorito',
        type: 'post',
        data: {productId: productId},
        success: function (data) {
            //refresca la pagina
            //TODO..restar 1 a prducto.favoritos 
                swal.fire({
                position: 'top-center',
                icon: 'success',
                title: 'Producto eliminado de favoritos',
                showConfirmButton: false,
                timer: 3000
            }); 
           location.reload();
        }
    });
}