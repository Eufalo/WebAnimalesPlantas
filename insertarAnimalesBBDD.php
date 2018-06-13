<?php
	require('db.php');
// id producto categoria

if(isset($_REQUEST['Nombre']) && isset($_REQUEST['Reino']) && isset($_REQUEST['Descripcion'])
		&& isset($_REQUEST['NombreCientifico']) && isset($_REQUEST['Ubicacion'])){

			$sql = "INSERT INTO Animales (Nombre, Reino,Descripcion,NombreCientifico)"
			." VALUES ('".$_REQUEST['Nombre']."', ".$_REQUEST['Reino'].",'".$_REQUEST['Descripcion']."','".$_REQUEST['NombreCientifico']."');";

			if (mysqli_query($con, $sql)) {
				$sel_query="Select ID_Animal from Animales order by ID_Animal DESC LIMIT 1;";
				$result = mysqli_query($con,$sel_query);
				$row = mysqli_fetch_assoc($result);

				$sql = "INSERT INTO Ubicaciones (ID_Producto, Categoria,Localizacion)"
				." VALUES (".$row["ID_Animal"].",1,'".trim($_REQUEST["Ubicacion"])."');";
				if (mysqli_query($con, $sql)){
						echo '<script type="text/javascript">alert("Nuevo animal creado correctamente");</script>';
					}else {
						echo '<script type="text/javascript">alert("Error");</script>';
					}
			} else {
				echo '<script type="text/javascript">alert("Error");</script>';
					}

}


?>
