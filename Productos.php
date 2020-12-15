<?php require_once 'leonardo/includes/conexion.php'; ?>
<?php require_once 'leonardo/acciones/helpers.php'; ?><?php
                                                      $entrada_actual = conseguirEntrada($db, $_GET['nombre']);
                                                      if (!isset($entrada_actual['titulo'])) {
                                                        header("location: index.php");
                                                      } ?>
<!--Header - menu-->]
<?php require_once "leonardo/includes/menu-subpaginas.php"; ?>
<div id="ctn-principal">
  <div class="ptd">
    <?php if (isset($_GET['nombre']) && !empty($_GET['nombre'])) : ?>
      <?php $entradas = conseguirTodasEntradas($db, null, null, null, $_GET['nombre']);
      if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
        while ($entrada  = mysqli_fetch_assoc($entradas)) :
      ?>
          <div class="title-ptd"><?= $entrada['titulo'] ?></div>
          <?php $img = base64_encode($entrada['imagen']); ?>
          <div class="container">
            <section class="galeria">
              <div class="ctn-img" align="center">
                <a href="#image1"><img src="data:image/jpeg;base64,<?= $img ?>"></a>
              </div>
            </section>
            <article class="light-box" id="image1">
              <img src="data:image/jpeg;base64,<?= $img ?>">
              <a href="#" class="close"><u>X</u></a>
            </article>
          </div>
          <div class="pr">Precio: $<a href="#" class="zoom"><?= $entrada['precio'] ?></a></div>
          <div class="ctn-infor">
            <table border="1" class="horver">
              <?php if (isset($entrada['codigo'])) : ?>
                <?php if (!empty($entrada['codigo'])) : ?>
                  <tr>
                    <td>
                      <div class="code gris">Código:</div><br>
                    </td>
                    <td>
                      <div class="code"><?= $entrada['codigo'] ?></div><br>
                    </td>
                  </tr>
                  <tr>
                  <?php endif; ?>
                <?php endif; ?>
                <td>
                  <div class="cant gris">Cantidad: </div><br>
                </td>
                <td>
                  <div class="cant"><?= $entrada['cantidad'] ?></div><br>
                </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="desc gris">Descripción:</div>
                    </td>
                    <td>
                      <div class="desc"><?= $entrada['descripcion'] ?></div>
                    </td>
                  </tr>
                  <?php if (isset($_SESSION['administradora6155560'])) : ?>
                    <?php $producto = $_GET['nombre']; ?>
                    <tr>
                      <form action="eliminarproducto.php" method="post">
                        <td>
                          <input type="text" maxlength="30" value="<?= $producto ?>" name="nombre">
                        </td>
                        <td>
                          <input type="submit" class="btn btn-danger" value="Eliminar" />
                          <a href="editarproducto.php?nombre=<?= $_GET['nombre'] ?>">
                            <div class="btn btn-success">Editar</div>
                          </a>
                        </td>
                      </form>
                      <td><?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre') : ''; ?></td>
                      <?php BorrarErrores(); ?>
                      <?php BorrarAceptadas(); ?>
                    </tr>
                  <?php endif; ?>
            </table>
            <div class="fech">Fecha de producto: <?= $entrada['fecha'] ?></div>
          </div>
        <?php
        endwhile;
      else :
        ?>
        <div class="centrar">
          <div class="centrado btn btn-danger">¡Error!... estas buscando una página sin entradas</div>
        </div>
      <?php endif; ?>
    <?php else : ?>
      <div class="centrar">
        <div class="centrado btn btn-danger">¡Error!... estas buscando una página sin entradas</div>
      </div>
    <?php endif; ?>
  </div>
</div>
<!-- FOOTER -->
<?php require_once "leonardo/includes/footer-subpaginas.php"; ?>
</body>

</html>