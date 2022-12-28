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

    //traer todos los productos de una tienda 
    public function pintarProdTienda($id)
    {
        $sql = "SELECT * FROM producto WHERE tienda=:id";
        $this->enlazar(":id", $id);
        $this->consultar($sql);
        return $this->resultado();
    }

    public function traerBuscados($q)
    {

        $sql = "SELECT * FROM producto WHERE nombre LIKE '%$q%' OR descripcion LIKE '%$q%'";
        $this->consultar($sql);

        return $this->resultado();
    } 

    public function traerFiltrados(){
        var_dump($_POST);
    
        $sql = "SELECT * FROM producto  WHERE nombre LIKE '%%' ";
        if (isset($_POST["precio"]) && !empty($_POST["precio"])) {
            $sql .= "AND precio < '".$_POST["precio"]."'";
        }
        if (isset($_POST["categoria"]) && !empty($_POST["categoria"])) {
            $sql .= "AND categoria = '" . $_POST["tipo"] . "'";
        }
        if (isset($_POST["genero"]) && !empty($_POST["genero"])) {
            $sql .= "AND genero = '" . $_POST["genero"] . "'";
        }
        $this->consultar($sql);

        return $this->resultado();
        
        
     
       
        
    }
    


}

