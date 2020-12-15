<?php
if(isset($_POST)){
    require_once 'leonardo/includes/conexion.php';
    if(!isset($_SESSION)){
        session_start();    
    }
    //Recoger los valores del formulario del registro
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['pass']) ? mysqli_real_escape_string($db, $_POST['pass']) : false;
    
    //Array de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la base de datos 
    //Validar campo nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }
    //Validar campo apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }
    //Validar campo email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }
    //Validar campo contrasena
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['pass'] = "El password no es valido";
    }
    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;
        //Cifrar la contrasena 
        $password_segura = password_hash($password, PASSWORD_BCRYPT,['Cost'=>4]);
        //INSERTAR USUARIO EN LA TABLA DE USUARIOS LA BDD
        $sql = "INSERT INTO usuarios VALUE(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql); 
        if($guardar){
            header('Location: login2.php');
        }else{
            $_SESSION['errores']['general'] = 'Fallo al guardar el usuario';
        }

    }else{
        $_SESSION['errores'] = $errores;
        header('Location: login2.php');
    }
}