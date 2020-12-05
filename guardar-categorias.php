<?php
if (isset($_POST['seleccionado2'])) {
    require_once 'leonardo/includes/conexion.php';
    $categoria = $_POST['seleccionado2'];
    $sql = "SELECT id FROM categorias  WHERE id = '$categoria'";
    $isset_seleccionados = mysqli_query($db, $sql);
    $isset_seleccionado = mysqli_fetch_assoc($isset_seleccionados);
    if ($isset_seleccionado['id'] == $_POST['seleccionado2'] && !empty($isset_seleccionado)) {
        $sql = "DELETE FROM categorias WHERE id = $categoria";
        header("location: index.php");
        mysqli_query($db, $sql);
    } else {
        $_SESSION['errores']['general'] = 'Categoria no seleccionada';
        header('Location: eliminarcategoria.php');
    }
}
if (isset($_POST['nombre'])) {
    //conexion a la base de datos 
    require_once 'leonardo/includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    //Array de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la base de datos 
    //Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $_SESSION['errores']['nombre'] = 'El nombre es incorrecto';
        $errores = "Error";
        header("location: crearcategoria.php");
    }
    if (isset($_FILES['miArchivo']) && $_FILES['miArchivo']['name'] != null) {
        $file = $_FILES['miArchivo']; //Asignamos el contenido del parametro a una variable para su mejor manejo

        $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
        $fileName = $file['name']; //Obtenemos el nombre del archivo
        $fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensiÃ³n del archivo.

        //Comenzamos a extraer la informaciÃ³n del archivo
        $fp = fopen($temName, "rb"); //abrimos el archivo con permiso de lectura
        $contenido = fread($fp, filesize($temName)); //leemos el contenido del archivo
        //Una vez leido el archivo se obtiene un string con caracteres especiales.
        $contenido = addslashes($contenido); //se escapan los caracteres especiales
        fclose($fp); //Cerramos el archivo

    } else {
        $nombre_validado = false;
        $_SESSION['errores']['archivo'] = 'Imagen no seleccionada correctamente';
        $errores = "Error";
        header("location: crearcategoria.php");
    }

    if (count($errores) == 0) {
        $sql = "INSERT INTO categorias VALUES(null, '$nombre', '$contenido', '$fileName' ,'$fileExtension');";
        $guardar = mysqli_query($db, $sql);
        mysqli_close($db); //cerramos la conexiÃ³n
        header("location: index.php");
    }
}
