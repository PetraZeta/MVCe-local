<?php

class Tienda extends Controller
{
    private $productosM;
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
        //traer todos los articulos de la tienda
        $datos['productos'] = $this->tiendasM->traerProductos($id);
        //cargar vistas y datos
        $this->load_view("plantilla/header");
        $this->load_view("tienda", $datos);
        $this->load_view("catalogo", $datos);
        $this->load_view("plantilla/footer");
    }
    public function marca($parametros = [])
    {
        //RECIBE UN ID POR PARAMETRO DE TIENDA PARA MOSTRAR
        $id = $parametros[0];
        $datos['marcas'] = $this->marcasM->traerUno($id);
        //traer todos los articulos de la tienda
        $datos['productos'] = $this->marcasM->pintarProdMarca($id);
        //cargar vistas y datos
        $this->load_view("plantilla/header");
        $this->load_view("marca", $datos);
        $this->load_view("catalogo", $datos);
        $this->load_view("plantilla/footer");
    }

    public function pintarCatalogo() //traer articulos segun sea
    {

        /*TODO----> preguntar si viene algun filtro (nombre de tienda o marca) */
        /*     $productos = $this->productosM->pintarTodos(); */
    }

    /*     public function pintarModal()
    {
        $producto = $this->productosM->traerUno($_POST['id']);
        print_r($_POST);


        ?>
        <div class="modal fade" id="cartaProd">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>

                    </div>
                    <div class="modal-body">

                        <div class="carta_img">
                            <img src="<?php echo BASE_URL; ?>app/assets/fotos/<?php echo $producto['imagen']; ?>" alt="">
                        </div>
                        <p><?php echo $producto['descripcion']; ?></p>
                        <h5 class="carta_precio">P.V.P: <?php echo $producto['precio']; ?>€</h5>
                        <a href="#" class="btn btn-xl btn-dark agregar-favorito">Agregar a Favoritos</a>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                           <button type="button" class="btn btn-primary" id="guardar-cliente">Visitar Tienda</button>

                    </div>
                </div>
            </div>
        </div>
<?php
    } */
}
