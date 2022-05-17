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
    public function traerUno($id)
    {
        $sql = "SELECT * FROM marca WHERE id=$id"; //traer por id
        $this->consultar($sql);
        $this->enlazar(":id", $id);
        return $this->fila();
    }
    public function pintarProdMarca($id)
    {

        $sql = "SELECT * FROM marca INNER JOIN producto ON marca.id=producto.id_marca WHERE marca.id=$id";
        $this->enlazar(":id", $id);
        $this->consultar($sql);

        return $this->resultado();
    }
}
