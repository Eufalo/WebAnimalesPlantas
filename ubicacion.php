<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";
	//$id_producto=1;
	//$categoria=0;

	if(isset($_REQUEST['ID_Producto']) && isset($_REQUEST['Categoria'])){// Introduciendo un idProducto y una categoria
		$id_producto= $_REQUEST['ID_Producto'];
		$categoria= $_REQUEST['Categoria'];
		$sel_query="Select Latitud,Longitud from Ubicaciones where ID_Producto = '". $id_producto ."' and Categoria = '". $categoria ."' order by ID_Ubicacion;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"Latitud":'.$row["Latitud"].',"Longitud":'.$row["Longitud"].'},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}

	}else if(isset($_REQUEST['Categoria'])){// Introduciendo  una categoria
		$categoria= $_REQUEST['Categoria'];
		$sel_query="Select Latitud,Longitud from Ubicaciones where Categoria = '". $categoria ."' order by ID_Ubicacion;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"Latitud":'.$row["Latitud"].',"Longitud":'.$row["Longitud"].'},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}
	}else {// Sin introducir parametros
		$sel_query="Select Latitud,Longitud from Ubicaciones order by ID_Ubicacion;";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"Latitud":'.$row["Latitud"].',"Longitud":'.$row["Longitud"].'},';
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}
	}
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado Json Latitud Longitud 
?>
