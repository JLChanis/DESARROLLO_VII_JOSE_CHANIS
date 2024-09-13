<?php
class Empleado {
    //Propiedades de la clase
    private $nombre;
    private $id_usuario;
    private $salario;

    //Getters y Setters de la clase
    public function __construct($nombre, $id_usuario, $salario) {
        $this->setNombre($nombre);
        $this->setID_Usuario($id_usuario);
        $this->setSalario($salario);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = trim($nombre);
    }

    public function getID_Usuario() {
        return $this->id_usuario;
    }

    public function setID_Usuario($id_usuario) {
        $this->id_usuario = trim($id_usuario);
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario($salario) {
        $this->salario = intval($salario);
    }
}
?>