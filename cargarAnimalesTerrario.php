<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";
	//$id_producto=1;
	//$categoria=0;

	if(isset($_REQUEST['ID_Producto']) ){// Introduciendo un idProducto y una categoria
		$id_producto= $_REQUEST['ID_Producto'];
		$id_terrarios=array();
		$sel_query="Select ID_Terrario from TerrarioVsAnimal where ID_Animal = '". $id_producto."';";
		$result=mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)){
			array_push($id_terrarios, $row["ID_Terrario"]);
			//$json = $json.'{"poblacion":"'.$row["poblacion"].'","idpoblacion":'.$row["idpoblacion"].'},';
		}

		for($i=0;$i<sizeof($id_terrarios);$i++){
				$query="Select Nombre, Alto, Ancho, Largo from Terrarios where ID_Terrario = '".$id_terrarios[$i]."' ;";
				$res=mysqli_query($con,$query);
				while($row = mysqli_fetch_assoc($res)) {
				$json = $json.'{"Nombre":"'.$row["Nombre"].'","Alto":"'.$row["Alto"].'","Ancho":"'.$row["Ancho"].'","Largo":"'.$row["Largo"].'"},';
		}
	}
	}
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado
	echo utf8_encode($json);// Resultado Json Latitud Longitud
?>
