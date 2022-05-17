<?php

class Usuario extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //instanciar los objetos que guardaran los datos tras la llamada a su modelo
  /*       $this->usuariosM = $this->load_model("UsuariosM"); */
     
    }
    public function index()
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
     /*    if(){

        } */
        $usuariosM = $this->load_model("UsuariosM");
        //capturar clave y encriptarla
     /*    print_r($_POST); */
        $datos['clave'] = password_hash($_POST['clave'], PASSWORD_DEFAULT);
        //preguntar si vienen los check y asignar 0 o 1 para guardar en bbdd
        isset($_POST['novedades']) ? $datos['novedades'] = 1 : $datos['novedades'] = 0;
        isset($_POST['ofertas']) ? $datos['ofertas'] = 1 : $datos['ofertas'] = 0;
        isset($_POST['descuentos']) ? $datos['descuentos'] = 1 : $datos['descuentos'] = 0;
        $datos['email']= $_POST['email'];
        $datos['nombre'] = $_POST['nombre'];


        $usuariosM->agregar($datos);
        //$_POST tiene un array con los datos que se envian al metodo agregar del modelo usuario. 
        //TODO_-->mostrar mensaje success
        $datos['msg'] = "Bien! Te has registrado correctamente. Logueate para entrar.";
        $datos['msg_type']='success';
        //Redirigir a inicio
      /*   header("location:" . BASE_URL . "Inicio/index"); */
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
                print_r($_SESSION);
                print_r($_POST);
                //redirigir al index. 
                //PROBLEMA---> no me reconoce la variable de session, pero si me redirige al index
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