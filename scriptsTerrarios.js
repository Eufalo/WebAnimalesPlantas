// variables globales. Para poder usarlas desde todas las funciones.
var map;
var zonasCalor = []; // contenedor para los marcadores del mapa
var bounds; // Se crea una "envoltura" para gestionar zoom y centrado del mapa

$(document).ready(function() {

	cargarImagenesCarrousel();
});


function clickAnimal(nombre){

	var id_producto;
	$.get( "productoNombretoID.php",{Nombre:nombre,Categoria:"1"}, function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	id_producto=json[0]["ID"];
	$.get("./sesionProducto.php",{ID_Producto:id_producto,Categoria:"1"});
	//location.href.replace("../visNoticias.php");
	//console.log(id_producto);
	window.open("./htmlproducto.php", '_self');
});

}
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
function Desconectar(){
	window.open("desconectar.php", '_self');
}
function Admin(){
	window.open("admin.php", '_self');
}
function cargarImagenesCarrousel(){
	$.get( "listDir.php",{dir:"img/Carrousel/"}, function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	//console.log(json);

	var index=0;
	json.forEach(function(elemento){

		$('<div class="item"><img src="'+elemento.ruta+'"><div class="carousel-caption"></div>   </div>').appendTo('.carousel-inner');
    $('<li data-target="#myCarousel" data-slide-to="'+index+'"></li>').appendTo('.carousel-indicators');
		index++;
		});
		$('.item').first().addClass('active');
	  $('.carousel-indicators > li').first().addClass('active');
	  $('#myCarousel').carousel();
		});
	}
