
$( document ).ready(function() {

	CargarAnimales();
	CargarPlantas();

});

function CargarAnimales() {
	$.get( "./animales/animales.php", function(data) {
	//console.log( "datos descargados: " + data )
	// pasar de String a un array json
	var json = JSON.parse(data);
	//console.log(json);

	json.forEach(function(elemento){
		$('#listaAnimales').append('<li data-corners="false" data-shadow="false" data-iconshadow="true"'
		+'data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="a"'
		+'class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-li-has-thumb ui-corner-top ui-btn-up-a">'
		+'<div class="ui-btn-inner ui-li ui-corner-top"><div class="ui-btn-text"><a onclick="clickAnimal(\''+elemento.Nombre+'\')" align="left" class="ui-link-inherit">'
		+elemento.Nombre+'<img class="listaImagen ui-li-thumb ui-corner-tl" src="./img/Animales-Plantas/'+elemento.Nombre+'.jpg"></a></div>'
		+'<span class="ui-icon ui-icon-arrow-r ui-icon-shadow">&nbsp;</span></div></li>');
		});

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

function radioClick(categoria){

	if(categoria==1){
$("#crearProducto").empty();
		$('<div class="row"> '
		+'<div class="col-sm-6 myCols"> <form action="JavaScript:insertarAnimal(Nombre.value,NombreCientifico.value,Descripcion.value,Reino.value,Ubicacion.value)" data-theme="a">'
			+'<div>Nombre:<br>'
						+'<input class="animalInfo" id="Nombre" data-theme="a" type="text" name="Nombre" value="Nombre" >'
					 	+'<div>Nombre Cientifico:<br>'
						+'<input class="animalInfo" id="NombreCientifico" type="text" color="black" name="NombreCientifico" value="Nombre Cientifico" data-theme="a"></div></div>'
				 	+'<div>Descripcion:<br>'
						+'<input class="animalInfo" id="Descripcion" type="text" name="Descripcion" value="Descripcion" data-theme="a"> </div>'
						+'<div>Reino:<br>'
					 	//+'<input class="animalInfo" id="Reino" type="text" name="Reino" value="Reino" data-theme="a"></div>'
						+'<select class="animalInfo" id="Reino"> <option value="0">Peces</option><option value="1">Anfibios</option><option value="2">Reptiles</option><option value="3">Aves</option><option value="4">Mamiferos</option></select>'
						+'<div>Habitat:<br>'
						+'<select class="animalInfo" id="Ubicacion"></div>'
						+'<br><br>'
						+'<div><input id="submit" type="submit" value="Añadir animal " ></div>'
					+'</form>'
				+'</div> </div>').appendTo("#crearProducto");
$('#submit').attr("data-theme", "c").addClass("ui-btn-up-c");
$('.animalInfo').attr("data-theme", "a").addClass("ui-input-text ui-body-a ui-corner-all ui-shadow-inset");
	}else if( categoria==0){
		$("#crearProducto").empty();
				$('<div class="row"> '
				+'<div class="col-sm-6 myCols"> <form action="JavaScript:insertarPlanta(Nombre.value,NombreCientifico.value,Descripcion.value, Familia.value,Ubicacion.value)" data-theme="a">'
					+'<div>Nombre:<br>'
								+'<input class="plantaInfo" id="Nombre" data-theme="a" type="text" name="Nombre" value="Nombre" >'
							 	+'<div>Nombre Cientifico:<br>'
								+'<input class="plantaInfo" id="NombreCientifico" type="text" color="black" name="NombreCientifico" value="Nombre Cientifico" data-theme="a"></div></div>'
						 	+'<div>Descripcion:<br>'
								+'<input class="plantaInfo" id="Descripcion" type="text" name="Descripcion" value="Descripcion" data-theme="a"> </div>'
								+'<div>Familia:<br>'
							 	+'<input class="plantaInfo" id="Familia" type="text" name="Familia" value="Familia" data-theme="a"></div>'
								+'<div>Habitat:<br>'
								+'<select class="animalInfo" id="Ubicacion"></div>'
								+'<br><br>'
								+'<div><input id="submit" type="submit" value="Añadir planta" ></div>'
							+'</form>'
						+'</div> </div>').appendTo("#crearProducto");
		$('#submit').attr("data-theme", "c").addClass("ui-btn-up-c");
		$('.plantaInfo').attr("data-theme", "a").addClass("ui-input-text ui-body-a ui-corner-all ui-shadow-inset");
	}
	$.get("ubicacionComboAdmin.php",function (data){

		var json = JSON.parse(data);
		//console.log(json);
		json.forEach(function (dat){
			$('<option value="'+dat.ID_Pais+'">'+dat.Nombre+'</option>').appendTo("#Ubicacion");
		});
	});
}
function insertarAnimal(nombre,nombreCientifico,descripcion,reino,ubicacion){
	//console.log(nombre,NombreCientifico,descripcion,reino,ubicacion);
	if(comprobarCampos(nombre,nombreCientifico)){
		$.get("insertarAnimalesBBDD.php",{Nombre:nombre,NombreCientifico:nombreCientifico
				,Descripcion:descripcion,Reino:reino,Ubicacion:ubicacion});
		alert("Nuevo Animal creada correctamente")
	}else console.log("mal introducido");
}
function insertarPlanta(nombre,nombreCientifico,descripcion,familia,ubicacion){
	//console.log(nombre,NombreCientifico,descripcion, familia,ubicacion);
	if(comprobarCampos(nombre,nombreCientifico)){
		$.get("insertarPlantasBBDD.php",{Nombre:nombre,NombreCientifico:nombreCientifico
				,Descripcion:descripcion,Familia:familia,Ubicacion:ubicacion});
		alert("Nuevo Planta creada correctamente")
	}else console.log("mal introducido");
}
function comprobarCampos(nombre,NombreCientifico,){
	if(!nombre.match(".*[0-9].*") ){
		if( !NombreCientifico.match(".*[0-9].*")){//comprobamos que contenga numero
		return true;
	}else return false;
}else return false;
}
