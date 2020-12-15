<?php require_once "leonardo/includes/menu-subpaginas.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>

<body>
    <div id="ctn-principal">

        <h1> CREAR PRODUCTO</h1>
        <hr />
        <?php echo isset($_SESSION['aceptadas_entrada']) ? MostrarAceptadas($_SESSION['aceptadas_entrada'], 'general') : ''; ?>
        <br />
        <script>
            function previewImage() {
                var file = document.getElementById("file").files;
                if (file.length > 0) {
                    var fileReader = new FileReader();

                    fileReader.onload = function(event) {
                        document.getElementById("preview").setAttribute("src", event.target.result);
                    };

                    fileReader.readAsDataURL(file[0]);
                }
            }
        </script>
            <form id="formulario" enctype="multipart/form-data" action="guardar-formulario.php" method="POST">
                <label class="titulos">Nuevo nombre</label>
                <input class='cajas' placeholder="Título nuevo" type="text" autocomplete="off" name="nombre" />
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>

                <div class="cajas">
                    <select class="custom-select" name="seleccionado">
                        <option selected>Agregar categoría</option>
                        <?php $categorias_elegir = ConseguirCategorias($db); ?>
                        <?php if (!empty($categorias_elegir) && mysqli_num_rows($categorias_elegir) >= 1) : ?>
                            <?php while ($categoria_elegir = mysqli_fetch_assoc($categorias_elegir)) : ?>
                                <option value="<?= $categoria_elegir['id'] ?>"><?= $categoria_elegir['nombre'] ?></option>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <option value="">No hay categorías</option>
                        <?php endif; ?>
                    </select></div>
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

                <label class="titulos">Nueva descripción</label>
                <textarea class='cajas' type="text" name="descripcion" placeholder="Descripción"></textarea>
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

                <label class="titulos">Nueva imagen</label>

                <div class="cajas">
                    <input type="file" id="file" name="miArchivo" accept="image/*" onchange="previewImage();" />
                    <label for="file">Subir imagen
                        <span class="material-icons">add_photo_alternate</span>
                    </label>
                </div>
                <div class="imagen">
                    <img id="preview">
                </div>

                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'imagen') : ''; ?>

                <label class="titulos">Nuevo precio</label>
                <input class='cajas' type="number" autocomplete="off" name="precio" placeholder="Precio" />
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'precio') : ''; ?>
                <label class="titulos">Nuevo código</label>
                <input class='cajas' type="text" autocomplete="off" name="codigo" placeholder="Código" />
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'codigo') : ''; ?>

                <label class="titulos">Nueva cantidad</label>
                <input class='cajas' type="number" name="cantidad" placeholder="Cantidad" />
                <?php echo isset($_SESSION['errores_entrada']) ? MostrarError($_SESSION['errores_entrada'], 'cantidad') : ''; ?>



                <input class='btn btn-success' type="submit" value="Guardar" />
            </form>
        <?php BorrarErrores(); ?>
        <?php BorrarAceptadas(); ?>
    </div>
    <?php require_once "leonardo/includes/footer-subpaginas.php"; ?>
</body>

</html>