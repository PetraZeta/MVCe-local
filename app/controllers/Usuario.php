<?php

class Usuario extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        //instanciar los objetos que guardaran los datos tras la llamada a su modelo
        $this->usuariosM = $this->load_model("UsuariosM");
        $this->favoritosM = $this->load_model("FavoritosM"); 
     
    }
    public function index()
    {
        $datos['titulo'] = "Login";
        $this->load_view("plantilla/header", $datos);
        $this->load_view("login");
    }

    public function registro()
    {
        $datos['titulo'] = "Registro";
        $this->load_view("plantilla/header",$datos);
        $this->load_view("registro");
    }
    public function verificaMail()
    {
        $usuario = $this->usuariosM->validarCorreo($_POST['email']);
        if($usuario){
            echo 0;
        }else{
            echo 1;
        }
    }
    // Devuelve el id del usuario loggeado, sino 0.
    public function userLoggedId()
    {
        if ($_SESSION['usuario']['id'] != null) {
            echo $_SESSION['usuario']['id'];
        } else {
            echo 0;
        }
    }
    public function agregarUsuario()
    {
        // Valida los datos del formulario de registro aunque se validaran con js.
        $error = "";
        // comprueba si llegan los parametros por POST
        if (isset($_POST['email']) && isset($_POST['clave']) && isset($_POST['nombre']) && isset($_POST['rclave'])) {
            // comprueba si el email existe en la bbdd
            if (!$this->usuariosM->validarCorreo($_POST['email'])) {
                $error .= " El email ya existe.";
            }
            // comprueba si las claves coinciden
            if ($_POST['clave'] != $_POST['rclave']) {
                $error .= " Las claves no coinciden.";
            }
        } else {
            $error .= " Faltan datos.";
        }

        // si no hay errores, inserta el usuario en la bbdd
        if ($error == "") {
            // Se recogen los datos del formulario y se guardan en el array datos.
            $datos['clave'] = password_hash($_POST['clave'], PASSWORD_DEFAULT);
            $datos['email'] = $_POST['email'];
            $datos['nombre'] = $_POST['nombre'];

            // Se recogen los checkboxs del formulario y se guardan en datos.
            isset($_POST['novedades']) ? $datos['novedades'] = 1 : $datos['novedades'] = 0;
            isset($_POST['ofertas']) ? $datos['ofertas'] = 1 : $datos['ofertas'] = 0;
            isset($_POST['descuentos']) ? $datos['descuentos'] = 1 : $datos['descuentos'] = 0;
            //ROL usuario
            $datos['rol'] = 1;

            // Se guarda el usuario en la bbdd y se captura el error en caso de que falle.
            $salida = $this->usuariosM->agregar($datos);
            if (!$salida) {
                $error .= " Error al agregar usuario.";
            }
        }

        // Se muestra la vista en funcion del error.
        if ($error != "") {
            $datos['msg'] = $error;
            $datos['msg_type'] = 'danger';
            $this->load_view("plantilla/header");
            $this->load_view("registro", $datos);
        } else {
            $datos['msg'] = "Bien! Te has registrado correctamente. Logueate para entrar.";
            $datos['msg_type'] = 'success';
            $this->load_view("plantilla/header");
            $this->load_view("login", $datos);
        }
    }
   
    public function olvido()
    {
        $this->load_view("plantilla/header");

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
       
        $usuario = $this->usuariosM->traerUsuario($_POST['usuario']);
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
                //redirigir al index 
                    header("location:" . BASE_URL . "Inicio/index");

            } else {

                $datos['msg'] = "Contraseña incorrecta.";
                $datos['msg_type']='danger';
            }
        } else {
            $datos['msg'] = "Usuario no registrado.";
            $datos['msg_type'] = 'danger';
        }
        //cargar las vistas
        
        $this->load_view("plantilla/header");
        $this->load_view("login",$datos);
       
    }
//TODO-->enviar correo al usuario para que haga un cambio de contraseña
    public function recuperaPass()
    {
        $usuario = $this->usuariosM->traerUsuario($_POST['usuario']);
        if ($usuario) {
         
            $datos['msg'] = "Te hemos enviado un correo con las instrucciones.";
            $datos['msg_type'] = 'success';

        } else {
            $datos['msg'] = "Usuario no registrado. <br> Si lo desea puede darse de Alta.";
            $datos['msg_type'] = 'danger';
        }

        $this->load_view("plantilla/header");
        $this->load_view("olvido", $datos);
        $this->load_view("plantilla/footer");
    }
    /**HACER METODO FAVORITOS QUE RECIBA ID USU Y PINTE LOS PRODUCTOS FAVORITOS  */
    public function favoritos()
    {
        // Es null si no hay usuario logueado.
        $userId = $_SESSION['usuario']['id'];

        // Si hay usuario logueado UserId es un numero > 0.
        if ($userId > 0) {
            $tiendasM = $this->load_model("TiendasM");
            $marcasM = $this->load_model("MarcasM");

            $datos['tiendas'] = $tiendasM->pintarTodos();
            $datos['marcas'] = $marcasM->pintarTodos();
            $datos['favoritos'] = $this->favoritosM->pintarTodos($userId);

            $this->load_view("plantilla/header");
            $this->load_view("plantilla/menu", $datos);
            $this->load_view("favoritos", $datos);
            $this->load_view("plantilla/footer");
        }

        // No hay usuario logueado, redirigir a login
        else {
            header("location:" . BASE_URL . "Inicio/index");
        }
    }
    public function agregarFavorito()
    {

        $userId = $_SESSION['usuario']['id'];
        $productId = $_POST['productId'];

        $fav = $this->favoritosM->traerUno($userId, $productId);
        if ($fav) {
            echo 0;
        } else {
            $this->favoritosM->agregar($userId, $_POST['productId']);
            echo 1;
        }
    }
    // Recibe el id de usuario y el id de producto por AJAX. Valida y llama al INSERT del modelo.
    public function EliminarFavorito()
    {
        $userId = $_SESSION['usuario']['id']; 
        $productId = $_POST['productId'];

        $fav = $this->favoritosM->traerUno($userId, $productId);
        if ($fav) {
            $this->favoritosM->eliminar($userId, $productId);
            // recargar la pagina
            echo 1;
        } else {
            echo 0;
        }
    }
}

?>