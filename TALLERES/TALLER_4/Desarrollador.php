<?php
class Desarrollador {
    //Propiedades de la clase
    private $lenguaje;
    private $nivel;

    //Getters y Setters de la clase
    public function __construct($lenguaje, $nivel) {
        $this->setLenguaje($lenguaje);
        $this->setNivel($nivel);
    }

    public function getLenguaje() {
        return $this->lenguaje;
    }

    public function setBono($lenguaje) {
        $this->bono = trim($lenguaje);
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = trim($nivel);
    }
}
?>