
<?php
	require('db.php');
// id producto categoria
	$count=1;
	$json = "[ ";

	//$categoria=0;

	if(isset($_REQUEST['Nombre']) && isset($_REQUEST['Categoria'])){// Introduciendo un id planta.
		$nombre= $_REQUEST['Nombre'];
    $categoria= $_REQUEST['Categoria'];
    if($categoria>0){$aux='Animales';
    $auxid='Animal';}else {$aux='Plantas';
    $auxid='Planta';}
		$sel_query="Select * from ".$aux." where ".$aux.".Nombre= '". $nombre."';";
		$result = mysqli_query($con,$sel_query);
		while($row = mysqli_fetch_assoc($result)) {
			$json = $json.'{"ID":"'.$row["ID_".$auxid].'"},';
			//$json = $json.'{"ID":"'.$row["ID_Animal"].'"},';

		}

	}
	$json = substr($json, 0, -1)."]";
	// se devuelve el resultado

	echo utf8_encode($json);// Resultado NombreCientifico Nombre Descripcion Familia

?>
