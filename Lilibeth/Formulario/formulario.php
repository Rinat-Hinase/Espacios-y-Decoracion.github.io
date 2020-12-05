<?php require_once 'menu.php'; ?>
<?php require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    
    <!--FORMULARIO-->
    <form class="formulario">
        
        <!--TITULO-->
        <h1 class="titulo">Registrarse</h1>
        
        <!--INPUTS-->
        <input class="cajas" type="text" placeholder="Nombre" maxlength="30" required>
        <input class="cajas" type="text" placeholder="Apellido" maxlength="30" required>
        <input class="cajas" type="email" placeholder="Correo electrónico" maxlength="30" required>
        <input class="cajas" type="password" placeholder="Contraseña" maxlength="30" required>
        
        <!--TERMINOS-Y-CONDICIONES-->
        <p class="termino-1"><input type="checkbox" required>&nbsp; Estoy de acuerdo con los <a class="termino-2" href="">Terminos y Condiciones</a></p>
        
        <!--BOTON-DE-REGISTRARSE-->
        <input class="btn" type="submit" value="REGISTRARSE">
        
        <!--OTRA-OPCION-->
        <p class="otra-opcion"><a class="otra-opcion" href="">Ya tengo cuenta</a></p>
    </form>
    
</body>
</html>
