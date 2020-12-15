<?php
if (isset($_POST)) {
    require_once 'leonardo/includes/conexion.php';
    if (!isset($_SESSION)) {
        session_start();
    }
    $email = trim($_POST['email']);
    $password = $_POST['pass'];
    $errores = array();
    //Validar campo email
    if(!empty($email)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "El email esta vacío";
        $_SESSION['email'] = $errores['email'];
        header("Location: login2.php");
    }
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['pass'] = "El password esta vacío";
        $_SESSION['pass'] = $errores['pass'];
        header("Location: login2.php");
    }
    if(count($errores) == 0){

        //Consulta para comprobar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $login = mysqli_query($db, $sql);

        if ($login && mysqli_num_rows($login) == 1) {
            $usuario = mysqli_fetch_assoc($login);
            //Comprobar la contrasena
            $passwordconseguido = $usuario['password'];
            $verify = password_verify($password, $passwordconseguido);
            //Mensaje de error
            if ($verify) {
                // Utilizar una session para guardra los datos del usuario logueado
                $_SESSION['usuario'] = $usuario;
                if($usuario['id'] == 1){
                    $_SESSION['administradora6155560'] = $usuario;
                }
                if (isset($_SESSION['error_login']) || isset($_SESSION['email']) || isset($_SESSION['pass'])) {
                    unset($_SESSION['error_login']);
                    unset($_SESSION['email']);
                    unset($_SESSION['pass']);
                }
                header("Location: index.php");
            } else {
                //Si algo falla enviar una session con fallo y redigirir
                $_SESSION['error_login'] = "Login incorrecto";
                header("Location: login2.php");
            }
        }
    }
}
