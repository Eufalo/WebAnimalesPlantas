<?php
	require('../db.php');
// id producto categoria
	$count=1;
	$json = "[ ";

	//$categoria=0;

	if(isset($_REQUEST['ID_Producto']) && isset($_REQUEST['Categoria']) ){// Introduciendo un id planta.
		$id_producto= $_REQUEST['ID_Producto'];
    $categoria= $_REQUEST['Categoria'];
    if($categoria>0){$aux='Animales';
    $auxid='Animal';}else {$aux='Plantas';
    $auxid='Planta';}
		$sel_query="Select Ubicaciones.Localizacion, ".$aux.".Nombre, ".$aux.".NombreCientifico
    from Ubicaciones, ".$aux." where Ubicaciones.ID_Producto  ='"
    . $id_producto."' and Ubicaciones.Categoria = '". $categoria ."' and ".$aux.".ID_". $auxid."= '". $id_producto."';";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"Localizacion":"'.$row["Localizacion"].'","Nombre":"'.$row["Nombre"].'"},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}

	}/*else {// Sin introducir id planta resultado todas las plantas
		$sel_query="Select * from Plantas order by ID_Planta;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"NombreCientifico":"'.$row["NombreCientifico"].'","Nombre":"'.$row["Nombre"].'","Descripcion":"'.$row["Descripcion"].'","Familia":"'.$row["Familia"].'","ID_Planta":'.$row["ID_Planta"].'},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}
	}*/
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado NombreCientifico Nombre Descripcion Familia
?>
