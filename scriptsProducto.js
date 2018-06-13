function cargarProductos(id_producto,categoria){
	//console.log("id_producto",id_producto,"Categoria",categoria)
	var nombreProducto="";
	$.get( "./descripcionProducto.php",{ID_Producto:id_producto,Categoria:categoria}, function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	//console.log(json[0].Descripcion);
	nombreProducto=json[0].Nombre;
	var NombreCientifico = '<p align="center">'+json[0].Nombre+"</p>";
	var Nombre = '<p align="center"><i>'+json[0].NombreCientifico+"</i></p>";
	$("#Nombre").append(NombreCientifico,Nombre);
	var Descripcion = '<p align="justify">'+json[0].Descripcion+"</p>";
	$("#Descripcion").append(Descripcion);
	if(categoria==1){
		var imagen="";
		//console.log(json[0].Reino);
		switch(json[0].Reino) {
    case 0:
        break;
    case 1:
        imagen = '<form><h4 align="center">Reino</h4> <img class="imgReino" src="./img/Reino/anfibio.png" align="center"></form>';
        break;
    case 2:
        imagen = '<h4 align="center">Reino</h4><img class="imgReino" src="./img/Reino/reptil.png" align="middle">';
				break;
}
	//console.log(imagen);
	$("#Reino").append(imagen);
	cargarTerrerarios(id_producto);
}else if(categoria==0){
	var familia = '<h4 align="center">Familia</h4  ><p>'+json[0].Familia+'  </p>';
	$("#Reino").append(familia);
}

	$.get( "./listDir.php",{dir:"./img/"+nombreProducto+"/"}, function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	//console.log(json);

	var index=0;
	json.forEach(function(elemento){
		$('<div class="item"><img src="'+"./"+elemento.ruta+'"><div class="carousel-caption"></div>   </div>').appendTo('.carousel-inner');
		$('<li data-target="#myCarousel" data-slide-to="'+index+'"></li>').appendTo('.carousel-indicators');
		index++;
		});
		$('.item').first().addClass('active');
		$('.carousel-indicators > li').first().addClass('active');
		$('#myCarousel').carousel();
		});
	});

}
function cargarTerrerarios(id_producto){
	$.get( "./cargarAnimalesTerrario.php",{ID_Producto:id_producto}, function(data) {
		var json = JSON.parse(data);
		var aux=0;
		//console.log("data",	json.length);
		if(json.length>3){
			aux=3;
		}else aux=4;
		json.forEach(function(elemento){
		//console.log("Hola");

			$('<div class="col-md-'+aux+'"> <div class="backgroundImagenText" data-theme="a"> '
			+'<img src="./img/terrarios/'+elemento.Nombre+'.jpg" class="img-circle" alt="Cinque Terre">'
			+'<div class="caption"><p align="center">Alto: '+elemento.Alto+' Ancho: '+elemento.Ancho+' Largo: '+elemento.Largo+' </p>'
		+'</div> </a> </div> </div>').appendTo('#terrariosContainer');

		});
		});
}
