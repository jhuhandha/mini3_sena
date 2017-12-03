<?php
namespace Mini\Model;

use Mini\Core\Model;

class Color extends Model
{

    private $codigo;
    private $codigo_persona;
    private $nombre;

    public function __SET($attr, $value)
    {
        $this->$attr = $value;
    }

    public function __GET($attr)
    {
        return $this->$attr;
    }

    public function guardar()
    {
        $sql = "SELECT sp_guardar_color(?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->nombre);
        try {
            return $stm->execute();
        } catch (\Exception $e) {
            return $e->getCode();
        }
    }

    public function ultimo(){
        $sql = "SELECT max(codigo) as ultimo FROM color";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }

    public function guardar_detalle()
    {
        $sql = "SELECT sp_guardar_color_persona(?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->codigo);
        $stm->bindParam(2, $this->codigo_persona);
        try {
            return $stm->execute();
        } catch (\Exception $e) {
            return $e->getCode();
        }
    }

}
