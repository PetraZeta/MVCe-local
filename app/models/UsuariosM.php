<?php

class UsuariosM extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function traerTodos(){
        $sql="SELECT * FROM usuario";
        $this->consultar($sql);
        return $this->resultado();
    }
    public function traerUno($id){
        $sql="SELECT * FROM usuario WHERE id=:id";
        $this->consultar($sql);
        $this->enlazar(":id",$id);
        return $this->fila();
    }
    public function traerUsuario($email)
    {
        $sql = "SELECT * FROM usuario WHERE email=:usuario";
        $this->consultar($sql);
        $this->enlazar(":usuario", $email);
  
        return $this->fila();
    }
    //comprobar si el correo existe en la bbdd, trae true o false
    function validarCorreo($email)
    {
        $sql = "SELECT * FROM usuario WHERE email=:usuario";
        $this->consultar($sql);
        $this->enlazar(":usuario", $email);
        $this->fila();
        
        return ($this->cuenta()== 0) ? true : false;
    }
    public function agregar($datos){
        if ($this->validarCorreo($datos["email"])) {
            
            $sql = "INSERT INTO usuario(clave, email ,nombre,novedades,ofertas,descuentos,rol) VALUES(:clave, :email ,:nombre,:novedades,:ofertas,:descuentos, :rol)";
            $this->consultar($sql);
            $this->enlazar(":clave", $datos["clave"]);
            $this->enlazar(":email", $datos["email"]);
            $this->enlazar(":nombre", $datos["nombre"]);
            $this->enlazar(":novedades", $datos["novedades"]);
            $this->enlazar(":ofertas", $datos["ofertas"]);
            $this->enlazar(":descuentos", $datos["descuentos"]);
            $this->enlazar(":rol", $datos["rol"]);

            return $this->ejecutar();
        }
    }
//traer usuarios que tengan check en preferencias para mandar correo
    public function traerUsuarios($tipo)
    {
        $sql = "SELECT * FROM usuario WHERE $tipo=1 ";
        $this->consultar($sql);

        return $this->resultado();
    }
}
