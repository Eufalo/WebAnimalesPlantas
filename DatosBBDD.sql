
BEGIN ;
CREATE TABLE IF NOT EXISTS "TerrarioVsPlantas" (
	ID	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	ID_Terrario	INTEGER NOT NULL,
	ID_Planta	INTEGER NOT NULL,
	Comentario	varchar(255)
);
CREATE TABLE "TerrarioVsAnimal" (
	ID	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	ID_Terrario	INTEGER NOT NULL,
	ID_Animal	INTEGER NOT NULL,
	Comentario	varchar(255)
);
CREATE TABLE "PlantaVsAnimal" (
	ID	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	ID_Planta	INTEGER NOT NULL,
	ID_Animal	INTEGER NOT NULL,
	Comentario	varchar(255)
);
CREATE TABLE IF NOT EXISTS "Stock" (
	ID_Stock	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	ID_Producto	INTEGER NOT NULL,
	Categoria	INTEGER NOT NULL,
	Cantidad	INTEGER NOT NULL
);
CREATE TABLE IF NOT EXISTS "Terrarios" (
	ID_Terrario	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	Tipo	INTEGER NOT NULL,
	Alto	NUMERIC NOT NULL,
	Ancho	NUMERIC NOT NULL,
	Largo	NUMERIC NOT NULL,
	Descripcion	INTEGER
);
CREATE TABLE "Ubicaciones" (
	ID_Producto	INTEGER NOT NULL,
	Categoria	INTEGER NOT NULL,
	ID_Ubicacion	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	Latitud	FLOAT NOT NULL,
	Longitud	FLOAT NOT NULL
);
INSERT INTO Ubicaciones VALUES(1,0,1,-21.567225000000000533,115.24139399999999966);
INSERT INTO Ubicaciones VALUES(1,0,2,-34.369906999999997765,115.1370239999999967);
INSERT INTO Ubicaciones VALUES(1,0,3,-10.708311000000000134,142.43530300000000466);
INSERT INTO Ubicaciones VALUES(1,0,4,-37.774351000000002897,149.48852500000000987);
INSERT INTO Ubicaciones VALUES(2,0,5,6.1405500000000001747,-67.324200000000004708);
INSERT INTO Ubicaciones VALUES(2,0,6,-33.358100000000000307,-66.269499999999993632);
INSERT INTO Ubicaciones VALUES(2,0,7,-4.0396200000000002106,-49.658200000000000786);
INSERT INTO Ubicaciones VALUES(2,0,8,-26.745599999999999595,-52.338900000000002422);
INSERT INTO Ubicaciones VALUES(3,0,9,-41.869599999999998372,172.13399999999998612);
INSERT INTO Ubicaciones VALUES(3,0,10,-45.890000000000000569,167.38800000000000523);
INSERT INTO Ubicaciones VALUES(3,0,11,-42.617800000000002568,173.13399999999998612);
INSERT INTO Ubicaciones VALUES(3,0,12,-46.07319999999999993,169.51900000000000545);
INSERT INTO Ubicaciones VALUES(4,0,13,40.044400000000003104,125.4200000000000017);
INSERT INTO Ubicaciones VALUES(4,0,14,35.424900000000000943,127.39700000000000557);
INSERT INTO Ubicaciones VALUES(4,0,15,40.363300000000002397,141.41599999999999681);
INSERT INTO Ubicaciones VALUES(4,0,16,33.596299999999999386,135.70300000000000295);
INSERT INTO Ubicaciones VALUES(1,1,17,30.1617999999999995,90.299400000000005659);
INSERT INTO Ubicaciones VALUES(1,1,18,28.729099999999998971,90.263700000000000045);
INSERT INTO Ubicaciones VALUES(1,1,19,30.277999999999998693,97.690399999999996795);
INSERT INTO Ubicaciones VALUES(1,1,20,28.574899999999999523,97.690399999999996795);
INSERT INTO Ubicaciones VALUES(2,1,21,20.761199999999998765,-101.41500000000000624);
INSERT INTO Ubicaciones VALUES(2,1,22,19.352599999999998914,-104.13899999999999579);
INSERT INTO Ubicaciones VALUES(2,1,23,19.839099999999998402,-100.16200000000000613);
INSERT INTO Ubicaciones VALUES(2,1,24,17.999600000000000932,-101.96399999999999863);
INSERT INTO Ubicaciones VALUES(3,1,25,-19.890699999999998937,125.6839999999999975);
INSERT INTO Ubicaciones VALUES(3,1,26,-32.620899999999998896,120.40999999999999659);
INSERT INTO Ubicaciones VALUES(3,1,27,-22.268799999999998816,146.60200000000000387);
INSERT INTO Ubicaciones VALUES(3,1,28,-36.315100000000001046,144.84399999999999408);
CREATE TABLE IF NOT EXISTS "Animales" (
	ID_Animal	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	Nombre	varchar(255) NOT NULL,
	Reino	INTEGER,
	Descripcion	varchar(255) NOT NULL,
	NombreCientifico	varchar(255)
);
INSERT INTO Animales VALUES(1,'Gecko',2,'Gekko es un género de reptiles escamosos pertenecientes a la familia Gekkonidae. Se distribuyen por el Sudeste Asiático y Oceanía y viven en ambientes húmedos (bosques).1​','Gekko');
INSERT INTO Animales VALUES(2,'Ajolote',1,'El ajolote es una especie de anfibio caudado de la familia Ambystomatidae. Es endémico del sistema lacustre del valle de México y ha tenido una gran influencia en la cultura mexicana. Se encuentra en peligro crítico de extinción por la contaminación de las aguas en las que vive. Es una especie neoténica, es decir, puede alcanzar la madurez sexual reteniendo sus características larvarias, y al contrario que la mayoría de anfibios no pasa por un proceso de metamorfosis','Ambystoma mexicanum');
INSERT INTO Animales VALUES(3,'Pogona',2,'Pogona es un género de lagartos iguanios de la familia Agamidae nativa de las regiones áridas de Australia. Cuentan con espinas dispuestas en su cuello que pueden erizarse para amenazar a un contendiente o durante la época de celo. Pueden variar su color frente a diferentes estímulos como la temperatura y son buenos escaladores gustando de tomar sol no solo sobre rocas sino también sobre arbustos.','Pogona vitticeps');
CREATE TABLE IF NOT EXISTS "Plantas" (
	ID_Planta	INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
	Nombre	varchar(255) NOT NULL,
	Familia	varchar(255),
	Descripcion	varchar(255),
	NombreCientifico	varchar(255)
);
INSERT INTO Plantas VALUES(1,'Jarrito enano','Cephalotaceae',replace('El género monotípico Cephalotus es una planta insectívora endémica de Australia Occidental. Ocurre en los márgenes de los humedales en el rincón sudoccidental de Australia Occidental. En esta parte del país se registra un índice elevado de precipitaciones y como resultado hay amplias zonas de hábitat idóneo, especialmente en la llanura costera del sur. Dentro de su área de distribución hay amplias zonas de bosques propiedad del gobierno, parques nacionales y otras reservas, donde la especie es común y posiblemente haya un gran número de ejemplares.\nLa especie se reproduce fácilmente a partir de pequeños segmentos de rizomas y, por ende, se comercializa con frecuencia y se cultiva ampliamente. La variación morfológica en las poblaciones silvestres no es evidente. Como la especie se reproduce fácilmente, es poco probable que las plantas cultivadas procedan del medio silvestre.\nEn el marco del examen decenal, el Comité de Flora determinó que Cephalotus follicularis podía suprimirse del Apéndice II, ya que desde que se incluyó en dicho Apéndice no se ha registrado comercio de especímenes silvestres. En la quinta reunión del Comité de Flora celebrada en México, en mayo de 1994, se apoyó plenamente esta propuesta.','\n',char(10)),'Cephalotus follicularis');
INSERT INTO Plantas VALUES(2,'Estrella de mar','Bromeliaceae','Es una bromelia terrestre que tiene un encanto especial. Tiene un crecimiento lento, y es una especie perenne.  Las hojas nacen en roseta, formando una superposición que asemejan estrellas. Tienen un dibujo rayado muy característico de color crema principalmente, aunque existen en otras muchas coloraciones, los bordes son ondulados y generalmente aserrados.  Produce una pequeñas flores en color blanco, generalmente en verano. En la sombra, las hojas son de color verde amarillo con rayas centrales y marginales de color verde oscuro, en una luz más fuerte, que se tiñen de color rosa brillante, sobre todo en la base, y en la luz fuerte, la planta entera se convierte en rosa rojizo y pierde gran parte del color verde.','Cryptanthus Bivittatus');
INSERT INTO Plantas VALUES(3,'Pikopiko','Aspleniaceae','El pikopiko deja crecer pequeños bulbillos encima de sus frondas. Una vez que han crecido alrededor de 5 cm, ésos vástagos se caen y con el suelo provisto donde aterrizarán y se enterrarán, el cual debe mantenerse húmedo, entonces se desarrollará un sistema de raíces que terminarán convirtiéndose en nuevos helechos. Este adicional método de reproducción es más práctico de hacerse que la propagación por esporas.','Asplenium Bulbiferum');
INSERT INTO Plantas VALUES(4,'Nigrescens','Asparagáceas','Es una planta de hoja perenne que crece de un corto rizoma y tiene mechones de hojas, de la que surgen flores en racimos en el tallo corto por encima de las hojas. Sus hojas cambian de verde a morado oscuro (casi negro) y puede crecer hasta los 20 cm de longitud. Los frutos son cápsulas y contienen semillas de color negro azulado. Esta planta se utiliza comúnmente en jardines de roca o tiestos elevados como planta ornamental.','Ophiopogon Planiscapus Nigrescens');

COMMIT;
