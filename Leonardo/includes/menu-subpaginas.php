<?php require_once 'leonardo/includes/conexion.php'; ?>
<?php require_once 'leonardo/acciones/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Espacios | Decoración</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" type="image/*" href="leonardo/img/bustodeldavid.jpg" />
    <link rel="stylesheet" href="leonardo/css/busqueda.css">
    <link rel="stylesheet" href="leonardo/bobstrap/css/bootstrap.css">
    <link rel="stylesheet" href="leonardo/css/productos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <head>
        <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="leonardo/css/menu-subpaginas.css">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    </head>
    <header>
        <div class="cuadroblanco"></div>
        <div class="header-content">

            <div class="logo">
                <a href="index.php"><img src="leonardo/img/espacios.jpeg" alt=""></a>
            </div>

            <div class="menu" id="show-menu">

                <nav>
                    <ul>
                        <?php if (isset($_POST['busqueda']) || isset($_GET['nombre']) || isset($_GET['editar'])) : ?>
                            <li><a href="index.php" class="negro"> <i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="Todos-productos.php"> <i class="fab fa-youtube"> </i>Todos</a></li>

                            <?php if (isset($_SESSION['usuario'])) : ?>
                                <li><a href="cerrar.php"><i class="icons8-llave"></i>Cerrar sesión</a></li>
                            <?php else : ?>
                                <li><a href="login2.php"><i class="icons8-llave"></i>Registrarse</a></li>
                            <?php endif; ?>

                            <li><a href="Todos-productos.php"> <i class="fab fa-file-alt"> </i>&nbsp;&nbsp;&nbsp;Clasificaciones&nbsp;&nbsp;&nbsp;</a>
                            <?php elseif (isset($_GET['clasificacion'])) : ?>
                            <li><a href="index.php" class="negro"> <i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="Todos-productos.php"> <i class="fab fa-youtube"> </i>Todos</a></li>
                            <?php if (isset($_SESSION['usuario'])) : ?>
                                <li><a href="cerrar.php"><i class="icons8-llave"></i>Cerrar sesión</a></li>
                            <?php else : ?>
                                <li><a href="login2.php"><i class="icons8-llave"></i>Registrarse</a></li>
                            <?php endif; ?>
                            <li class="menu-selected"><a href="Todos-productos.php" class="text-menu-selected"> <i class="fab fa-file-alt"> </i>&nbsp;&nbsp;&nbsp;Clasificaciones&nbsp;&nbsp;&nbsp;</a>
                            <?php elseif (isset($_GET['nombre'])) : ?>
                            <li><a href="index.php" class="negro"> <i class="fas fa-home"></i> Inicio</a></li>
                            <li><a href="Todos-productos.php"> <i class="fab fa-youtube"> </i>Todos</a></li>
                            <?php if (isset($_SESSION['usuario'])) : ?>
                                <li><a href="cerrar.php"><i class="icons8-llave"></i>Cerrar sesión</a></li>
                            <?php else : ?>
                                <li><a href="login2.php"><i class="icons8-llave"></i>Registrarse</a></li>
                            <?php endif; ?>
                            <li><a href="Todos-productos.php"> <i class="fab fa-file-alt"> </i>&nbsp;&nbsp;&nbsp;Clasificaciones&nbsp;&nbsp;&nbsp;</a>
                            <?php else : ?>
                            <li><a href="index.php" class="negro"> <i class="fas fa-home"></i> Inicio</a></li>
                            <li class="menu-selected"><a href="Todos-productos.php" class="text-menu-selected"> <i class="fab fa-youtube"> </i>Todos</a></li>
                            <?php if (isset($_SESSION['usuario'])) : ?>
                                <li><a href="cerrar.php"><i class="icons8-llave"></i>Cerrar sesión</a></li>
                            <?php else : ?>
                                <li><a href="login2.php"><i class="icons8-llave"></i>Registrarse</a></li>
                            <?php endif; ?>
                            <li><a href="Todos-productos.php"> <i class="fab fa-file-alt"> </i>&nbsp;&nbsp;&nbsp;Clasificaciones&nbsp;&nbsp;&nbsp;</a>
                            <?php endif; ?>
                            <ul>
                                <?php
                                header("Content-Type: text/html;charset=utf-8");
                                $categorias_menu = conseguircategorias($db);
                                while ($categoria_menu  = mysqli_fetch_assoc($categorias_menu)) : ?>
                                    <li><a href="busqueda.php?clasificacion=<?= $categoria_menu['nombre'] ?>"><i class='fas fa-search'></i><?= substr($categoria_menu['nombre'], 0, 16) . "." ?><img src="#" alt=""></a></li>
                                <?php endwhile;
                                ?>
                            </ul>
                            </li>
                    </ul>
                </nav>

            </div>

            <div id="ctn-icon-search">
                <i class="fas fa-search" id="icon-search"></i>
            </div>

        </div>

        <div id="icon-menu">
            <i class="fas fa-bars"></i>
        </div>

    </header>


    <div id="ctn-bars-search">
        <form action="busqueda.php" method="POST">
            <input type="text" autocomplete="off" name="busqueda" id="inputSearch" placeholder="¿Qué deseas buscar?">
            <input type="submit" value="Búsqueda" />
        </form>
    </div>

    <?php $entradas = conseguirTodasEntradas($db) ?>
    <ul id="box-search">
        <?php while ($entrada  = mysqli_fetch_assoc($entradas)) {
            echo "<li><a href='Productos.php?nombre=" . $entrada['titulo'] . "'><i class='fas fa-search'></i>" . $entrada['titulo'] . "</a></li>";
        } ?>
    </ul>
    <div class="clearfix"></div>
    <div id="cover-ctn-search"></div>
    <div class="container-alls" id="move-content">