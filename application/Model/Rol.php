<?php

namespace Mini\Model;

use Mini\Core\Model;

class Rol extends Model {

    private $codigo;
    private $nombre;

    public function __SET($attr, $value){
        $this->$attr = $value;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function listar_rol(){
        $sql = "SELECT * FROM sp_listar_rol()";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

}
