<?php require_once "Leonardo/includes/menu-subpaginas.php"; ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    <link rel="stylesheet" href="Login-register/assets/css-form/formulario.css">
  </head>
 <body>
    <main>
     <div class="contenedor__todo">
          <div class="caja__trasera">
             <div class="caja__trasera-login">
               <h3>¿Ya tienes una cuenta?</h3>
               <p>Inicia sesión para entrar en la página</p>
               <button id="btn__iniciar-sesion">Iniciar sesión</button>
             </div>
             <div class="caja__trasera-register">
               <h3>¿Aún no tienes una cuenta?</h3>
               <p>Regístrate para que puedas iniciar sesión</p>
               <button id="btn__registrarse">Registrarse</button>
             </div>
         </div>
         <!--Formulario de login y registro-->
           <div class="contenedor__login-register">
               <!--Login-->
              <form class="formulario__login" action="iniciarusuario.php" method="POST">
                 <h2>Iniciar sesión</h2>
                <input type="text" name="email"  placeholder="Correo electrónico" />
                <?php if (isset($_SESSION['email'])) : ?>
                    <div class="btn btn-danger">
                        <?= $_SESSION['email']; ?>
                    </div>
                <?php endif; ?>
                <input type="password" name="pass" placeholder="Contraseña" />
                <?php if (isset($_SESSION['pass'])) : ?>
                    <div class="btn btn-danger">
                        <?= $_SESSION['pass']; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_login'])) : ?>
                    <div class="btn btn-danger">
                        <?= $_SESSION['error_login']; ?>
                    </div>
                <?php endif; ?>
                 <button>Iniciar</button>
              </form>
                <!--Registro-->
              <form action="registrar.php" method="POST" class="formulario__register">
                  <h2>Registrarse</h2>
                <input type="text" name="nombre" placeholder="Nombre" />
                <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                <input type="text" name="apellidos" placeholder="Apellido" />
                <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                <input type="text" name="email" placeholder="Correo electrónico"/>
                <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'email') : ''; ?>

                <input type="password" name="pass" placeholder="Contraseña"/>
                <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'pass') : ''; ?>

                  <button>Registrarse</button>
              </form>
              <?php BorrarErrores(); ?>
           </div>
       </div>
    </main>
    <script src="Login-register/assets/js-form/formulario.js"></script>
    <div class="finish">
 </div>
 </body>
</html>
<?php require_once 'Leonardo/includes/footer-subpaginas.php'; ?>