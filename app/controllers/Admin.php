<?php
defined("BASEPATH") or die("No se permite la entrada directa a este script");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require ROOT . 'app/assets/libs/PHPMailer/src/Exception.php';
require ROOT . 'app/assets/libs/PHPMailer/src/PHPMailer.php';
require ROOT . 'app/assets/libs/PHPMailer/src/SMTP.php';

class Admin extends Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->usuariosM = $this->load_model("UsuariosM");
        $this->tiendasM = $this->load_model("TiendasM");
        $this->campanM = $this->load_model("CampanM");

    }

    public function index()
    {
        //el id de usuario es el mismo que el id de la tienda 
        //TO-DO---(hacer un procedimiento??)
        $id = $_SESSION['usuario']['id'];
        
        $datos['tiendas'] = $this->tiendasM->traerUno($id);
        $datos['productos'] = $this->tiendasM->traerProductos($id);
        $this->load_view("plantilla/header");
        $this->load_view("admin/menu",$datos);
        $this->load_view("admin/catalogo", $datos);
        $this->load_view("plantilla/footer");
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



                if ($_SESSION['usuario']['rol'] == 0) {

                    header("location:" . BASE_URL . "Admin/index");
                } else {
                    $datos['msg'] = "No tienes acceso a este sitio.";
                    $datos['msg_type'] = 'danger';
                }
            } else {

                $datos['msg'] = "Contraseña incorrecta.";
                $datos['msg_type'] = 'danger';
            }
        } else {
            $datos['msg'] = "Usuario no registrado.";
            $datos['msg_type'] = 'danger';
        }
        //cargar las vistas
        header("location:" . BASE_URL . "Admin/index");

    }

    // METODOS PARA LA CREACCION Y ENVIO DE CAMPAnAS
    public function campan()
    {  
        $datos['camp'] = $this->campanM->pintarTodos();
     
        $this->load_view("plantilla/header");   
        $this->load_view("admin/campan", $datos);
        $this->load_view("plantilla/footer");
    } 
    public function insertarCampa()
    {
        // Este metodo recibe los datos del formulario en $_POST
         print_r($_POST);
        // Ruta de la carpeta destino
        $carpeta_destino = ROOT. '/app/assets/img/';
        //mover la imagen del directorio temporal al directorio
        move_uploaded_file($_FILES['adjunto']['tmp_name'], $carpeta_destino . $_FILES['adjunto']['name']);
        // Enviar al modelo los datos para insertarlos
        $f = $this->campanM->insertar('$nombre', '$desc', '$fecha', '$titulo', '$cuerpo');

       // header("location:" . $_SERVER['HTTP_REFERER']);
    }
    public function enviarCamp($parametros = [])
    {
        //paso por parametros el id de la campaña y el tipo de preferencia del select

        //print_r($parametros[1]);

   
        $datos['parametros'] = $parametros; // Pasar parametros a la vista
        print_r($datos['parametros']);
        //traer datos de la campaña seleccionada a traves del id
        $id_cam = $parametros[0];
        $tipo = $parametros[1];
        
        // Enviar al modelo los datos para insertarlos
        $datos['camp'] = $this->campanM->pintarUno($id_cam);

        //traer datos del destino seleccionado a traves del id
        
        // TO-DO---hacer que traiga todos los destinatarios que tengan check segun tipo
        $dest = $this->usuariosM->traerUsuarios($tipo);

        //print_r($dest);
        $message  = '<html>';

    /*     $message .= "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />" . '\r\n'; */
       
/* 
        $message .= " <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>" . '\r\n'; */

        $message .= "<body>";

        $message .= "<table align='center' width='50%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";

        $message .= " <thead>
            <tr height='100' align='center'>
            <th colspan='4'  style=' border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >CUPON DESCUENTO</th>
            </tr>
            </thead>";

        $message .= "<tbody>";

        $message .= "<tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>";
        $message .= "<td style='background-color:#77469a; text-align:center;'><a href='http://localhost/MVCe-local/Inicio/index' style='color:#fff; text-decoration:none;'>e-local</a></td> ";
        $message .= "  <td style='background-color:#CDC3DA; text-align:center;'>
                  <a href='http://localhost/MVCe-local/Inicio/index' style='color:#fff; text-decoration:none;' >Tienda</a>
                  </td>";
        $message .= " </tr>";
        $message .= " <tr>";
        $message .= " <td colspan='4' style='padding:15px;'>";
        $message .= " <p style='font-size:20px;'> Hola, <b>UsuarioX</b>  !! </p>
                  <hr />
                  <p style='font-size:25px;'>La tienda <b>xxx</b> quiere obsequiarte con un <b>xxxxx</b>. </p>
                  <p>Ve a verlos y aprovecha esta oportunidad! <a href=''>enlace a tienda</a></p>
                  
                  <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident explicabo maiores molestias iste rerum harum tempore dolores asperiores molestiae. Reiciendis explicabo magni temporibus ipsa voluptatum natus odit voluptates, architecto laboriosam!</p>";
        $message .= "</td>";
        $message .= " </tr>";
        $message .= " <tr align='center'>";
        $message .= " <td colspan='4' style='padding:15px;'>
                        
                              <img src='https://images.unsplash.com/photo-1576919228236-a097c32a5cd4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80' title=''  width='100%' />

                        </td>";
        $message .= " </tr>";
        $message .= "  <tr  align='center'>";


        $message .= " <td colspan='4' style='padding:15px;'>
                              <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>
                                    <h2 style='font-size: 50px;'><span>XX</span> % <span style='font-size: 30px;'>de descuento</span></h2>
                                          <h5>*en artículos seleccionados</h5>
                              </p>
                        </td>";

        $message .= " </tr>";
   
        $message .= "</tbody>";
        $message .= "</table>";

        $message .= "</body></html>";
       

        //Creamos una instancia del PHPMailer; pasando `true` habilitamos las excepciones
        foreach ($dest as $d) {

            $mail = new PHPMailer(true); 
            try {
               
                $mail->setLanguage("es");
        
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      
                $mail->isSMTP();                                         
                $mail->Host       = PHPMAILER_HOST;                               $mail->SMTPAuth   = true;                                  
                $mail->Username   = PHPMAILER_USER;                    
                $mail->Password   = PHPMAILER_PASS;
                $mail->SMTPSecure = 'tls';
              
                $mail->Port       = PHPMAILER_PORT;                                    
                $mail->setFrom(
                    PHPMAILER_USER,
                    $datos['camp']['nombre'] //cambiar por nombre de la tienda
                );
        
                $mail->addAddress(
                    $d['email']
                );    

                $mail->isHTML(true);                                  
                $mail->Subject = $datos['camp']['titulo'];
                //$mail->Body    = $datos['camp']['descripcion'];
                //$mail->Body = $message;
                $mail->MsgHTML($message);
                print_r($mail);

                //  $mail->Send();
                if ($mail->send()) {
                    echo "Se ha enviado el correo correctamente";
                } else {
                    echo "No se ha enviado el correo correctamente";
                }
                //$k = $this->campanM->insertarEnviado($datos['camp']['id'], $d['id']);
                //print_r($k);
                //print_r($datos);
                return false;   
            } catch (Exception $e) {
                return "Error:{$e->ErrorInfo}"; 
            } 
        }

       // header("location:" . $_SERVER['HTTP_REFERER']);
    }

}
