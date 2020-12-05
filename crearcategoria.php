<?php
require_once 'leonardo/includes/menu-subpaginas.php';
?>

<!-- CAJA PRINCIPAL -->
<div id="ctn-principal">

	<h1> Crear categorias </h1>
	<p> Añade categorias una mejor organización de productos </p>
	<br />
	<hr />
	<br />
	<form enctype="multipart/form-data" action="guardar-categorias.php" method="post" name="form1">
		<table align="center">
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td>
			<?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'nombre') : ''; ?></td>
			</tr>
			<tr>
				<td>Archivo</td>
				<td><input type="file" name="miArchivo" value="Elija un archivo"></td>
			</tr>
			<tr>
				<td><?php echo isset($_SESSION['errores']) ? MostrarError($_SESSION['errores'], 'archivo') : ''; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="guardar"></td>
			</tr>
		</table>
	</form>
	<?php BorrarErrores(); ?>
	<?php BorrarAceptadas(); ?>

</div>
<?php require_once 'leonardo/includes/footer.php'; ?>