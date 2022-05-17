<?php

class FavoritosM extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function pintarTodos($usuario)
    {//traer favoritos de usuario por id de usuario 
        $sql = "SELECT * FROM favorito INNER JOIN producto ON producto.id=favorito.producto WHERE usuario=:usuario"; 
        $this->consultar($sql);
        $this->enlazar(":usuario", $usuario);
        return $this->resultado();
    }
    public function traerUno($usuario, $producto)
    {//traer productos por id de usuario
        $sql = "SELECT * FROM favorito INNER JOIN producto ON producto.id=favorito.producto WHERE usuario=:usuario AND producto=:producto" ; 
        $this->consultar($sql);
        $this->enlazar(":usuario", $usuario);
        $this->enlazar(":producto", $producto);

        return $this->fila();
    }
    public function agregar($usuario, $producto)
    {
        $sql = "INSERT INTO favorito (usuario, producto) VALUES (:usuario,:producto)"; 
        $this->consultar($sql);
        $this->enlazar(":usuario", $usuario);
        $this->enlazar(":producto", $producto);

        return $this->ejecutar();
    }
    //TODO--> incremetar en 1 el numero de favoritos de producto
    public function borrar($id)
    {
        $sql = "DELETE FROM favorito WHERE id='$id'";
        $this->consultar($sql);
        return $this->ejecutar();
    }
   
}
