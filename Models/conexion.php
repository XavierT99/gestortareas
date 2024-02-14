<?php
class ClaseConectar
{
    public $conexion;
    protected $db;

    private $host = "localhost";
    private $usu = "root";
    private $clave = "";
    private $base = "gestor_tareas"; 

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usu, $this->clave, $this->base);
        mysqli_query($this->conexion, "SET NAMES utf8");
        
        if ($this->conexion == false) {
            die("Error al conectarse con MySQL: " . mysqli_connect_error());
        }
        
        $this->db = mysqli_select_db($this->conexion, $this->base);
        
        if ($this->db == false) {
            die("Error al seleccionar la base de datos: " . mysqli_error($this->conexion));
        }
        
        return $this->conexion;
    }
}
?>
