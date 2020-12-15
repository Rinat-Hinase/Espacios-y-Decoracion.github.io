<?php
require_once 'leonardo/includes/menu-subpaginas.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="ctn-principal">

	<h1> CREAR CATEGORÍAS</h1>
	<p> Añada categorías para una mejor organización de productos </p>
	<br />
	<hr />
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
	<form id="formulario" enctype="multipart/form-data" action="guardar-categorias.php" method="post" name="form1">
		<label for="">Nombre</label>
		<input class="cajas" type="text" name="nombre" placeholder="Nombre de la categoría">

		<?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre') : ''; ?>

		<label for="">Archivo</label>
		<div class="cajas">
		<input type="file" id="file" name="miArchivo" accept="image/*" onchange="previewImage();" />
		<label for="file">Subir imagen
			<span class="material-icons">add_photo_alternate</span>
		</label>
		</div>

		<div class="imagen">
			<img id="preview">
		</div>
		<?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'archivo') : ''; ?>

		<input type="submit" class="btn btn-success" value="Guardar">
	</form>
	<?php BorrarErrores(); ?>
	<?php BorrarAceptadas(); ?>

</div>
<?php require_once 'leonardo/includes/footer.php'; ?>