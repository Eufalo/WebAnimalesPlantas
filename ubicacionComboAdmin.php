<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";
	//$id_producto=1;
	//$categoria=0;

	// Introduciendo un idProducto y una categoria

		$sel_query="Select ID_Pais, Nombre From Paises_ID;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"ID_Pais":"'.$row["ID_Pais"].'","Nombre":"'.$row["Nombre"].'"},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}

	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado Json Latitud Longitud
?>
