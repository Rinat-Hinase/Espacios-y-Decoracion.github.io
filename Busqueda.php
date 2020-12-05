<!--Header - menu-->]
<?php require_once "leonardo/includes/menu-subpaginas.php"; ?>
<div id="ctn-principal">
        <?php
        if (isset($_POST['busqueda'])): ?><?php
            echo "<h1>Busqueda:". $_POST['busqueda']."</h1><div class='productos'>";
            $entradas = conseguirTodasEntradas($db, null, null, $_POST['busqueda']);
            if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
                while ($entrada  = mysqli_fetch_assoc($entradas)) :
            ?>
                    <div class="producto">
                        <article class="entrada">
                            <a href="Productos.php?nombre=<?=$entrada['titulo']?>">
                            <?php $img = base64_encode($entrada['imagen']);?>
                            <div class="ctn-img"><img src="data:image/jpeg;base64,<?= $img ?>" ></div>
                                <div class="info-producto">
                                    <div class="tt-producto"><?= $entrada['titulo'] ?></div>
                                    <div class="categoria">Clasificacion: <?= $entrada['categoria']; ?> </div>
                                    <div class="precio">Precio: $<?= $entrada['precio']; ?></div>
                                    <?php if($entrada['codigo'] != null): ?>
                                    <div class='codigo'>codigo: <?= $entrada['codigo']; ?></div>
                                    <?php endif; ?>
                                    <div class="descripcion">Descripcion: <?= substr($entrada['descripcion'], 0, 90) . "<span class='azul'>...ver más</span>"; ?> </div>
                                </div>
                            </a>
                        </article>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <div class="alerta alerta-alert">No hay entradas en esta categoria</div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(isset($_GET['clasificacion'])): ?><?php
        echo "<h1>Busqueda:".$_GET['clasificacion']."</h1><div class='productos'>";
            $entradas = conseguirTodasEntradas($db, null, $_GET['clasificacion'], null);
            if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
                while ($entrada  = mysqli_fetch_assoc($entradas)) :
            ?>
                    <div class="producto">
                        <article class="entrada">
                            <a href="Productos.php?nombre=<?=$entrada['titulo']?>">
                            <?php $img = base64_encode($entrada['imagen']);?>
                            <div class="ctn-img"><img src="data:image/jpeg;base64,<?= $img ?>" ></div>
                                <div class="info-producto">
                                    <div class="tt-producto"><?= $entrada['titulo']; ?></div>
                                    <hr/><br/>
                                    <div class="categoria">Clasificación: <?= $entrada['categoria']; ?> </div>
                                    <div class="precio">Precio: $<?= $entrada['precio']; ?></div>
                                    <?php if($entrada['codigo'] != null): ?>
                                    <div class='codigo'>código: <?= $entrada['codigo']; ?></div>
                                    <?php endif; ?>
                                    <div class="descripcion">Descripción: <?= substr($entrada['descripcion'], 0, 90) . "<span class='azul'>...ver más</span>"; ?> </div>
                                </div>
                            </a>
                        </article>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <div class="alerta alerta-alert">No hay entradas en esta categoria</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<!-- FOOTER -->
<?php require_once "leonardo/includes/footer-subpaginas.php"; ?>
</body>

</html>