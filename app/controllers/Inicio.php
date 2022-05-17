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
        /* trae las coincidencias y las pinta en el div bajo el buscador */
        $productos = $this->productosM->traerBuscados($_POST['q']);
        if ($productos) {
            foreach ($productos as $p) { ?>
                <p class="mx-3">
                    <a 
                    href="" 
              
                    data-id="<?php echo $p['id']; ?>" 
                    class="verProducto"> 
                    <?php echo $p['nombre']; ?>
                    
                    </a>
                </p>
                
              
<?php    }
        } else {
            echo ' <p class="mx-3">No hay coincidencias</p>';
        }
        /*TODO----> pintar el catalogo con las coincidencias */
        /*TODO----> añadir a con enlace a ficha de producto */
    }
   
     /*VISTA TIENDA Y SU CATALOGO  ¿hago un controlador Tienda????*/
    public function tienda()
    {
        print_r($_POST);
        $datos['tiendas'] = $this->tiendasM->traerUno($_POST['idT']);
        $datos['productos'] = $this->productosM->pintarProdTienda($_POST['idT']);
       
        $this->load_view("plantilla/header");
        $this->load_view("tienda", $datos);
        $this->load_view("catalogo", $datos);
        $this->load_view("plantilla/footer");
    }
}

?>