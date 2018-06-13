
<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";

	//$categoria=0;

	if(isset($_REQUEST['ID_Producto']) && isset($_REQUEST['Categoria'])){// Introduciendo un id planta.
		$id_producto= $_REQUEST['ID_Producto'];
    $categoria= $_REQUEST['Categoria'];
    if($categoria==1){$aux='Animales';
    $auxid='Animal';
		$sel_query="Select * from ".$aux." where ".$aux.".ID_". $auxid."= '". $id_producto."';";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"NombreCientifico":"'.$row["NombreCientifico"].'","Nombre":"'.$row["Nombre"].'","Descripcion":"'.$row["Descripcion"].'","Reino":'.$row["Reino"].'},';

		}
	}else if($categoria==0){$aux='Plantas';
    $auxid='Planta';
		$sel_query="Select * from ".$aux." where ".$aux.".ID_". $auxid."= '". $id_producto."';";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"NombreCientifico":"'.$row["NombreCientifico"].'","Nombre":"'.$row["Nombre"].'","Descripcion":"'.$row["Descripcion"].'","Familia":"'.$row["Familia"].'"},';

		}
	}
	}
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado

	echo utf8_encode($json);// Resultado NombreCientifico Nombre Descripcion Familia

?>
