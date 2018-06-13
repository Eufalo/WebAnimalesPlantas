<?php

// id producto categoria
	$count=1;
	$json = "[ ";

	//$categoria=0;

	if(isset($_REQUEST['dir'])){// Introduciendo un id planta.
		$dir= $_REQUEST['dir'];
   // abrir un directorio y listarlo recursivo
   if (is_dir($dir)) {
      if ($dh = opendir($dir)) {
         while (($file = readdir($dh)) !== false) {

            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
            //mostraría tanto archivos como directorios
						if($file[0]!="."){
							$json = $json.'{"ruta":"'.$dir.$file.'"},';

						}


         }
      closedir($dh);
      }
   }
}

	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado NombreCientifico Nombre Descripcion Familia
?>
