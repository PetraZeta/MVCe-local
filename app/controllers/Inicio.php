<?php

class Inicio extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //instanciar los objetos que guardaran los datos tras la llamada a su modelo
        $this->productosM = $this->load_model("ProductosM");
        $this->tiendasM = $this->load_model("TiendasM");
        $this->marcasM = $this->load_model("MarcasM");
    }
    public function index()
    {

        $datos['tiendas'] = $this->tiendasM->pintarTodos();
        $datos['marcas'] = $this->marcasM->pintarTodos();

        $this->load_view("plantilla/header");
        $this->load_view("plantilla/menu", $datos);
        $this->load_view("inicio");
        $this->load_view("plantilla/footer");
    }
    public function buscador()
    {
        /* pinta una vista con los productos que coincidan */
        $datos['tiendas'] = $this->tiendasM->pintarTodos();
        $datos['marcas'] = $this->marcasM->pintarTodos();
   /*      $precio= isset($_POST['precio']) ? $_POST['precio'] : "%%";
        $genero = isset($_POST['genero']) ? $_POST['genero'] : "%%";
        $categoria = isset($_POST['tipo']) ? $_POST['tipo'] : "%%";
        echo $precio, $genero,$categoria; */
        $datos['resultadoBusqueda'] = $this->productosM->traerBuscados($_POST['q']);
        $datos['titulo']= "Resultado de la búsqueda";
        $this->load_view("busqueda", $datos);
       
    }

}
