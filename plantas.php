<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";

	//$categoria=0;

	if(isset($_REQUEST['ID_Planta'])){// Introduciendo un id planta.
		$id_producto= $_REQUEST['ID_Planta'];
		$sel_query="Select * from Plantas where ID_Planta = '". $id_producto ."' order by ID_Planta;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"NombreCientifico":"'.$row["NombreCientifico"].'","Nombre":"'.$row["Nombre"].'","Descripcion":"'.$row["Descripcion"].'","Familia":"'.$row["Familia"].'"},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}

	}else {// Sin introducir id planta resultado todas las plantas
		$sel_query="Select * from Plantas order by ID_Planta;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"NombreCientifico":"'.$row["NombreCientifico"].'","Nombre":"'.$row["Nombre"].'","Descripcion":"'.$row["Descripcion"].'","Familia":"'.$row["Familia"].'","ID_Planta":'.$row["ID_Planta"].'},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}
	}
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado NombreCientifico Nombre Descripcion Familia
?>
