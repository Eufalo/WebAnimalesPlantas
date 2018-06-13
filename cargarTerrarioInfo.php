<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";
	//$id_producto=1;
	//$categoria=0;

	if(isset($_REQUEST['ID_Tipo']) ){// Introduciendo un idProducto y una categoria
		$id_tipo= $_REQUEST['ID_Tipo'];
		$query="Select Nombre, Alto, Ancho, Largo from Terrarios where Tipo = '".$id_tipo."' ;";
		$res=mysqli_query($con,$query);
		while($row = mysqli_fetch_assoc($res)){
		$json = $json.'{"Nombre":"'.$row["Nombre"].'","Alto":"'.$row["Alto"].'","Ancho":"'.$row["Ancho"].'","Largo":"'.$row["Largo"].'"},';
		}
	}

	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado Json Latitud Longitud
?>
