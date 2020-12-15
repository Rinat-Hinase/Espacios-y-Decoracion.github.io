<?php
if (isset($_POST)) {
    //conexion a la base de datos 
    require_once 'leonardo/includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $categoriaseleccionada = isset($_POST['seleccionado']) ? mysqli_real_escape_string($db, $_POST['seleccionado']) : false;
    $precio = isset($_POST['precio']) ? (int)$_POST['precio'] : false;
    $cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : false;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
    $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : false;
    //Array de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la base de datos 
    //Validar campo nombre
    if (empty($nombre)) {
        $errores['titulo'] = "El titulo esta vácio";
    }
    //Validar los datos antes de guardarlos en la base de datos 
    $sql = "SELECT id FROM categorias WHERE id = '$categoriaseleccionada'";
    $isset_id = mysqli_query($db, $sql);
    $isset_categoria = mysqli_fetch_assoc($isset_id);
    if ($isset_categoria['id'] != $_POST['seleccionado'] && empty($isset_categoria)) {
        $errores['categoria'] = "Categoría no seleccionada correctamente";
    }

    if (!isset($_GET['editar'])) {
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
            $errores['imagen'] = "Imagen no seleccionada correctamente";
        }
    }

    if (empty($precio) || !is_numeric($precio)) {
        $errores['precio'] = "El precio no es válido";
    }

    if (empty($cantidad) || !is_numeric($cantidad)) {
        $errores['cantidad'] = "La cantidad no es válida";
    }


    if (empty($descripcion)) {
        $errores['descripcion'] = "La descripción esta vacía";
    }

    if (count($errores) == 0) {
        $aceptadas['general'] = "Guardado con éxito";
        if (isset($_GET['editar'])) {
            $editable = $_GET['editar'];
            $sql = "UPDATE entradas SET categoria_id=$categoriaseleccionada, titulo='$nombre', descripcion='$descripcion', precio=$precio, codigo='$codigo', cantidad=$cantidad".
            " WHERE titulo='$editable';";
        } else {
            $sql = "INSERT INTO entradas VALUE(null, $categoriaseleccionada, '$nombre', '$contenido', '$descripcion', $precio, '$codigo', $cantidad, CURDATE());";
        }
        $guardar = mysqli_query($db, $sql);
        if ($guardar) {
            $_SESSION['aceptadas_entrada'] = $aceptadas;
            if (isset($_GET['editar'])) {
                header("location: editarproducto.php?nombre=" . $_GET['editar']);
            } else {
                header('Location: crearproducto.php');
            }
        }
    } else {
        $_SESSION['errores_entrada'] = $errores;
        if (isset($_GET['editar'])) {
            header("location: editarproducto.php?nombre=" . $_GET['editar']);
        } else {
            header('Location: crearproducto.php');
        }
    }
}
