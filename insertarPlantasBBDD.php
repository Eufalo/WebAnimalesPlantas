<?php
	require('db.php');
// id producto categoria

if(isset($_REQUEST['Nombre']) && isset($_REQUEST['Familia']) && isset($_REQUEST['Descripcion'])
		&& isset($_REQUEST['NombreCientifico']) && isset($_REQUEST['Ubicacion'])){

			$sql = "INSERT INTO Plantas (Nombre, Familia,Descripcion,NombreCientifico)"
			." VALUES ('".$_REQUEST['Nombre']."', '".$_REQUEST['Familia']."','".$_REQUEST['Descripcion']."','".$_REQUEST['NombreCientifico']."');";

			if (mysqli_query($con, $sql)) {
				$sel_query="Select ID_Planta from Plantas order by ID_Planta DESC LIMIT 1;";
				$result = mysqli_query($con,$sel_query);
				$row = mysqli_fetch_assoc($result);

				$sql = "INSERT INTO Ubicaciones (ID_Producto, Categoria,Localizacion)"
				." VALUES (".$row["ID_Planta"].", 0,'".$_REQUEST["Ubicacion"]."');";
				if (mysqli_query($con, $sql)){
						echo '<script type="text/javascript">alert("Nuevo Planta creada correctamente");</script>';
					}else {
						echo '<script type="text/javascript">alert("Error");</script>';
					}
			} else {
				echo '<script type="text/javascript">alert("Error");</script>';
					}


}

?>
