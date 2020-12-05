<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Convertir imágenes en base 64</title>
</head>
<body>
<h3>Convertir imágenes en base 64</h3>
<div style="border:4px solid #99CCFF;padding:10px;margin:6px 0 6px 0;">
<?php
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile']['size'];
echo $_FILES['uploadedfile']['name'];
if ($_FILES['uploadedfile']['size']>20000)
{$msg=$msg." El archivo es mayor que 20KB, debes reducirlo antes de subirlo<br />";
$uploadedfileload="false";}
if (!($_FILES['uploadedfile']['type'] =="image/pjpeg" OR $_FILES['uploadedfile']['type'] =="image/png" OR $_FILES['uploadedfile']['type'] =="image/jpeg" OR $_FILES['uploadedfile']['type'] =="image/x-icon" OR $_FILES['uploadedfile']['type'] =="image/gif"))
{$msg=$msg." Tu archivo tiene que ser JPG, JPEG, ICO, PNG o GIF. Otros archivos no son permitidos<br />";
$uploadedfileload="false";}
$file_name=$_FILES['uploadedfile']['name'];
$add="upload/$file_name";
if($uploadedfileload=="true"){
if(move_uploaded_file ($_FILES['uploadedfile']['tmp_name'], $add)){
echo " ha sido subido satisfactoriamente";
  echo "<img src='upload/$file_name' width='' height='' alt='' />";
}else{echo "Error al subir el archivo";}
}else{echo $msg;}
?>
<?php
echo '<br /> El código del archivo es el siguiente:<br />';
echo '<textarea  onclick="this.select()" cols="64" rows="4" style="margin:8px 0 8px 0;padding:4px;background-color:#FFFFE0;">';
$imagedata = file_get_contents("upload/$file_name");
echo base64_encode($imagedata);
echo '</textarea>';
?>
<div style="width:520px;border:1px solid black;padding:8px;margin:8px 0 8px 0;">
<form enctype="multipart/form-data" action="" method="post"><div>
<input name="uploadedfile" type="file" style="width:400px;" />
<input type="submit" value="Subir archivo" /></div>
</form>
</div>
</div>

</body>
</html>   