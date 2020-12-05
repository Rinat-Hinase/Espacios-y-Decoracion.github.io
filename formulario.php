<?php require_once "leonardo/includes/menu-subpaginas.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style type="text/css">
        /*--EDITANDO-MARGENES-POR-DEFECTO--*/
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'open sans', 'roboto', sans-serif;
        }


        /*--EDITANDO-TITULO----------------*/
        .titulo {
            font-size: 50px;
            margin-bottom: 20px;
            color: black;
            text-align: center;
        }

        /*--EDITANDO-FORMULARIO------------*/
        .formulario {
            width: 460px;
            padding: 30px;
            margin: auto;
            margin-top: 80px;
        }

        /*--EDITANDO-INPUTS----------------*/
        .cajas {
            width: 100%;
            padding: 15px;
            border-radius: 2px;
            border: none;
            margin-bottom: 20px;
            font-size: 15px;
            border-left: 20px solid #79b7c9;
            border-right: 20px solid #79b7c9;
            transition: all .3s ease;
        }

        .cajas:hover,
        .cajas:focus {
            border-left: 20px solid black;
            border-right: 20px solid black;
        }

        /*--EDITANDO-TERMINOS--------------*/
        .termino-1 {
            text-align: center;
            color: #fff;
        }

        .termino-2 {
            color: #e28282;
            text-decoration: none;
            font-weight: bold;
            transition: all .3s ease;
        }

        .termino-2:hover {
            color: #227184;
        }

        /*--EDITANDO-BOTON-REGISTRAR-------*/
        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 6px;
            background: #31647c;
            color: #fff;
            font-size: 15px;
            margin: 20px 0;
            cursor: pointer;
            transition: all .3s ease;
        }

        .btn:hover {
            background: #6a92a5;
        }

        .boton {
            width: 20%;
            height: 27%;
            padding: 20px;
            position: relative;
            float: right;
            top: 80px;
            margin-right: 15px;
            border-radius: 6px;
            background: white;
            -webkit-box-shadow: 2px 5px 16px 0px white, 5px 5px 15px 5px rgba(0, 0, 0, 0), 5px 5px 15px 5px rgba(0, 0, 0, 0);
            box-shadow: 2px 5px 16px 0px black, 5px 5px 15px 5px rgba(0, 0, 0, 0), 5px 5px 15px 5px rgba(0, 0, 0, 0);
            font-size: 20px;
        }

        .b1 {
            padding: 20px;
            margin-left: 15%;
            border-radius: 10px;
            background: #151723;
            color: white;
            cursor: pointer;
            transition: all .3s ease;
        }

        .b1:hover {
            background: #5184b5;
        }

        .b2 {
            position: relative;
            top: 10px;
            width: 74%;
            border-radius: 10px;
            margin-left: 15%;
            padding: 20px;
            background: #151723;
            color: white;
            cursor: pointer;
            transition: all .3s ease;
        }

        .b2:hover {
            background: #5184b5;
        }

        @media only screen and (max-width:414px) {
            .formulario {
                width: 360px;
                padding: 30px;
                margin: auto;
                margin-top: 100px;
            }

            .titulo {
                font-size: 30px;
                margin-bottom: 20px;
                color: black;
                text-align: center;
            }

            .boton {
                width: 20%;
                height: 27%;
                padding: 20px;
                position: relative;
                float: right;
                top: 80px;
                margin-right: 30px;
                border-radius: 6px;
                background: white;
                -webkit-box-shadow: 2px 5px 16px 0px white, 5px 5px 15px 5px rgba(0, 0, 0, 0), 5px 5px 15px 5px rgba(0, 0, 0, 0);
                box-shadow: 2px 5px 16px 0px black, 5px 5px 15px 5px rgba(0, 0, 0, 0), 5px 5px 15px 5px rgba(0, 0, 0, 0);
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div id="ctn-principal">

        <h1> EDITAR INFORMACIÓN O CREAR INFORMACIÓN</h1>
        <hr />
        <br />
        <form action="guardar-formulario.php" method="POST">
            <label class="titulos">Nuevo nombre</label>
            <input class='cajas' placeholder="Título nuevo" type="text" name="nombre" />
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

            <label class="titulos">Nueva descripcion</label>
            <textarea class='cajas' type="text" name="descripcion" placeholder="Descripción"></textarea>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

            <label class="titulos">Nueva imagen</label>
            <input class='cajas' type="text" name="imagen" placeholder="URL de imagen"/>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'imagen') : ''; ?>

            <label class="titulos">Nuevo precio</label>
            <input class='cajas' type="number" name="precio" placeholder="Precio"/>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'precio') : ''; ?>

            <label class="titulos">Nuevo clasificacion</label>
            <input class='cajas' type="text" name="clasificacion" placeholder="Clasificación"/>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'clasificacion') : ''; ?>

            <label class="titulos">Nuevo codigo</label>
            <input class='cajas' type="text" name="codigo" placeholder="Código"/>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'codigo') : ''; ?>

            <label class="titulos">Nueva cantidad</label>
            <input class='cajas' type="number" name="cantidad" placeholder="cantidad"/>
            <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'cantidad') : ''; ?>



            <input class='btn' type="submit" value="guardar" />
        </form>
        <?php BorrarErrores(); ?>

    </div>
    <?php require_once "leonardo/includes/footer-subpaginas.php"; ?>
</body>

</html>