<!--Header - menu-->
<?php require_once "leonardo/includes/menu.php"; ?>
<!--Portada-->
<div class="container-all">
    <input type="radio" id="1" name="image-slide" hidden />
    <input type="radio" id="2" name="image-slide" hidden />
    <input type="radio" id="3" name="image-slide" hidden />

    <div class="slide">

        <div class="item-slide">
            <img src="leonardo/Img/img1.jpg">
        </div>

        <div class="item-slide">
            <img src="leonardo/Img/img2.jpg">
        </div>

        <div class="item-slide">
            <img src="leonardo/Img/img3.jpg">
        </div>

    </div>

    <div class="pagination">

        <label class="pagination-item" for="1">
            <img src="leonardo/Img/img1.jpg">
        </label>

        <label class="pagination-item" for="2">
            <img src="leonardo/Img/img2.jpg">
        </label>

        <label class="pagination-item" for="3">
            <img src="leonardo/Img/img3.jpg">
        </label>

    </div>
</div>
<!--Fin de la portada-->
<div class="clearfix"></div>
<!--Categorias-->

<div class="container-categorias">
    <div class="T-Categorias">CATEGORÍAS</div>
    <div class="categorias">
        <?php $categorias_menu = conseguircategorias($db);
        if (!empty($categorias_menu) && mysqli_num_rows($categorias_menu) >= 1) : ?>
            <?php while ($categoria_menu  = mysqli_fetch_assoc($categorias_menu)) : ?>
                <div class="categoria">
                    <?php $img = base64_encode($categoria_menu['imagen']); ?>
                    <a href="busqueda.php?clasificacion=<?= $categoria_menu['nombre'] ?>">
                        <div class="ctn-img">
                            <img src='data:image/jpeg;base64,<?= $img ?>' alt="">
                            <div class="ctn-info">
                                <p><?= $categoria_menu['nombre'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <h1> No hay categorias </h1>
        <?php endif; ?>
        <?php if (isset($_SESSION['administradora6155560'])) : ?>
            <div class="categoria">
                <a href="crearcategoria.php">
                    <div class="ctn-img">
                        <div class="ctn-info">
                            <h1>Agregar<h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="categoria">
                <a href="eliminarcategoria.php">
                    <div class="ctn-img">
                        <div class="ctn-info">
                            <h1>Eliminar<h1>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="clearfix"></div>
<!-- SLIDER DE CATEGORIAS -->
<?php $categorias_slider = ConseguirCategoria($db); ?>
<?php if (!empty($categorias_slider) && mysqli_num_rows($categorias_slider) >= 1) : ?>
    <?php while ($categoria_slider = mysqli_fetch_assoc($categorias_slider)) : ?>
        <div class="T-Categoria"><?= $categoria_slider['nombre'] ?></div>
        <section class="slider">
            <ul class="autoWidth" class="cs-hidden">
                <?php $categoriaseleccionada = $categoria_slider['id']; ?>
                <?php $categorias_sliders = conseguirEntradas($db, $categoriaseleccionada); ?>
                <?php if (!empty($categorias_sliders) && mysqli_num_rows($categorias_sliders) >= 1) : ?>
                    <?php while ($categoria_sliders = mysqli_fetch_assoc($categorias_sliders)) : ?>
                        <!--1------------------------------------>
                        <li class="item-a">
                            <!--Box-->
                            <div class="box">
                                <!--img box -->
                                <div class="slide-img">
                                    <?php $img = base64_encode($categoria_sliders['imagen']); ?>
                                    <img src='data:image/jpeg;base64,<?= $img ?>' alt="">
                                    <!--Overlayer---->
                                    <div class="overlay">
                                        <!--buy-btn----->
                                        <a href="Productos.php?nombre=<?= $categoria_sliders['titulo'] ?>" class="buy-btn">Ver más</a>
                                    </div>
                                </div>
                                <!--detail-->
                                <div class="detail-box">
                                    <!--type-->
                                    <div class="type">
                                        <a href="Productos.php?nombre=<?= $categoria_sliders['titulo'] ?>"><?= $categoria_sliders['titulo'] ?></a>
                                        <span><?= $categoria_slider['nombre'] ?></span>
                                    </div>
                                    <!--Precio-->
                                    <a href="Productos.php?nombre=<?= $categoria_sliders['titulo'] ?>" class="price">$<?= $categoria_sliders['precio'] ?></a>
                                </div>

                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="alerta alerta-alert">&nbsp;&nbsp;&nbsp;&nbsp;No hay entradas en esta categoria &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <?php endif; ?>
            </ul>
        </section>
    <?php endwhile; ?>
<?php else : ?>
    <div class="alerta alerta-alert">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<?php endif; ?>
<!-- SLIDER DE CATEGORIAS -->


<!-- Seleccion de categorias -->
<?php if (isset($_SESSION['administradora6155560'])) : ?>
    <div class="T-Categoria">Añada una categoría </div>
    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'agregar') : ''; ?>
    <?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'eliminar') : ''; ?>
    <?php echo isset($_SESSION['aceptadas']) ? MostrarAceptadas($_SESSION['aceptadas'], 'agregar') : ''; ?>
    <?php echo isset($_SESSION['aceptadas']) ? MostrarAceptadas($_SESSION['aceptadas'], 'eliminar') : ''; ?>
    <div id="ctn-btns-alls">
        <form action="guardarseleccionado.php" method="post">
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
            </select>
            <div id="ctn-btns">
                <div class="agregar-cat"><input type="submit" name="Agregar" class="btn btn-outline-success" value="Agregar" />
                </div>
                <div class="eliminar-cat"><input type="submit" name="Eliminar" class="btn btn-outline-danger" value="Eliminar" />
                </div>
            </div>
        </form>
        <?php BorrarErrores(); ?>
        <?php BorrarAceptadas(); ?>
    </div>
<?php endif; ?>
<!-- Seleccion de categorias -->
</div>
<!-- FOOTER -->
<?php require_once "leonardo/includes/footer.php"; ?>
</body>

</html>