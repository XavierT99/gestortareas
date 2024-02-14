<?php

// Importar archivo de conexión
require_once('conexion.php');

class Clase_Tareas
{

    public function todos()
    {

        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `tareas`";
        $resultado = mysqli_query($con, $cadena);
        return $resultado;
    }

    public function uno($id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `tareas` WHERE id = $id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function insertar($descripcion, $fecha_limite, $completada)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `tareas`(`descripcion`, `fecha_limite`, `completada`) VALUES ('$descripcion', '$fecha_limite', '$completada')";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($id, $descripcion, $fecha_limite, $completada)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `tareas` SET `descripcion`='$descripcion', `fecha_limite`='$fecha_limite', `completada`='$completada' WHERE `id`=$id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `tareas` WHERE `id`=$id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
?>
