<?php

class ProductosM extends Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function pintarTodos(){
        $sql="SELECT * FROM producto GROUP BY nombre"; //evitar repetidos y ordenar por orden alfabetico
        $this->consultar($sql);
        return $this->resultado();
    }
    public function traerUno($id)
    {
        $sql = "SELECT * FROM producto WHERE id=:id"; //traer por id
        $this->consultar($sql);
        $this->enlazar(":id", $id);
        return $this->fila();
    }
    public function traerBuscados($nombre){
    
        $sql = "SELECT * FROM producto WHERE nombre LIKE '%$nombre%'"; 
        $this->consultar($sql);
   
        return $this->resultado();
        
    }
    public function pintarProdTienda($id)
    {

        $sql = "SELECT * FROM producto WHERE tienda=:id";
        $this->enlazar(":id", $id);
        $this->consultar($sql);

        return $this->resultado();
    }

}

