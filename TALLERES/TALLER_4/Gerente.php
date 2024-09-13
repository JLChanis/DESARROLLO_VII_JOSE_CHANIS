<?php
require_once 'Empleado.php';
class Gerente extends Empleado {
    //Propiedades de la clase
    private $bono;

    //Getters y Setters de la clase
    public function __construct($bono) {
        $this->setBono($bono);
    }

    public function getBono() {
        return $this->bono;
    }

    public function setBono($bono) {
        $this->bono = trim($bono);
    }

    //Funciones de la clase
    public function asignar_bonos($salario){
        return $salario += $bono
    }
}
?>