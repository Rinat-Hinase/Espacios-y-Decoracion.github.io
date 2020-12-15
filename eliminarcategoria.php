<?php
require_once 'leonardo/includes/menu-subpaginas.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="ctn-principal">
			<!-- Seleccion de categorias -->
<H1>ELIMINAR CATEGORÍAS</H1>
<?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'general') : ''; ?>
<div id="ctn-btns-alls">
    <form id="formulario" action="guardar-categorias.php" method="post">
        <div class="cajas">
        <select class="custom-select" name="seleccionado2">
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
        </div>
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </form>
    <?php BorrarErrores(); ?>
    <?php BorrarAceptadas(); ?>
</div>
<!-- Seleccion de categorias -->

</div>
<?php require_once 'leonardo/includes/footer.php'; ?>