<?php

class TiendasM extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function pintarTodos(){
        $sql="SELECT * FROM tienda";
        $this->consultar($sql);
        return $this->resultado();
    }
    //traer los datos de una tienda por su id
    public function traerUno($id)
    {
        $sql = "SELECT * FROM tienda WHERE id=$id"; 
        $this->consultar($sql);
        $this->enlazar(":id", $id);
        return $this->fila();
    }
    //traer todos los datos de tienda y los productos de esa tienda 
    public function traerProductos($id)
    {
        $sql = "SELECT * FROM tienda INNER JOIN producto ON tienda.id=producto.id_tienda WHERE tienda.id=$id"; 
        $this->consultar($sql);
        $this->enlazar(":id", $id);
        return $this->resultado();
    }
   
}

?>