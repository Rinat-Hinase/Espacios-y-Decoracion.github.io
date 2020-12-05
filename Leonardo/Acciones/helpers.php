<?php 

function MostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='btn-infor'><div class='btn btn-danger'>".$errores[$campo].'</div></div>';
    }
    return $alerta;
}
function MostrarAceptadas($aceptada, $campo){
    $alerta = '';
    if(isset($aceptada[$campo]) && !empty($campo)){
        $alerta = "<div class='btn-infor'> <div class='btn btn-success'>".$aceptada[$campo].'</div></div>';
    }
    return $alerta;
}
function BorrarAceptadas(){
    if(isset($_SESSION['aceptadas'])){
        $_SESSION['aceptadas'] = null;
    }
}
function BorrarErrores(){
    $borrado = false;
    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    if(isset($_SESSION['Completado'])){
        $_SESSION['Completado'] = null;
        $borrado = true;
    }
    return $borrado;
}

function ConseguirCategorias($conexion){
    $sql =  "SELECT c.* FROM categorias c ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    return $resultado;
}

function ConseguirCategoria($conexion){
    $sql =  "SELECT c.*, i.idselect FROM categorias c ".
    "INNER JOIN idseleccionado i ON c.id = i.idselect ".
    "ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >= 1){
        $resultado = $categorias;
    }
    return $resultado;
}

function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellidos) AS usuario FROM entradas e ".
    "INNER JOIN categorias c ON e.categoria_id = c.id ".
    "INNER JOIN usuarios u ON e.usuario_id = u.id ".
    "WHERE e.id = $id";
    $entrada = mysqli_query($conexion, $sql);

    $resultado = array();

    if($entrada && mysqli_num_rows($entrada) >= 1){
        $resultado = mysqli_fetch_assoc($entrada);
    }
    return $resultado;
}

function conseguirEntradas($conexion, $categoria = null, $busqueda = null){
    $sql = "SELECT e.* FROM entradas e ".
    "WHERE e.categoria_id = $categoria";
    if(!empty($busqueda)){
        $sql .= "WHERE e.titulo LIKE '%$busqueda%'";
    }
    $sql .=   " ORDER BY e.id DESC";

    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas  && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;
}
function conseguirTodasEntradas($conexion, $Limit = null, $categoria = null, $busqueda = null){
    $sql = "SELECT e.*, c.id, nombre AS 'categoria' FROM entradas e ".
    "INNER JOIN categorias c ON  e.categoria_id = c.id ";

    if(!empty($categoria)){
        $sql .= "WHERE c.nombre = '$categoria'";
    }

    if(!empty($busqueda)){
        $sql .= "WHERE e.titulo LIKE '%$busqueda%'";
    }
    $sql .=   " ORDER BY e.id DESC";

    if($Limit){

        //SQL = SQL. "LIMIT 4"
        $sql .= " LIMIT 4";

    }
    $entradas = mysqli_query($conexion, $sql);
    $resultado = array();
    if($entradas  && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $resultado;
}