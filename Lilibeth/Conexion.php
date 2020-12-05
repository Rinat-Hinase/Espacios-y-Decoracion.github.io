<?php
 $servidor= 'localhost:3308';
 $usuarios='root';
 $password='';
 $basedatos='espacios';
 $db= mysqli_connect($servidor, $usuarios, $password, $basedatos);
 
 mysqli_query($db, "SET NAMES 'utf-8");
  function mostrarCantidad(){
    while ($valores = mysqli_fetch_array($query)) {
        echo "<div class='dates'>".$valores[cantidad].'</div>';
      }
  }

?>