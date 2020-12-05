<?php
require_once 'leonardo/includes/menu-subpaginas.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="ctn-principal">
			<!-- Seleccion de categorias -->
<div class="T-Categoria">Eliminar una categoria </div>
<?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'general') : ''; ?>
<div id="ctn-btns-alls">
    <form action="guardar-categorias.php" method="post">
        <select class="custom-select" name="seleccionado2">
            <option selected>Agregar categoria</option>
            <?php $categorias_elegir = ConseguirCategorias($db); ?>
            <?php if (!empty($categorias_elegir) && mysqli_num_rows($categorias_elegir) >= 1) : ?>
                <?php while ($categoria_elegir = mysqli_fetch_assoc($categorias_elegir)) : ?>
                    <option value="<?= $categoria_elegir['id'] ?>"><?= $categoria_elegir['nombre'] ?></option>
                <?php endwhile; ?>
            <?php else : ?>
                <option value="">No hay categorias</option>
            <?php endif; ?>
        </select>
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </form>
    <?php BorrarErrores(); ?>
    <?php BorrarAceptadas(); ?>
</div>
<!-- Seleccion de categorias -->

</div>
<?php require_once 'leonardo/includes/footer.php'; ?>