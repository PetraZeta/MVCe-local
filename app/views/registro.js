//hacer que si el checkbox primero esta seleccionado, se seleccionen los demas y si se seleccionan los tres, se marque el de arriba
let misChek = $("#preferencias input[type='checkbox']");

misChek.click(function() {
    //cant de cajas seleccionadas y cant de cajas totales
    const cant = $("#preferencias input[type='checkbox']:checked").length;
    const cantSelec = misChek.length;  
    console.log(cant);
    console.log(cantSelec);
  //si se seleccionan todos los check de preferencias, poner el primero a check y mostrar mensaje al usuario
    if (cantSelec == cant) {
        
        $('#recibirCorreo').prop("checked", true);
        $('.ok').fadeIn(3000);//no funciona??
    } else {
        $('#recibirCorreo').prop("checked", false);
        $('.ok').fadeOut('slow');
    }
    /**REVISAR Y QITAR TODO EL TEMA DE VALUE K YA NO SIRVE */
    /*cambiar el valor de value si esta a checked TODO ESTO ME LO AHORRO VALIDANDO EN EL CONTROLADOR COMO HICE EN PRINCIPIO*/
/*     if (this.checked) {
        this.value = 1;
    } else {
        this.value = 0;
    }
    console.log($('#ofertas').val() + 'of');
    console.log($('#descuentos').val() + 'des');
    console.log($('#novedades').val() + 'nov'); */
});
 

$('#recibirCorreo').click(function() {
    //TODO---> Si el check primero esta seleccionado, seleccionar los demas y cambiar su value a 1
    //NO FUNCIONA BIEN, Si quito todos el value no vuelve a 0, si marco todos los values tampoco vuelven a 1
    if ($('#recibirCorreo').is(':checked')) {
        $("#preferencias input[type='checkbox']").prop('checked', true);
        $('.ok').show();    
    } else {
        $("#preferencias input[type='checkbox']").prop('checked', false);
        $('.ok').hide();
    }
});
   
/*VALIDAR QUE LAS DOS CLAVES SEAN IGUALES ********************** */

$('#rclave').keyup(function () {
     if ($('#clave').val() != $('#rclave').val()) {
         $('#validaPass').html('las claves no coinciden');
         $('#validaPass').addClass('alert alert-danger');
     } else {
         $('#validaPass').html('las claves coinciden');
         $('#validaPass').removeClass('alert alert-danger');
         $('#validaPass').addClass('alert alert-success');
    }
});
  
/*************VALIDAR MAIL (expresion regular)************************** */

$('#email').keyup(function () {
    //$("#loaderIconEmail").show();
    var res = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
     console.log(res);
    if (!res) {
        $("#validaMail").html('email no valido');
        $("#validaMail").addClass('alert alert-danger');

    } else {
        $("#validaMail").html('email valido');
        $('#validaMail').removeClass('alert alert-danger');
        $('#validaMail').addClass('alert alert-success');
    }
});
  
/*************VALIDAR MAIL AJAX************************** */

$('#email').blur(function () {
    $.ajax({
        url: BASE_URL + 'Usuario/verificaMail',
        type: 'post',
        data: { email: $('#email').val() },
        
        success: function (data) {
           
           
            if (data == 1) {
                /** Response me trae 1 si esta en uso y 0 si no lo esta
                      */
                $("#validaMail").html('email en uso. Use otro o dirigirse a login');
                $("#validaMail").removeClass('alert alert-success');
                $("#validaMail").addClass('alert alert-danger');
		    
            } else {
                $("#validaMail").html('email sin uso');
            }
	
        },
        error: function () { }
    });
});       
     /*************VALIDAR REGISTRO AJAX************************** */
//recoger datos del registro y enviar por ajax a la funcion del controlador
//funcion que se ejecuta con el evento onclick del boton de registro
function registrar_ajax() {
    nombre = $('#nombre').val(),
    clave = $('#clave').val(),
    rclave = $('#rclave').val(),
    email = $('#email').val(),
    ofertas = $('#ofertas').val(),
    descuentos = $('#descuentos').val(),
    novedades = $('#novedades').val()

    $.ajax({
        url: BASE_URL + 'Usuario/agregarUsuario',
        type: 'post',
        data: { nombre: nombre, email: email, clave: clave, rclave: rclave, ofertas: ofertas,descuentos:descuentos, novedades:novedades},
        success: function (data) {
            console.log(data);
            if (data === 1) {
                $('#validaRegistro').html('registro exitoso');
                $('#validaRegistro').removeClass('alert alert-danger');
                $('#validaRegistro').addClass('alert alert-success');
                $('#registro').modal('hide');
                $('#nombre').val('');
                $('#clave').val('');

            } else {
                $('#validaRegistro').html('registro fallido');
                $('#validaRegistro').removeClass('alert alert-success');
                $('#validaRegistro').addClass('alert alert-danger');
            }
        },
        error: function () { }
    });
}