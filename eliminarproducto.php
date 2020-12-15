<?php
if (isset($_POST['nombre'])) {
    require_once 'leonardo/includes/conexion.php';
    if (isset($_SESSION['administradora6155560'])) {
        $borrar = $_POST['nombre'];
        $sql = "SELECT * FROM entradas WHERE titulo = '$borrar'";
        $isset_seleccionados = mysqli_query($db, $sql);
        $isset_seleccionado = mysqli_fetch_assoc($isset_seleccionados);
        if ($isset_seleccionado['titulo'] == $_POST['nombre'] && !empty($isset_seleccionado)) {
            $sql = "DELETE FROM entradas WHERE titulo = '$borrar'";
            $guardar = mysqli_query($db, $sql);
            if ($guardar) {
                header("location: index.php");
            } else {
                $_SESSION['errores']['nombre'] = 'El nombre es incorrecto';
                header('Location:' . getenv('HTTP_REFERER'));
            }
        } else {
            $_SESSION['errores']['nombre'] = 'El nombre es incorrecto';
            header('Location:' . getenv('HTTP_REFERER'));
        }
    }else{
        header('Location:' . getenv('HTTP_REFERER'));
        $_SESSION['errores']['nombre'] = 'No tienes permitido modificar esta página';  
    }
} else {
    header('Location:' . getenv('HTTP_REFERER'));
    $_SESSION['errores']['nombre'] = 'El nombre esta vácio';
}
