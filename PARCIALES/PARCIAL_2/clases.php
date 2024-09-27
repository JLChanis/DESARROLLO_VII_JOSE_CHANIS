<?php
require_once 'Prestable.php';
class RecursoBiblioteca implements Prestable {
    public $id;
    public $titulo;
    public $autor;
    public $anioPublicacion;
    public $estado;
    public $fechaAdquisicion;
    public $tipo;
    private $disponible=true;

    public function __construct($datos) {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function obtenerDetallesPrestamo(){
        return $this->disponible;
    }
}

// Implementar las clases Libro, Revista y DVD aquí
class multimedia extends RecursoBiblioteca implements Prestable {
    private $isbn;
    private $numeroEdicion;
    private $duracion;

    public function obtenerDetallesPrestamo(){

    }
}

class GestorBiblioteca implements Prestable {
    private $recursos = [];

    public function cargarRecursos() {
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        
        foreach ($data as $recursoData) {
            $recurso = new RecursoBiblioteca($recursoData);
            $this->recursos[] = $recurso;
        }
        
        return $this->recursos;
    }

    // Implementar los demás métodos aquí
    public function obtenerDetallesPrestamo(){
        return $this->recursos['estado'];
    }

    public function agregarRecurso($recurso){
        $json = file_get_contents('biblioteca.json');
        $json = json_encode($recurso);
    }

    public function eliminarRecurso($id){

    }

    public function actualizarRecurso($recurso){
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        if($data['id']==$recurso['id']){
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
            }
        }
        $data = json_encode( $data );
    }

    public function actualizarEstadoRecurso($id, $nuevoEstado){
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        if($data['id']==$id){
            $data['estado']=$nuevoEstado;
        }
        $data = json_encode( $data );
    }

    public function buscarRecursoPorEstado($estado){
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        return array_filter($data, function ($recurso) use ($estado){
            return in_array( $estado, $recurso['estado'] );
        });
    }

    public function listarRecursos($filtroEstado='',$campoOrden='id',$direccionOrden ='ASC'){
        $json = file_get_contents('biblioteca.json');
        
    }

    public function ordenarRecurso($field, $direction){
        $json = file_get_contents('biblioteca.json');
        $data = json_decode($json, true);
        unsort( $data, function($field, $direction) {
            return strcmp( $field, $direction );
        });
        $data = json_encode( $data );
    }
}