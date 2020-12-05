<!DOCTYPE html>
<html>
	<head>
		<meta lang="es">
		<meta charset="utf-8">
		<title>Subir Imagen</title>
	</head>
	<body>
 
		<!-- Formulario para subir la imagen -->
		<form enctype="multipart/form-data" action="upload.php" method="post" name="form1">
			<table align="center">
				<tr>
					<td>Archivo</td>
					<td><input type="file" name="miArchivo"></td>
				</tr> 
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" value="UPLOAD"></td>
				</tr>	
			</table>
		</form>
		<!-- Fin del furmulario -->		
		<!-- Tabla que muestra los registros de la base de datos -->
		
		<?php require_once('conexion.php'); //importamos el archivo de conexiÃ³n 
			$result = mysqli_query($db,"Select * from img");//Realizamos la seccion de todos los registros de la tabla de las imagenes.
		?>
		
		<table align="center" width="500px" border="1" style="border-collapse:collapse;">
			<tr>
				<th>Nombre</th>
				<th>ExtensiÃ³n</th>
				<th> - </th>
			</tr>
			
			<?php 
				//Hacemos un ciclo en donde imprimimos cada registro de la tabla
				while($row = mysqli_fetch_array($result)){				
			?>
			<tr>			
				<td><?php  echo $row['fileName'] ?></td>
				<td><?php  echo $row['extension'] ?></td>
				<td><a href="ver-img.php?id=<?php echo $row['idImagen'] ?>">Ver</a></td>
			</tr>
			<?php } //Fin del Ciclo
				mysqli_close($db);//cerramos la conexiÃ³n
			?>
		</table>
 <!-- Fin de la tabla -->
	</body>
</html>