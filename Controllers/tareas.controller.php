<?php
error_reporting(0);
require_once('../Models/tareas.model.php');

$tareasModel = new Clase_Tareas; 

switch ($_GET['op']) {
    case 'todos':
        $datos = array();
        $datos = $tareasModel->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $id = $_POST['id'];
        $datos = array();
        $datos = $tareasModel->uno($id);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $descripcion = $_POST["descripcion"];
        $fecha_limite = $_POST["fecha_limite"];
        $completada = $_POST["completada"];

        $datos = array();
        $datos = $tareasModel->insertar($descripcion, $fecha_limite, $completada);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $id = $_POST['id'];
        $descripcion = $_POST["descripcion"];
        $fecha_limite = $_POST["fecha_limite"];
        $completada = $_POST["completada"];

        $datos = array();
        $datos = $tareasModel->actualizar($id, $descripcion, $fecha_limite, $completada);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $id = $_POST['id'];
        $datos = array();
        $datos = $tareasModel->eliminar($id);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
}
