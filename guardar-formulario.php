<?php
if (isset($_POST)) {
    //conexion a la base de datos 
    require_once 'leonardo/includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
    $precio = isset($_POST['precio']) ? (int)$_POST['precio'] : false;
    $cantidad = isset($_POST['cantidad']) ? (int)$_POST['precio'] : false;
    $clasificacion = isset($_POST['clasificacion']) ? $_POST['clasificacion'] : false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    $codigo = isset($_POST['codigo']) ? mysqli_real_escape_string($db, $_POST['clasificacion']) : false;
    //Array de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la base de datos 
    //Validar campo nombre
    if (empty($nombre)) {
        $errores['nombre'] = "El nombre no es valido";
    }

    if (empty($imagen)) {
        $errores['imagen'] = "La imagen no es valida";
    }

    if (empty($precio) && !is_numeric($precio)) {
        $errores['precio'] = "El precio no es valido";
    }

    if (empty($cantidad) && !is_numeric($cantidad)) {
        $errores['cantidad'] = "La cantidad no es valida";
    }

    if (empty($clasificacion)) {
        $errores['clasificacion'] = "La clasificacion no es valida";
    }

    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripcion no es valida";
    }

    if (count($errores) == 0) {
        if (isset($_GET['editar'])) {
            $sql = "UPDATE espacios SET Nombre='$nombre', imagen='$imagen', Descripcion='$descripcion', Precio='$precio', Clasificacion='$clasificacion', Codigo='$codigo', Cantidad='$cantidad'";
        } else {
            $sql = "INSERT INTO espacios VALUE(null, $nombre, $imagen, $descripcion, $precio, $clasificacion, $codigo, $cantidad);";
        }
        $guardar = mysqli_query($db, $sql);
        header('Location: index.php');
    } else {
        $_SESSION['errores_entrada'] = $errores;
        if (isset($_GET['editar'])) {
            header("location: formulario.php?id=" . $_GET['editar']);
        } else {
            header('Location: formulario.php');
        }
    }
}
