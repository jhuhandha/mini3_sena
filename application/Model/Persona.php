<?php 

namespace Mini\Model;

use Mini\Core\Model;

class Persona extends Model {

    private $codigo;
    private $nombre;
    private $telefono;
    private $usuario;
    private $clave;
    private $rol;
    private $imagen;

    public function __SET($attr, $value){
        $this->$attr = $value;
    }

    public function __GET($attr){
        return $this->$attr;
    }

    public function guardar(){
        $sql = "SELECT sp_guardar_persona(?, ?, ?, ?, ?, ?)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->nombre);
        $stm->bindParam(2, $this->telefono);
        $stm->bindParam(3, $this->imagen);
        $stm->bindParam(4, $this->rol);
        $stm->bindParam(5, $this->usuario);
        $stm->bindParam(6, $this->clave);

        try{
            return $stm->execute();
        }catch(\Exception $e){
            return $e->getCode();
        }
    }

    public function ultimo(){
        $sql = "SELECT max(codigo) as ultimo FROM persona";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetch();
    }









    
    public function editar(){
        $sql = "SELECT id, documento, nombre, apellido, telefono, direccion, correo, estado FROM persona2 WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->id);
        $stm->execute();
        return $stm->fetch();
    }

    public function listar(){
        $sql = 'SELECT * FROM sp_listar_persona2();';
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }

    public function modificar(){
        $sql = "UPDATE persona2 SET documento = ?, nombre = ?, apellido = ?, telefono = ?, direccion = ?, correo = ? WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->documento);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->apellido);
        $stm->bindParam(4, $this->telefono);
        $stm->bindParam(5, $this->direccion);
        $stm->bindParam(6, $this->correo);
        $stm->bindParam(7, $this->id);
        return $stm->execute();
    }

    public function modificar_estado(){
        $sql = "UPDATE persona2 SET estado = ? WHERE id = ?";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->estado);
        $stm->bindParam(2, $this->id);
        return $stm->execute();
    }

}