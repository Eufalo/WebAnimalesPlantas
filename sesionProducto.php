<?php
session_start();
?>
<?php
	if(isset($_REQUEST['ID_Producto']) && isset($_REQUEST['Categoria'])){// Introduciendo un id planta.
		$_SESSION["ID_Producto"]= $_REQUEST['ID_Producto'];
		$_SESSION["Categoria"]= $_REQUEST['Categoria'];
		}
?>
