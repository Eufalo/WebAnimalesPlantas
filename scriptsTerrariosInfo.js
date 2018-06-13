
$( document ).ready(function() {
cargarTerrarios("Desierto",1);
cargarTerrarios("Agua dulce",7);
});
function cargarTerrarios(clima,tipo){
	$.get( "./cargarTerrarioInfo.php",{ID_Tipo:tipo}, function(data) {
		var json = JSON.parse(data);
		if(json.length>3){
			aux=3;
		}else aux=4;
		$('<h2 align="center">'+clima+'</h2> ').appendTo('#terrariosContainer');//<div class="row">
		json.forEach(function(elemento){
		console.log("Hola");
			$('<div class="col-md-'+aux+'"> <div class="backgroundImagenText" data-theme="a"> '
			+'<a target="_blank" href="./img/terrarios/'+elemento.Nombre+'.jpg"><img src="./img/terrarios/'+elemento.Nombre+'.jpg" class="img-circle" alt="Cinque Terre"></a>'
			+'<div class="caption"><p align="center">Alto: '+elemento.Alto+' Ancho: '+elemento.Ancho+' Largo: '+elemento.Largo+' </p>'
		+'</div></div></div>').appendTo('#terrariosContainer');

		});
		//$('</div>').appendTo('#terrariosContainer');

		});
}
