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
                    href="<?php echo BASE_URL; ?>Catalogo/pintarModal" data-bs-toggle="modal" 
                    data-bs-target="#cartaProd" 
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
    public function login()
    {
        $this->load_view("plantilla/header");
        $this->load_view("login");
    }
    public function registro()
    {
        $this->load_view("plantilla/header");
        $this->load_view("registro");
    }
    public function agregarUsuario()
    {
        $usuariosM = $this->load_model("UsuariosM");
        //capturar clave y encriptarla
        print_r($_POST);
        $_POST['clave']=password_hash($_POST['clave'],PASSWORD_DEFAULT );
        //preguntar si vienen los check y asignar 0 o 1 para guardar en bbdd
        isset($_POST['novedades']) ? $_POST['novedades']=1: $_POST['novedades']=0;
        isset($_POST['ofertas']) ? $_POST['ofertas'] = 1 : $_POST['ofertas'] = 0;
        isset($_POST['descuentos']) ? $_POST['descuentos'] = 1 : $_POST['descuentos'] = 0;
      
        $usuariosM->agregar($_POST);
        //$_POST tiene un array con los datos que se envian al metodo agregar del modelo usuario. 
        //TODO_-->mostrar mensaje success
        $datos['ok'] = "Bien! Te has registrado correctamente. Logueate para entrar.";
        //Redirigir a inicio
        header("location:" . BASE_URL . "Inicio/index");
    } 

    public function olvido()
    {
        $this->load_view("olvido");
    }

    public function logout()
    {
        session_destroy();
        header("location:" . BASE_URL . "Inicio/index");
    }

    public function verificaLogin()
    {
        //cargar el modelo de usuarios, llamar al metodo que trae el usuario segun su email (unico) y guardar en la variable de sesion $usuarios los datos 
        $usuariosM = $this->load_model("UsuariosM");
        $usuario = $usuariosM->traerUsuario($_POST['usuario']);
        //si existe usuario verificar que las claves sean iguales
        if ($usuario) {
            if (password_verify($_POST['clave'], $usuario['clave'])) {
                //si todo es correcto, guardar los datos de usuario en una variable de sesion
                $_SESSION['usuario'] = [
                    "id" => $usuario['id'],
                    "nombre" => $usuario['nombre'],
                    "email" => $usuario['email'],
                    "rol" => $usuario["rol"]
                ];
                //redirigir al index. 
                //PROBLEMA---> no me reconoce la variable de session, pero si me redirige al index
                header("location:" . BASE_URL . "Inicio/index");
            } else {

                $datos['error'] = "Contraseña incorrecta.";
            }
        } else {
            $datos['error'] = "Usuario no registrado.";
        }
        //cargar las vistas
        $this->load_view("plantilla/header");
        $this->load_view("login", $datos);
        $this->load_view("plantilla/footer");
    }

    public function recuperaPass()
    {
        $usuariosM = $this->load_model("UsuariosM");
        $usuario = $usuariosM->traerUsuario($_POST['usuario']);
        if ($usuario) {
            print_r($usuario);
            $datos['ok'] = "Hemos enviado un correo con las instruccines.";
        } else {
            $datos['error'] = "Usuario no registrado. <br> Si lo desea puede darse de Alta.";
        }

        $this->load_view("plantilla/header");
        $this->load_view("olvido", $datos);
        $this->load_view("plantilla/footer");
    }
}

?>