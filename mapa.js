var map;
var productoUbicacion;



function initMap() {

 map = L.map('map').setView([47.889815, 52.023551], 1.4);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		minZoom:0.3,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.light'
	}).addTo(map);


	// control that shows state info on hover
	var info = L.control();

	info.onAdd = function (map) {
		this._div = L.DomUtil.create('div', 'info');
		this.update();
		return this._div;
	};

	info.update = function (props) {
    this._div.innerHTML =  (props ?
			'<b>Pais: ' + props.name + '</b><br />  ' + props.name
: 'Sitúa el ratón en una mapa');
	};

	info.addTo(map);


	// get color depending on population density value
	function getColor() {
		return 	'#007913';
	}
	//Estilo del borde de las provs :D
	function style(feature) {
		var i=0;
		while(i<productoUbicacion.length){
		//console.log(feature.id,productoUbicacion.length,productoUbicacion[i]["Localizacion"]);
	//console.log("provincia: " +feature.properties.cod_prov + ", casos:" + casos[feature.properties.cod_prov]['casos']);
	if(feature.id==productoUbicacion[i]["Localizacion"]){
		return {
			weight: 2,
			opacity: 1,
			color: '#34FE56',
			dashArray: '',
			//Relleno de las provs
			fillOpacity: 0.8,
			//PRUEBAS
			fillColor: getColor()
		};
	}else if(i==productoUbicacion.length-1){
		return {
			weight: 2,
			opacity: 1,
			color: 'black',
			dashArray: '',
			//Relleno de las provs
			fillOpacity: 0.8,
			//PRUEBAS
			fillColor: 'black'
		};
	}
	i++;
	}
	}
	//Color del borde en función de donde este el ratón
	function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#000',
			dashArray: '',
			fillOpacity: 0.7
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
	}

	var geojson;

	function resetHighlight(e) {
		geojson.resetStyle(e.target);
		info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds());

	}

	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight
		});
	}
/*
	geojson = L.geoJson(statesData, {
		style: style,
		onEachFeature: onEachFeature
	}).addTo(map);
*/

	// load GeoJSON from an external file
	$.getJSON("./mapa/paises.json",function(data){

	//console.log(data.features[1].id);
	// $.getJSON("barrios_madrid.geojson",function(data){
	// add GeoJSON layer to the map once the file is loaded
	/*
	var datos_ComUbicacion;
	var i=0;
	while(i<productoUbicacion.length){
		console.log(data.features[i]);
	//console.log(feature.id,productoUbicacion.length,productoUbicacion[i]["Localizacion"]);
	//console.log("provincia: " +feature.properties.cod_prov + ", casos:" + casos[feature.properties.cod_prov]['casos']);
	if(data.features[i].id==productoUbicacion[i]["Localizacion"]){
		datos_ComUbicacion.push(data.features[i]);

	}i++;
}
console.log(datos_ComUbicacion);*/
	  geojson = L.geoJson(data,{
		style: style,
		onEachFeature: onEachFeature
		/*
		pointToLayer: function(feature,latlng){
			  var marker = L.marker(latlng,{icon: ratIcon});
			  marker.bindPopup(feature.properties.Location + '<br/>' + feature.properties.OPEN_DT);
			  return marker;
			}
			*/
	  }).addTo(map);
	});

}
function cargarCasos_IniciarMapa(id_producto,categoria) {
	//se solicitan los marcadores para pintarlos...

	$.get( "./mapa/productoUbicacion.php",{ID_Producto:id_producto,Categoria:categoria}, function( data ) {
		//console.log(data);
		// pasar de String a un array json
		var json = JSON.parse(data);

		//console.log(json);

		productoUbicacion = json;
		//return json;

		initMap();
	});
}
