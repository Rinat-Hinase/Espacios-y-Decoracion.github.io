<?php 
  $servidor = "localhost";
  $usuario = "root";
  $contrasena = "";
  $baseDatos ="imagen";
  if (!($db = mysqli_connect($servidor, $usuario, $contrasena))) 		
  {
    echo "Error al conectar con el servidor de base de datos.<br/>";
    exit();
  } 
  else 
  {
    //echo "Conexión a la base de datos satisfactoria.<br/>";
  }
  if (!mysqli_select_db($db, $baseDatos)) 
  {
    echo "Error al conectar al servidor de BD, no existe la base de datos (catágo).<br/>";
    exit();
  } 
  else 
  {
    if (!mysqli_set_charset($db, "utf8")) 
    {
      printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($db));
      exit();
    }
  }?>
