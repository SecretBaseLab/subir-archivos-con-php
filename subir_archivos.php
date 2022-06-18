<?php
//PROBAR SOLO CON IMAGENES PARA VISUALIZAR, pero sirve para cualquier archivo
// print_r(json_encode($_FILES));   //descomenta esto para ver como llegan los datos al servidor

$directorio = "uploads";
if( !file_exists($directorio) ){ //verifica si existe el directorio
  mkdir($directorio, 0777);
}
$directorioAbierto = opendir($directorio);

foreach ($_FILES['archivo']['tmp_name'] as $posicion => $archivoTemporal) {
  if( $_FILES['archivo']['error'][$posicion] == UPLOAD_ERR_OK ) {  //comprobando q no haya errores en la subida
    $nombreArchivo = basename( $_FILES['archivo']['name'][$posicion] ); //para evitar ataques por medio de los nombres del archivo

    $rutaDestino = $directorio.'/'.$nombreArchivo;    //ruta para guardar los archivos
    if( move_uploaded_file($archivoTemporal, $rutaDestino) ){   //moviendo el archivo desde la ruta temporal a una nueva y verificando que todo este correcto
      echo "Se subio correctamente ".$nombreArchivo.'<br>';
      echo "<img src='$directorio/$nombreArchivo' width='200px'><br>";
    }else
      echo "ha habido un error con ".$nombreArchivo.'<br>';
  }
}

closedir($directorioAbierto);