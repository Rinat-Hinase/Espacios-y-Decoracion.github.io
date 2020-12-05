<?php
/*
 * Mostrar una imagen desde blob mysql usando PHP
 * Autor: Braulio Andrés Soncco Pimentel <braulio@buayacorp.com>
 * http://www.buayacorp.com/
 * 
 * Este script está bajo licencia de Creative Commons 
 * http://creativecommons.org/licenses/by/2.0/
 */

	// Nivel de errores
	error_reporting(E_ALL);

	// Constantes
	# Servidor de base de datos
	define("DBHOST", "localhost");
	# nombre de la base de datos
	define("DBNAME", "espaciosydecoracion");
	# Usuario de base de datos
	define("DBUSER", "root");
	# Password de base de datos
	define("DBPASSWORD", "");
	
	// Parámetros para recuperar la imagen
	# Recuperamos el parámetro GET con el id único de la foto que queremos mostrar
	$idfoto = (isset($_GET["idfoto"])) ? $_GET["idfoto"] : exit();
	# Recuperamos el parámetro GET para elegir entre la miniatura o la foto real
	$tam = (isset($_GET["tam"])) ? $_GET["tam"] : 1;
	
	// Escojemos la foto real o la miniatura según la variable $tam
	switch($tam) {
		case "1":
			$campo = "foto";break;;
		case "2":
			$campo = "thumb";break;;
		default:
			$campo = "foto";break;;
	}
	
	// Recuperamos la foto de la tabla
	$sql = "SELECT $campo, mime
			FROM categorias 
			WHERE id = 4";
			
	# Conexión a la base de datos
	$link = mysqli_connect(DBHOST, DBUSER, DBPASSWORD) or die(mysqli_error($link));;
	mysqli_select_db(DBNAME, $link) or die(mysqli_error($link));
	
	$conn = mysqli_query($sql, $link) or die(mysqli_error($link));
	$datos = mysqli_fetch_array($conn);
	
	// La imagen
	$imagen = $datos[0];
	// El mime type de la imagen
	$mime = $datos[1];
	
	// Gracias a esta cabecera, podemos ver la imagen 
	// que acabamos de recuperar del campo blob
	header("Content-Type: $mime");
	// Muestra la imagen
	echo $imagen;	