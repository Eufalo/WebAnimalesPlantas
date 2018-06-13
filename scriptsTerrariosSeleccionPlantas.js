$( document ).ready(function() {

	CargarPlantas();
});
function clickPlanta(nombre){
	var id_producto;
	$.get( "productoNombretoID.php",{Nombre:nombre,Categoria:"0"}, function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	id_producto=json[0]["ID"];
	$.get("./sesionProducto.php",{ID_Producto:id_producto,Categoria:"0"});
	//location.href.replace("../visNoticias.php");
	//console.log(id_producto);
	window.open("./htmlproducto.php", '_self');
});
}

function CargarPlantas() {
	$.get( "./plantas.php", function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	//console.log(json);

	json.forEach(function(elemento){
		$('#listaPlantas').append('<li data-corners="false" data-shadow="false" data-iconshadow="true"'
		+'data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="a"'
		+'class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-a">'
		+'<div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="clickPlanta(\''+elemento.Nombre+'\')" align="left" class="ui-link-inherit">'
		+elemento.Nombre+'<img class="listaImagen ui-li-thumb ui-corner-tl" src="./img/Animales-Plantas/'+elemento.Nombre+'.jpg"></a></div>'
		+'<span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>');
		});

		});

}
