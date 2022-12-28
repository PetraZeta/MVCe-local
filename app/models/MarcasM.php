<?php

class MarcasM extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function pintarTodos(){
        $sql="SELECT * FROM marca";
        $this->consultar($sql);
        return $this->resultado();
    }
    //traer una marca por su id
    public function traerUno($id)
    {
        $sql = "SELECT * FROM marca WHERE id=$id"; 
        $this->consultar($sql);
        $this->enlazar(":id", $id);
        return $this->fila();
    }
    //traer todos los productos de una marca
    public function pintarProdMarca($id)
    {

        $sql = "SELECT * FROM marca INNER JOIN producto ON marca.id=producto.id_marca WHERE marca.id=$id";
        $this->enlazar(":id", $id);
        $this->consultar($sql);

        return $this->resultado();
    }
}
