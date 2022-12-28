<?php

class Tienda extends Controller
{
    private $tiendasM;


    public function __construct()
    {
        parent::__construct();
        $this->productosM = $this->load_model("ProductosM");
        $this->tiendasM = $this->load_model("TiendasM");
        $this->marcasM = $this->load_model("MarcasM");

  
    }
 
    public function index($parametros = [])
    {
        //RECIBE UN ID POR PARAMETRO DE TIENDA PARA MOSTRAR
       
        $id=$parametros[0];
     
        $datos['tiendas'] = $this->tiendasM->traerUno($id);
        $nombre = $datos['tiendas']['nombre'];
        $datos['titulo'] = "Todos los productos de $nombre ";
        //traer todos los articulos de la tienda
        $datos['productos'] = $this->tiendasM->traerProductos($id);

        //cargar vistas y datos
        $this->load_view("plantilla/header", $datos);
        $this->load_view("tienda", $datos);
        $this->load_view("catalogo", $datos);
        $this->load_view("plantilla/footer");
    }
    /**Metodo que se pinta la vista marca, recibe un id de tienda */
    public function marca($parametros = [])
    {
        //RECIBE UN ID POR PARAMETRO DE TIENDA PARA MOSTRAR
        $id = $parametros[0];
        $datos['marcas'] = $this->marcasM->traerUno($id);
        $nombre = $datos['marcas']['nombre'];
        $datos['titulo'] = "Todos los productos de $nombre ";
        //traer todos los articulos de la tienda
        $datos['productos'] = $this->marcasM->pintarProdMarca($id);
        //cargar vistas y datos
        $this->load_view("plantilla/header", $datos);
        $this->load_view("marca", $datos);
        $this->load_view("catalogo", $datos);
        $this->load_view("plantilla/footer");
    }
 

       
}
