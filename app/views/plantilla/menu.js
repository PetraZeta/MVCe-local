/*       $(document).ready(main);
       let cont=1;
       function main(){ 
           $('.submenu').click(function(){
               $(this).children('.children').slideToggle();
           });
           $('.buscar').click(function(){
               $(this).children('.children').slideDown();
            
           });
           
          
       } */
   /*     $('.abrirSidebarMenu').click(function(){
          $('.diagonal-1').addClass('activardiagonal-1').toggle();
          $('.horizontal').addClass('activarhorizontal').toggle();
          $('.diagonal-2').addClass('activardiagonal-2').toggle();
       }); */
  
/*ANIMCIONES*/
/* $(document).on('ready',function(){
  $('.burbuja').animate({
    marginTop:0,
  }, 5000, function(){
    $('.burbuja').animate({
    marginTop:600,
    opacity:0.5
  })
})
}) */

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
  
})
  


/* document.openSubmenu.forEach(item => {
  item.addEventListener("click", abrirSubMenu);
console.log(item);

})

function abrirSubMenu() {
  abrir = this.getElementsByTagname(".abrirSubMenu")[0];
  abrir.classList.toggle("activarVertical");
console.log(abrir);

}   */
 



/* $(".abrirSubMenu").click(function (e) {
  let openSubmenu = document.querySelectorAll(".abrirSubMenu");
  console.log("Hiciste un click");
console.log(openSubmenu[0]);
  openSubmenu.classList("activarVertical");
  i++;
  if (i == 2) {
    console.log("de desactivo un click");

$("#aDiv").off('click');
  }
      console.log(i);
});  */



    $(document).ready(function() {
       let $menu = $('.menu').find('ul').find('li');

        $menu.hover(function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideDown();
        }, function() {
            $(this).children('ul').stop();
            $(this).children('ul').slideUp();
        });
    }); 
  



/*funcion para hacer desplegable una seccion*/

/*         $(document).ready(function(){
            let estado=false;
            $('.abrirSubMenu').on('click', function(){
              vert.classList.toggle("activarVertical");
            if(estado==true){
                $(this).text("Abrir");
            }else{
                $(this).text('Cerrar')
            }
            })
            }) */
