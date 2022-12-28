<?php
class CampanM extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function pintarTodos()
    {
        $cadSQL = "SELECT * FROM campan ";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function pintarUno($id_cam)
    {
        $cadSQL = "SELECT * FROM campan WHERE id=:id ";
        $this->consultar($cadSQL);
        $this->enlazar(":id", $id_cam);
        return $this->fila();
    }
    public function sinEjecutar()
    {
        $cadSQL = "SELECT * FROM campan WHERE ejecutada='n' ";
        $this->consultar($cadSQL);
        return $this->resultado();
    }
    public function insertar($datos)
    {
        // Recibimos los datos del formulario 
        $nombre = $_POST['nombreCamp'];
        $desc = $_POST['descripcion'];
        $tipo = $_POST['tipo'];
        $fecha = $_POST['fecha'];
        $titulo = $_POST['titulo'];
        $cuerpo = $_POST['cuerpo'];
        $adj = $_FILES['adjunto']['name'];//fichero
        $ej = 'n';
        echo "Nombre: " . $_FILES['adjunto']['name'] . "<br>";
        ///falta pasar los archivos adjuntos

        $cadSQL = "INSERT INTO campan ( nombre,titulo, descripcion,tipo, fecha, cuerpo, adjunto, ejecutada) VALUES (:nombre,:titulo, :descripcion,:tipo, :fecha, :cuerpo, :adjunto, :ejecutada)";
        $this->consultar($cadSQL);   // Preparar sentencia

        $this->enlazar(":nombre", $nombre);
        $this->enlazar(":descripcion", $desc);
        $this->enlazar(":tipo", $tipo);
        $this->enlazar(":fecha", $fecha);
        $this->enlazar(":titulo", $titulo);
        $this->enlazar(":cuerpo", $cuerpo);
        $this->enlazar(":adjunto", $adj);
        $this->enlazar(":ejecutada", $ej);

        return $this->ejecutar();
    }

    public function insertarEnviado($datos)
    {
        // Recibimos los datos del formulario 
        $id_cam = $_POST['campan'];
        $id_des = $_POST['destino'];
        //$fecha = date('Y - m - d');

        $cadSQL = "INSERT INTO enviadas ( id_destino,id_camp) VALUES (:id_destino,:id_camp)";
        $this->consultar($cadSQL);   // Preparar sentencia

        $this->enlazar(":id_destino", $id_des);
        $this->enlazar(":id_camp", $id_cam);
        //$this->enlazar(":fecha", $fecha);

        return $this->ejecutar();
    }
}
