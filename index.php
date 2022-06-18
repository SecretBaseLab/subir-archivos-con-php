<!-- multipart/form-data para subir archivos por paquetes -->
<form action="subir_archivos.php" method="post" enctype="multipart/form-data"> 
<!-- tambien se puede poner reglas para el tipo de archivo -->
  <input type="file" name="archivo[]" id="archivo[]" multiple> 
  <input type="submit" value="Subir">
</form>