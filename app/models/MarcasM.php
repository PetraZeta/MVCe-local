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
}
