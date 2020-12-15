<?php

if (isset($_POST['Agregar'])) {
    $errores = array();
    $aceptada = array();
    require_once 'leonardo/includes/conexion.php';
    //Funciones para agregar y eliminar categorias 
    $categoriaseleccionada = isset($_POST['seleccionado']) ? mysqli_real_escape_string($db, $_POST['seleccionado']) : false;
    //Validar los datos antes de guardarlos en la base de datos 
    $sql = "SELECT id FROM categorias  WHERE id = '$categoriaseleccionada'";
    $isset_id = mysqli_query($db, $sql);
    $isset_categoria = mysqli_fetch_assoc($isset_id);
    $sql2 = "SELECT idselect FROM idseleccionado  WHERE idselect = '$categoriaseleccionada'";
    $isset_id2 = mysqli_query($db, $sql2);
    $isset_categoria2 = mysqli_fetch_assoc($isset_id2);
    if ($isset_categoria['id'] == $_POST['seleccionado'] && !empty($isset_categoria) && empty($isset_categoria2)) {
        $sql = "INSERT INTO idseleccionado VALUES(null, '$categoriaseleccionada');";
        $guardar = mysqli_query($db, $sql);
        mysqli_close($db); //cerramos la conexiÃ³n
        $aceptada['agregar'] = 'Agregada con éxito'; 
        $_SESSION['aceptadas'] = $aceptada;
    } else if (empty($isset_categoria)){
        $errores['agregar'] = 'Categoría no seleccionada'; 
        $_SESSION['errores'] = $errores;
    }
    else{
        $errores['agregar'] = 'Esa categoría ya está agregada'; 
        $_SESSION['errores'] = $errores;
    }
}else if (isset($_POST['Eliminar'])) {
    $errores = array();
    require_once 'leonardo/includes/conexion.php';
    //Funciones para agregar y eliminar categorias 
    $categoriaseleccionada = isset($_POST['seleccionado']) ? mysqli_real_escape_string($db, $_POST['seleccionado']) : false;
    //Validar los datos antes de guardarlos en la base de datos 
    $sql = "SELECT idselect FROM idseleccionado  WHERE idselect = '$categoriaseleccionada'";
    $isset_id = mysqli_query($db, $sql);
    $isset_categoria = mysqli_fetch_assoc($isset_id);
    if ($isset_categoria['idselect'] == $_POST['seleccionado'] || !empty($isset_categoria)) {
        $sql = "DELETE FROM idseleccionado WHERE idselect = $categoriaseleccionada";
        $guardar = mysqli_query($db, $sql);
        mysqli_close($db); //cerramos la conexiÃ³n
        $aceptada['eliminar'] = 'Eliminada con éxito'; 
        $_SESSION['aceptadas'] = $aceptada;
    } else {
        $errores['eliminar'] = 'Esa categoría no existe'; 
        $_SESSION['errores'] = $errores;
    }
}
header('Location: index.php');
