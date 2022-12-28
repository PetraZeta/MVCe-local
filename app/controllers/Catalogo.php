<?php

class Catalogo extends Controller
{
    private $productosM;

    public function __construct()
    {
        parent::__construct();
        $this->productosM = $this->load_model("ProductosM");
        $this->tiendasM = $this->load_model("TiendasM");
        $this->marcasM = $this->load_model("MarcasM");
        
    }
    public function index()
    {
        

        //traer todas las marcas y tiendas para pintar en submenus
        $datos['tiendas'] = $this->tiendasM->pintarTodos();
        $datos['marcas'] = $this->marcasM->pintarTodos();
        $datos['titulo']="Catálogo";
        //traer todos los articulos del catalogo
        $datos['productos'] = $this->productosM->pintarTodos();
        $datos['productosfilt'] = $this->productosM->traerFiltrados();

        //cargar vistas y datos
        $this->load_view("plantilla/header",$datos);
      
        $this->load_view("plantilla/menu", $datos);
        $this->load_view("catalogo",$datos);
        $this->load_view("plantilla/footer");
        var_dump($_POST);
    }
   

    
}
