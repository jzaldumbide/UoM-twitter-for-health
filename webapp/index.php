		
	<!DOCTYPE html>



		<html>
		<head>
		<title>Tweet for Health</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<!-- http://localhost/tweethealth/sitev3/index.php?city=melbourne&disease=flu -->
			
			<script type="text/javascript">  
			$(document).ready(function(){ 
				$("#buttonsgroup .btn").click(function(){
					$(this).button('loading').delay(1000).queue(function() {
						$(this).button('reset');
						$(this).dequeue();
						var city="<?php echo $_GET['city']?>";
						var disease=$(this).text().trim();
						getData(city,disease);
					});
				});
			});

			</script>

			<script type="text/javascript">  
			$(document).ready(function(){ 
				$("#busqueda .btn").click(function(){
					$(this).button('loading').delay(1000).queue(function() {
						$(this).button('reset');
						$(this).dequeue();
						var city="<?php echo $_GET['city']?>";
						var disease="'"+document.getElementById("texto").value+"'";
						
						getData(city,disease);
					});
				});
			});

			</script>









			<script>
			$('.dropdown-toggle').dropdown
			</script>
			</head>

			<body>
			<br>
			<br>
			<div class="container">
			<div class="row clearfix" style="border:0px solid#888">
			<div class="col-md-12 " style="border:0px solid#888">
			<h1 align="center">Twitter for Health in 
			<?
			if ($_GET['city']=='Sydney'){
				echo "Sydney";
			}
			elseif ($_GET['city']=='Melbourne') {
				echo "Melbourne";
			}
			elseif ($_GET['city']=='Brisbane') {
				echo "Brisbane";}
				?>
				</h1>

				<hr class="divider">
				<div class="col-lg-4">
				<a href="index.php?city=Melbourne" class="btn btn-primary " role="button">Home</a>
				
					<div class="btn-group">
						<div class="dropdown">
							<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
								City:  <?php echo $_GET['city'];?>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?city=Sydney">Sydney</a></li>
								<li><a href="index.php?city=Melbourne">Melbourne</a></li>
								<li><a href="index.php?city=Brisbane">Brisbane</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="btn-group" id="buttonsgroup">
						<button type="button" class="btn btn-primary">Ebola</button>
						<button type="button" class="btn btn-primary">Flu</button>
						<button type="button" class="btn btn-primary">Hayfever</button>
						
					</div>

				</div>
				<div class="col-lg-4">
				<div class="input-group" id="busqueda">
					<input type="text" class="form-control" id="texto" name="texto" placeholder="Type a disease...">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">Search</button>
					</span>
				</div><!-- /input-group -->

				</div>
				
			</div>




				<hr class="divider">
				</div>

				<div class="row clearfix" style="border:0px solid#888">
				<div id="div_data" class="col-md-12 column" style="border:0px solid#888;overflow:auto; max-height:300px">
				
				<div class="col-md-8, col-md-offset-3">
				<div class="col-md-4">
				
				<details><summary>Data source 1</summary>
	<ul>
				<li id="p_number_1"></li>
				<li id="p_epidemic_1"></li>
				<li id="p_city_1"></li>
				<li id="p_query_1"></li>
				</ul>
				</details>
				</div>

				<div class="col-md-4">
				

							<details><summary>Data source 2</summary>
				<ul>
							<li id="p_number_2"></li>
							<li id="p_epidemic_2"></li>
							<li id="p_city_2"></li>
							<li id="p_query_2"></li>
							</ul>
							</details>




				</div>
				



				</div>
				</div>
				</div>

				<hr class="divider">
				<!-- <div id="panel">
				      <button onclick="toggleHeatmap()">Toggle Heatmap</button>
				      <button onclick="toggleHospitals()">Toggle Hospitals</button>
				      <button onclick="changeGradient()">Change gradient</button>
				      <button onclick="changeRadius()">Change radius</button>
				      <button onclick="changeOpacity()">Change opacity</button>
				    </div> -->
				    <hr class="divider">


				<div class="row clearfix" style="border:0px solid#888">
				<div id="div_map" class="col-md-6 column" style="border:0px solid#888;height:300px">Heat Map
				</div>
				<div id="div_tweets" class="col-md-6 column" style="border:0px solid#888;height:300px">Tweets
				</div>

				</div>
				
				<div class="col-md-12 column" >

				<fieldset id="form">
				<div class="col-md-2 column" >    
					<label for="hospital">Hospitals</label>
				    <input class="checkbox col-md-1 " id="hospital" name="hospital" type="checkbox" value="hospital" checked="checked"/>
				</div>
				<div class="col-md-2 column" > 
					<label for="clinic">Clinics</label>
				    <input class="checkbox col-md-1 " id="clinic" name="clinic" type="checkbox" value="clinic" checked="checked"/>
				</div>
				<div class="col-md-2 column" >	
					<label for="other">Others</label>
				    <input class="checkbox col-md-1 " id="other" name="other" type="checkbox" value="other" checked="checked"/>
				</div>			
			      
				  
				      
				      
				     
			      </p>
				    
				   </fieldset> 
				
				</div>				    
				<hr class="divider">	
				


				<hr class="divider">					
				<div class="row clearfix" style="border:0px solid#888">
				<div id="div_chart1" class="col-md-12 column" style="border:1px solid#888;height:300px">Interactive Chart
				</div>
				</div>

				<hr class="divider">
				<div class="row clearfix" style="border:0px solid#888">
				<div id="div_chart2" class="col-md-12 column" style="border:0px solid#888;height:300px">Bar Chart
				</div>
				<div id="toolbar_div" class="col-md-6 column" style="border:0px solid#888;height:20px">
				<a href="" onclick="downloadcsvfile()" id="downloadcsvfile">Download CSV</a>
				</div>
				</div>


				<hr class="divider">
				<div class="row clearfix" style="border:0px solid#888">
				<div id="div_mapainteractivo" class="col-md-6 column" style="border:0px solid#888;height:300px">Mapa interactivo
				</div>

				<div id="div_completedata" class="col-md-6 column" style="border:0px solid#888;height:300px">Tabla completa
				</div>
				</div>


				<hr class="divider">
				<div class="row clearfix" style="border:0px solid#888">
				
				<div class="btn-group">
				<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown">
				Admin Clusters:
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<li><a href="http://115.146.93.32:5984/_utils" target="_blank">Personal server: Personal: 115.146.93.32:5984</a></li>
				<li><a href="http://115.146.93.176:5984/_utils" target="_blank">Instance1: 115.146.93.176:5984( 4 Ram and 20 HDD )</a></li>
				<li><a href="http://115.146.93.106:5984/_utils" target="_blank">Instance2: 115.146.93.106:5984( 4 Ram and 20 HDD )</a></li>
				<li><a href="http://115.146.93.161:5984/_utils" target="_blank">Instance3: 115.146.93.161:5984(	8 Ram and 80 HDD )</a></li>
				<li><a href="http://115.146.93.161:9200/_plugin/head/" target="_blank">elasticsearch index</a></li>
				<li><a href="https://dashboard.rc.nectar.org.au/project/instances/" target="_blank">Nectar</a></li>
				</ul>
				</div>
				</div>





				</div>
				</div>

				

				


				<br>
				<br>

				<footer align="right">
				<div></div>
				<p>Juan Zaldumbide</p>
				<p><a href="jzaldumbide@student.unimelb.edu.au">
				jzaldumbide@student.unimelb.edu.au</a></p>


				





				</footer>



				<script type="text/javascript">
				
				google.load('visualization', '1', {'packages': ['table', 'map', 'corechart','annotationchart','motionchart']});
							//google.setOnLoadCallback(initialize);
							google.setOnLoadCallback(getData); 
							var counter=0;
							var datacoordfinal=[];
							
							var map, pointarray, heatmap;
							var map2, pointarray2, heatmap2;
							var datacoord2=[]; 


							function getData(city,disease){
								var elasticserver="http://127.0.0.1:9200/";
								//var elasticserver="http://115.146.93.161:9200/";
								var elasticserver2="http://127.0.0.1:9200/australia";
								//var elasticserver2="http://130.56.251.66:9200/";
								var city="<?php echo $_GET['city']?>";
								var size1=0;
								var size2=0;

							//	$.getJSON(elasticserver+city.toLowerCase()+'/_search?&q='+disease, function(data3){ size1=data3.hits.total;console.log(size1);});
							//	$.getJSON(elasticserver2+'/_search?&q='+disease, function(data4){ size2=data4.hits.total;console.log(size2);});
							//	console.log(size1);
							//	console.log(size2);


								if (disease==null) { 
									disease="flu"//console.log("le pongo flu como default");
								};

								datacoordfinal=[];

								//query json


								var queryjson='{\"query\":{\"filtered\" : {\"query\": {\"match\": {\"text\": {\"query\":\"'+disease+'\",\"operator\": \"or\"}}},\"filter\": {\"term\": { \"full_name\": \"'+city.toLowerCase()+'\"}},\"strategy\": \"query_first\"}}}&size=50000' ;

								
								 //var query='http://127.0.0.1:9200/'+city.toLowerCase()+'/_search?&q='+disease+'&size=500';
								 var query=elasticserver+city.toLowerCase()+'/_search?&q='+disease+'&size=50000';
								 console.log(query);

								//query en elasticsearch dos
								var query2=elasticserver2+'/_search?source='+queryjson;  
								console.log(query2);



								$.getJSON(query2, function(data2)//query remoto
									{$.getJSON(query, //aqui personalizar
							 

							   	function(data) {
							   		//para el query 2 es decir data2
							   		counter2=data2.hits.total;
									//fin del query 2
									//console.log(counter2);
									size1=data.hits.total;
									size2=data2.hits.total;

							        counter=data.hits.total;//todos los tweets encontrado de data1

							        document.getElementById("p_number_1").innerHTML = "Tweets found: "+counter ;
							        document.getElementById("p_epidemic_1").innerHTML = "Disease: "+disease;
							        document.getElementById("p_city_1").innerHTML = "City: "+city;
							        document.getElementById("p_query_1").innerHTML = '<details><summary>Query:</summary><p>'+query+"</p></details>";

							        			

							        document.getElementById("p_number_2").innerHTML = "Tweets found: "+counter2;
							        document.getElementById("p_epidemic_2").innerHTML = "Disease: "+disease;
							        document.getElementById("p_city_2").innerHTML = "City: "+city;
							        document.getElementById("p_query_2").innerHTML = '<details><summary>Query:</summary><p>'+query2+"</p></details>";
							        


							        var datatable = new google.visualization.DataTable();
							        datatable.addColumn('string', 'Tweet'); 
							        datatable.addColumn('string', 'Source'); 
							        
							        var datachart = new google.visualization.DataTable();
							        var temp1=[];

							        datachart.addColumn('date', 'Date');
							        datachart.addColumn('number', 'Iterations');
							        datachart.addColumn('string','Iterations of a Tweet');
							        var arraydates=[];
							        var count = {}; 




									//end of motion chart

									//complete chartdata
									var completedata = new google.visualization.DataTable();
									completedata.addColumn('string','id');
									completedata.addColumn('string','user');
									completedata.addColumn('string','Tweet');
									completedata.addColumn('number','Lat');
									completedata.addColumn('number','Long');
									completedata.addColumn('date','Date');
									completedata.addColumn('string','Source');

									//end fo complete chardata

									for(var i=0;i<data.hits.total; i++){	
							        	//tweet table
							        	
							        	datatable.addRow();
							        	//console.log(i+data.hits.hits[i]._source.text);
							        	datatable.setValue(i,0, data.hits.hits[i]._source.text);
							        	datatable.setValue(i,1, "data source 1");
							        	// //end of tweet table

							        	//datachart
							        	var dateparsed=data.hits.hits[i]._source.created_at;
							        	var v=dateparsed.split(' ');
							        	var mydate = v[1]+"/"+v[2]+"/"+v[5];			
							        	
							        	arraydates.push(mydate);
										//end of datachart
										
										//loading data in complete data
										var id=data.hits.hits[i]._id;
										var user=data.hits.hits[i]._source.user.screen_name;
										var texto=data.hits.hits[i]._source.text;
										var fecha=mydate;

										completedata.addRow();
										completedata.setValue(i,0,id);
										completedata.setValue(i,1,user);
										completedata.setValue(i,2,texto);
										completedata.setValue(i,5,new Date(fecha));//no estoy tomando en cuenta la hora
										completedata.setValue(i,6,"data source 1");


										//loading data in complete data

										
										if(Boolean(data.hits.hits[i]._source.geo)==true){
											var Latitud=data.hits.hits[i]._source.geo.coordinates[0];
											var Longitud=data.hits.hits[i]._source.geo.coordinates[1];

											var datacoordtemp=new google.maps.LatLng(Latitud,Longitud);	
											datacoordfinal.push(datacoordtemp);

											completedata.setValue(i,3,Latitud);
											completedata.setValue(i,4,Longitud);

										}
										//console.log(completedata);

									}//fin del if del la funete de data

									for(var i=0;i<data2.hits.total; i++){	
										datatable.addRow();
										//datatable.setValue(i+data.hits.total,0, data2.hits.hits[i]._source.doc.text);//remote server
										datatable.setValue(i+data.hits.total,0, data2.hits.hits[i]._source.text);//remote server
										datatable.setValue(i+data.hits.total,1, "data source 2");


										//var dateparsed=data2.hits.hits[i]._source.doc.created_at;//remote server
										var dateparsed=data2.hits.hits[i]._source.created_at;
										var v=dateparsed.split(' ');
										var mydate = v[1]+"/"+v[2]+"/"+v[5];			
										
										arraydates.push(mydate);
										var id=data2.hits.hits[i]._id;
										var user=data2.hits.hits[i]._source.user.screen_name;
										var texto=data2.hits.hits[i]._source.text;
										//var user=data2.hits.hits[i]._source.doc.user.screen_name;//remote server
										//var texto=data2.hits.hits[i]._source.doc.text;//remote server

										var fecha=mydate;

										completedata.addRow();
										completedata.setValue(i+data.hits.total,0,id);
										completedata.setValue(i+data.hits.total,1,user);
										completedata.setValue(i+data.hits.total,2,texto);
										completedata.setValue(i+data.hits.total,5,new Date(fecha));//no estoy tomando en cuenta la hora
										completedata.setValue(i+data.hits.total,6,"data source 2");
										

										//aqui en el if cambiar source.doc y en lat y long
										if(Boolean(data2.hits.hits[i]._source.geo)==true){
											var Latitud=data2.hits.hits[i]._source.geo.coordinates[0];
											var Longitud=data2.hits.hits[i]._source.geo.coordinates[1];

											var datacoordtemp=new google.maps.LatLng(Latitud,Longitud);	
											datacoordfinal.push(datacoordtemp);

											completedata.setValue(i+data.hits.total,3,Latitud);
											completedata.setValue(i+data.hits.total,4,Longitud);

										}

									}


									//console.log(datacoordfinal);
									//datos de hospitales
									



									//console.log(arraydates);//funcion para ordenar el arreglo de las fechas
									var arraydatesfinal=arraydates.sort(function(date1, date2){
										if (date1 > date2) return 1;
										if (date1 < date2) return -1;
										return 0;
									});

									arraydatesfinal.forEach(function(i) { 
										count[i] = (count[i]||0)+1;  
									});

									var arraycsv=[];
									var firstlinecsv=[city+","+"\n"];
									arraycsv.push(firstlinecsv);

									for(key in count) {
										if(count.hasOwnProperty(key)) {
											var value = count[key];
											var mydate= new Date(key);
											datachart.addRow([mydate, value,'Repetitions: '+value.toString()]);
											
											//arraycsv=arraycsv+'\n'+"'"+mydate+"'"+';'+"'"+value+"'";//array del csv
											var rowcsv=[key+","+value.toString()+"\n"];
											//console.log(rowcsv);
											arraycsv.push(rowcsv);
											rowcsv=[];
											
										}
									}
									
									//csv file 
									console.log(arraycsv);
									console.log(typeof(arraycsv));

									var csvContent = "data:text/csv;charset=utf-8,";
									arraycsv.forEach(function(infoArray, index){

									   dataString = infoArray.join(",");
									   csvContent += index < data.length ? dataString+ "\n" : dataString;

									}); 


									filename=city;
									var encodedUri = encodeURI(csvContent);
									var link = document.createElement("a");
									link.setAttribute("href", encodedUri);
									link.setAttribute("download", city+"_data.csv");

									document.getElementById("downloadcsvfile").onclick = function() {csvclick()};
									function csvclick(){
											link.click(); // This will download the data file named "my_data.csv".
									}
			




									/////end of csv file creation



									var optionschart1 = {
										displayAnnotations: true,
										displayAnnotationsFilter:true,
										fill:44,
										displayZoomButtons:true
									};

									var optionschart2 = {
										legend: { position: "none" },
									};


									var chart1 = new google.visualization.AnnotationChart(document.getElementById('div_chart1'));
									chart1.draw(datachart, optionschart1);

									var chart2 = new google.visualization.ColumnChart(document.getElementById('div_chart2'));
									var chart2view=new google.visualization.DataView(datachart);
									chart2view.setColumns([0,1]);
									chart2.draw(chart2view, optionschart2);
									
									
									var table = new google.visualization.Table(document.getElementById('div_tweets'));
									table.draw(datatable, {showRowNumber: true});
								


								//mapa y tabla interactiva
								

								var completetable = new google.visualization.Table(document.getElementById('div_completedata'));
								var completeview=new google.visualization.DataView(completedata);
								completeview.setColumns([1,2,5,6]);
								completetable.draw(completeview,{showRowNumber:true});


								var geoView = new google.visualization.DataView(completedata);
								geoView.setColumns([3, 4,1]);
								


								var optionsmapainteractivo = {
									showTip: true,
									icons: {
										default: {
											normal: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Azure-icon.png',
											selected: 'http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Ball-Right-Azure-icon.png'
										}
									}
								};

								var mapa =
								new google.visualization.Map(document.getElementById('div_mapainteractivo'));
								mapa.draw(geoView, optionsmapainteractivo);

									                // Set a 'select' event listener for the table.
									                // When the table is selected, we set the selection on the map.
									                google.visualization.events.addListener(completetable, 'select',
									                	function() {
									                		mapa.setSelection(completetable.getSelection());
									                	});

									                // Set a 'select' event listener for the map.
									                // When the map is selected, we set the selection on the table.
									                google.visualization.events.addListener(mapa, 'select',
									                	function() {
									                		completetable.setSelection(mapa.getSelection());
									                	});




									//end of mapa y tabla interactiva

									//updateheatmap(datacoordfinal);
									updateheatmap(datacoordfinal);
								})//;//aqui termina el getjson interno
		});//getjson externo puesto de prueba
	}//fin de la funcion getdata




	function removeHeatMap(){
		if(heatmap2 != null){
			heatmap2.setMap(null);

	//		console.log("clearing");
		}
	}

	function updateheatmap(datacoordfinal) {
								
								var city="<?php echo $_GET['city']?>";
								var mapOptionsMelbourne = {
									zoom: 9,
									center: new google.maps.LatLng(-37.8602828,145.079616),
									mapTypeId: google.maps.MapTypeId.SATELLITE,

								};

								var mapOptionsSydney = {
									zoom: 9,
									center: new google.maps.LatLng(-33.7969235,150.9224326),
									mapTypeId: google.maps.MapTypeId.SATELLITE,
									
								};

								var mapOptionsBrisbane = {
									zoom: 9,
									center: new google.maps.LatLng(-27.4073899,153.0028595),
									mapTypeId: google.maps.MapTypeId.SATELLITE,
									
								};

								var markers = new Array();
								if (city=="Melbourne") {
									map2 = new google.maps.Map(document.getElementById('div_map'), mapOptionsMelbourne);
								
								var hospitales=[
								['David Washington Optometrist',144.98257926,-37.88263611,'clinic'],
								['Dr Daniel Lanzer',145.02730384,-37.86490969,'clinic'],
								['Ear & Hearing Australia',145.027869,-37.864172,'clinic'],
								['Glenferrie Road Medical Centre',145.029814,-37.854337,'clinic'],
								['Glow Health & Weight Loss',145.04184,-37.853006,'clinic'],
								['Karen Cernjak Naturopath',145.02838,-37.8607829999999,'clinic'],
								['Ormond Medical Centre',144.98913005,-37.87208274,'clinic'],
								['Daniel Schnall (Physio)',145.037506,-37.857872,'clinic'],
								['Dr Christopher M Callahan',145.041183,-37.852941,'clinic'],
								['Foot Solutions Physiotherapy',145.008439,-37.885419,'clinic'],
								['Glen Eira Medical Clinic',144.99971,-37.877287,'clinic'],
								['St Kilda Day Hospital (Dorevitch)',144.98277799,-37.87285283,'hospital'],
								['Adam Pincus Naturopath',145.0143563,-37.88580225,'clinic'],
								['Andrew Firestone Psychiatry',144.97224149,-37.81138285,'clinic'],
								['Australian Medical Acupuncture College',145.04184,-37.853006,'clinic'],
								['Australian Urology Associates',145.030293,-37.851281,'clinic'],
								['Glenhuntly Medical Centre',145.04016174,-37.88934078,'clinic'],
								['Glenhuntly Physiotherapy Clinic',145.039727,-37.889,'clinic'],
								['Glenhuntly Road Physiotherpay',145.011167,-37.885447,'clinic'],
								['Greendale Natural Therapies',145.028406,-37.860676,'clinic'],
								['Greg Connolly',145.011167,-37.885447,'clinic'],
								['Beverley Dalziel (Physiotherapist)',145.038545,-37.857682,'clinic'],
								['Botanica Naturopathy',145.029213,-37.858535,'clinic'],
								['Brighton Road Medical Centre',144.991953,-37.876587,'clinic'],
								['Caulfield Family Chiro',145.02436,-37.8734309999999,'clinic'],
								['Caulfield Foot Clinic',145.024481,-37.874857,'clinic'],
								['Caulfield General Medical Centre',145.01547501,-37.8844016499999,'clinic'],
								['Caulfield X-ray Centre',145.01449035,-37.88614311,'clinic'],
								['Colon Irrigation Melbourne',145.0283,-37.8638099999999,'clinic'],
								['Core Physio & Pilates',145.00398555,-37.88487559,'clinic'],
								['Dermatology & Surgery',145.039398,-37.863653,'clinic'],
								['Dermatology & Surgery',145.024621,-37.874283,'clinic'],
								['Drs Damon Lits & Henry Tramer',145.011167,-37.885447,'clinic'],
								['Dynamic Stability Physiotherapy',144.981607,-37.881997,'clinic'],
								['Elsternwick Medical Centre',145.01459415,-37.88614544,'clinic'],
								['Elsternwick Natural Therapies',145.007283,-37.885282,'clinic'],
								['Elwood Natural Health &Wellbeing',144.9829054,-37.88276788,'clinic'],
								['Eyezone Emporium',145.028413,-37.8606253,'clinic'],
								['Fine Tune Physiotherapy',145.041311,-37.8721289999999,'clinic'],
								['Harry Held Optometrists',145.02896903,-37.85983517,'clinic'],
								['Health Care 4 You',145.024265,-37.874007,'clinic'],
								['Independent Imaging Pty Ltd',145.009346,-37.885525,'clinic'],
								['Jane Banting Assoc Physio',145.043842,-37.889474,'clinic'],
								['Jeanette Damen Podiatrist',145.040951,-37.8583529999999,'clinic'],
								['Jennifer Harmer Rhuamologist',145.032796,-37.863137,'clinic'],
								['Kingston Foot Clinic',144.997087,-37.882631,'clinic'],
								['Kooyong Physio',145.031896,-37.840566,'clinic'],
								['Medical Centre',145.024621,-37.874283,'clinic'],
								['Leaps & Bounds Health',145.04095126,-37.85835308,'clinic'],
								['Malvern Endodontics',145.023426,-37.861574,'clinic'],
								['Malvern Hearing Service',145.028257,-37.8641159999999,'clinic'],
								['Malvern Wellness Clinic',145.028992,-37.857027,'clinic'],
								['Maternal & Child Health Clinic',145.00836855,-37.87834425,'clinic'],
								['Medical One',144.98913005,-37.87208274,'clinic'],
								['Melbourne Diagnostic Imaging Group',145.009346,-37.885525,'clinic'],
								['Melbourne Institute Of Plastic Surgery',145.039398,-37.863653,'clinic'],
								['Melbourne Opthalmology',144.999602,-37.885504,'clinic'],
								['Michael Woods Othodontics',145.022585,-37.863696,'clinic'],
								['Monica Hurley Naturopath & Chiropractic',145.034242,-37.852365,'clinic'],
								['Mr Douglas M Druitt Urologist',145.02970699,-37.8624012799999,'clinic'],
								['Nathuropaths',145.022839,-37.88139,'clinic'],
								['Natural Medicine & Weight Management Clinic',145.040337,-37.867697,'clinic'],
								['Passion Chiropractor',144.986887,-37.884755,'clinic'],
								['Peter Farnback (Psychiatry & Psychology)',145.02962901,-37.85576493,'clinic'],
								['Podiatry Clinic',145.013086,-37.885966,'clinic'],
								['Roman Vilderman',144.992832,-37.876449,'clinic'],
								['Simon W S Laurie Cosmetic Surgeon',145.03258915,-37.8611156,'clinic'],
								['Specsavers',145.02847243,-37.8603399699999,'clinic'],
								['St Kilda South Medical Centre',144.982984,-37.872784,'clinic'],
								['Victorian Dermatology & Surgery',145.039398,-37.863653,'clinic'],
								['Vision Now',145.0045363,-37.88493899,'clinic'],
								['Warren Sipser Family Chiropractor',144.98278238,-37.88269369,'clinic'],
								['Womens & Mens Health Physiotherapy',145.032757,-37.8518549999999,'clinic'],
								['Wynlorel General Practice',145.037506,-37.857872,'clinic'],
								['Wynlorel Specialist Clinic',145.0298453,-37.86241485,'clinic'],
								['Abalene',145.012425,-37.885595,'clinic'],
								['Abalene',145.012425,-37.885595,'clinic'],
								['Acland Grange',144.981356,-37.867466,'clinic'],
								['Alexandra',145.022128,-37.885028,'clinic'],
								['Caulfield Hospital',145.01547501,-37.8844016499999,'hospital'],
								['Caulfield Hospital & General Medical Centre',145.01547501,-37.8844016499999,'hospital'],
								['Central Park',144.98528841,-37.85206065,'clinic'],
								['Cliveden Hill Private,',144.98754793,-37.81566205,'clinic'],
								['Colaba',145.0063838,-37.88311475,'clinic'],
								['Craig Care Group',144.979753,-37.817928,'clinic'],
								['Duretta,',144.99859,-37.853143,'clinic'],
								['Edgelea,',144.990799,-37.864654,'clinic'],
								['Freemasons,',144.98410775,-37.81069448,'clinic'],
								['Glenferrie Hospital,',145.030915,-37.819345,'hospital'],
								['Harvey Memorial,',145.01599985,-37.81449755,'clinic'],
								['Kinkora Court',145.033212,-37.816688,'clinic'],
								['Lewisham,',144.99880048,-37.85693639,'clinic'],
								['Masada Private,',145.003096,-37.869801,'clinic'],
								['Mercy Hospital For Women,',144.983539,-37.81223576,'hospital'],
								['Royal Victorian Eye & Ear,',144.97651773,-37.80865636,'clinic'],
								['St Vincent s & Mercy Private,(mercy Site)',144.98446141,-37.81192888,'clinic'],
								['The Avenue Private,',144.99910541,-37.85512607,'clinic'],
								['Vasey Rsl Care Ltd',145.028847,-37.826628,'clinic'],
								['Vasey Rsl Care Ltd',145.027061,-37.822876,'clinic'],
								['Wynnstay,',145.01055345,-37.8526331799999,'clinic'],
								['Baptist Community Care',144.8954055,-37.80031071,'clinic'],
								['Eye Clinic Footscray',144.8951216,-37.80053305,'clinic'],
								['Highgrove Studley Park Nh',145.01756688,-37.80926134,'clinic'],
								['Lynn,',145.01264895,-37.8554865599999,'clinic'],
								['Overton',145.0344324,-37.80343174,'clinic'],
								['Swinburne University Hospital',145.03135325,-37.81947706,'hospital'],
								['A J Porcino',144.964482,-37.754735,'clinic'],
								['Access Osteopathic Clinic',145.000817,-37.758412,'clinic'],
								['Alphington Sports Medicine',145.013637,-37.7837099999999,'clinic'],
								['Angle House Othodontics',144.955261,-37.74003,'clinic'],
								['Apa Medical Centre',145.00045298,-37.7631629,'clinic'],
								['Arthurton Physiotherapy Clinic',144.995071,-37.769012,'clinic'],
								['Atlas Chiropractic Health',144.999084,-37.770025,'clinic'],
								['Back In Motion (Coburg)',144.964709,-37.75099,'clinic'],
								['Batman Park Medical Centre',144.992352,-37.765469,'clinic'],
								['Bell Health & Physio',144.965696,-37.7410759999999,'clinic'],
								['Caring Medical Centre',144.964064,-37.754656,'clinic'],
								['Chinese Medical Centre',144.966649,-37.74522,'clinic'],
								['Coburg Central Clinic',144.96460821,-37.74446815,'clinic'],
								['Coburg Endoscopy Centre',144.964771,-37.7450159999999,'clinic'],
								['Coburg Oseopathy & Health Services',144.957954,-37.740311,'clinic'],
								['Croxton Medical Centre',145.000411,-37.768427,'clinic'],
								['D Celebic Vukoslav',144.998012,-37.775067,'clinic'],
								['Darebin Road Medical Centre',145.003395,-37.763458,'clinic'],
								['Doctorgaia Medical Clinic',144.964588,-37.7541599999999,'clinic'],
								['Doctors Of Northcote',144.99831155,-37.77179805,'clinic'],
								['Dr Aggelos Katopothis',144.96156,-37.769356,'clinic'],
								['Dr Anthony Mariani',144.960744,-37.754869,'clinic'],
								['Dr J A Jorgensen',144.962164,-37.737455,'clinic'],
								['Dr James Jamieson',144.96016905,-37.75480466,'clinic'],
								['Dr Keng',144.960825,-37.755194,'clinic'],
								['Dr Kirit Parikh',144.991913,-37.764065,'clinic'],
								['Dr M Gregory',145.000499,-37.7580189999999,'clinic'],
								['Dr Mesut Konser',144.964762,-37.753181,'clinic'],
								['Dr S H Reddy',144.96575363,-37.73793899,'clinic'],
								['Dr V K Berera',145.010498,-37.778394,'clinic'],
								['Dr W Mccubbery',145.01426,-37.764678,'clinic'],
								['Dundas Street Medical Clinic',145.00251,-37.75255095,'clinic'],
								['East Coburg Physio & Sports Injury',144.964444,-37.754869,'clinic'],
								['F Incani',144.95959,-37.7547219999999,'clinic'],
								['First Place Osteopathy',144.998504,-37.772648,'clinic'],
								['Fitzgerald Podiatry',144.961882,-37.740695,'clinic'],
								['Gribbles Pathology (Bell St)',144.965956,-37.74109,'clinic'],
								['Gribbles Pathology (Moreland Rd)',144.957972,-37.7545499999999,'clinic'],
								['H J Lorbeer',144.962065,-37.741058,'clinic'],
								['Harding Street Medical Centre',144.967655,-37.745354,'clinic'],
								['Health Clinic',145.000428,-37.761066,'clinic'],
								['Healthpoint Clinic',144.99776085,-37.77215871,'clinic'],
								['Hh & B Munir',144.965006,-37.751743,'clinic'],
								['Hung Joseph',145.000609,-37.757291,'clinic'],
								['K Malcolm Lynch',144.997564,-37.775498,'clinic'],
								['M Bernard Lynch',144.960608,-37.754839,'clinic'],
								['Manning-high Physiotherapy Clinic',144.974769,-37.756246,'clinic'],
								['Mary Michalopoulos',144.99803329,-37.77312594,'clinic'],
								['Medical Clinic',144.994697,-37.752077,'clinic'],
								['Melbourne Smile Clinic',144.998033,-37.774965,'clinic'],
								['Moreland Acupunture Clinic',144.958585,-37.75493,'clinic'],
								['Moreland Health Centre',144.965393,-37.755445,'clinic'],
								['Moreland Medical Group',144.966154,-37.755845,'clinic'],
								['Moreland Physiotherapy Centre',144.962396,-37.755059,'clinic'],
								['My Doctor Coburg',144.96596243,-37.74378463,'clinic'],
								['My Podiatry Clinic',144.96514217,-37.74213717,'clinic'],
								['Natural Therapy',144.961845,-37.73708,'clinic'],
								['Northcote & Thornbury Medical Clinic',145.000025,-37.760418,'clinic'],
								['Northcote Chiropractic Centre',144.993368,-37.75686225,'clinic'],
								['Northcote Eye Clinic',144.99818,-37.772462,'clinic'],
								['Northcote Osteopathic Clinic',144.991724,-37.764968,'clinic'],
								['Northcote Plaza Mecical Clinic',145.00057,-37.768438,'clinic'],
								['Northcote Radiology Clinic',144.997473,-37.775947,'clinic'],
								['Northern Consulting Rooms',144.957746,-37.75451,'clinic'],
								['Northern Podiatry',144.998006,-37.7751,'clinic'],
								['Pathcare Consulting Pathologist',145.000479,-37.768428,'clinic'],
								['Prana Yoga & Wellbeing',145.001227,-37.753751,'clinic'],
								['S N Anavekar',144.95937557,-37.75469218,'clinic'],
								['Serena Henry',144.958745,-37.7335379999999,'clinic'],
								['St Kyrollos Family Clinic',144.96472221,-37.7538614099999,'clinic'],
								['Steven Lim',144.99674,-37.77406,'clinic'],
								['Sydney Road Medical Centre',144.96470953,-37.75099045,'clinic'],
								['The Centre For Intergrative Natural Health',144.96618813,-37.7448387,'clinic'],
								['Thornbury Medical Centre',145.02127879,-37.7588385999999,'clinic'],
								['Thornbury Smiles',145.02128499,-37.75868291,'clinic'],
								['Tim Gazelakis',144.957533,-37.7548129999999,'clinic'],
								['Traditional Chinese Medicine & Health Centre',144.998325,-37.7717079999999,'clinic'],
								['Vision Eye Institute',144.96474895,-37.74131625,'clinic'],
								['Life Saving Victoria',144.91534531,-37.839943439,'other'],
								['Melbourne Medibrain Centre',145.018831004,-37.868930999,'hospital'],
								['Preston Family Medical Practice',145.00707091,-37.7459184919999,'clinic'],
								['Alphinton Medical Centre',145.017328192,-37.781498942,'clinic'],
								['Darebin Community Health Centre',145.001291919,-37.769874128,'clinic'],
								['Sandridge Lsc',144.916531457,-37.83968117,'other'],
								['Port Melbourne Lsc',144.942043917,-37.845051957,'other'],
								['Port Melbourne',144.941703997,-37.826254001,'other'],
								['Windsor',144.987861002,-37.866108999,'other'],
								['Mica 2',144.979413003,-37.845582,'other'],
								['Central',144.975009995,-37.8077450039999,'other'],
								['Northcote',145.020041005,-37.782143998,'other'],
								['Moonee Ponds',144.919239801,-37.756351297,'other'],
								['Mica 1',144.958277001,-37.754591997,'other'],
								['Mica 4',145.037873004,-37.757378003,'other'],
								['Cabrini Hosp',145.033395005,-37.862858999,'other'],
								['West Melbourne',144.946618999,-37.808396999,'other'],
								['Footscray',144.895775195,-37.795440304,'other'],
								['Northland',145.020293597,-37.746003797,'other'],
								['City',144.962133999,-37.803882004,'other'],
								['Richmond',145.011327,-37.816924996,'other'],
								['South Melbourne',144.963115001,-37.831203001,'other'],
								['Caulfield',145.016192002,-37.886343999,'other'],
								['Thomas Embling Hospital',145.01272102,-37.788856451,'hospital'],
								['Ascot Vale Mfb',144.916582189,-37.770588007,'other'],
								['Brunswick Mfb',144.965095701,-37.765945486,'other'],
								['Carlton Mfb',144.96213325,-37.803881724,'other'],
								['Eastern Hill Mfb',144.97544427,-37.808905653,'other'],
								['Footscray Mfb',144.895775116,-37.7954397989999,'other'],
								['Hawthorn Mfb',145.040229801,-37.821554995,'other'],
								['Northcote Mfb',144.999385062,-37.771987269,'other'],
								['Port Melbourne Mfb',144.93300061,-37.833202419,'other'],
								['Preston Mfb',144.995008658,-37.74461769,'other'],
								['Richmond Mfb',145.000507138,-37.812582014,'other'],
								['South Melbourne Mfb',144.960202063,-37.827017553,'other'],
								['West Melbourne Mfb',144.951042858,-37.8106461209999,'other'],
								['Windsor Mfb',144.991267275,-37.856575843,'other'],
								['Epworth Hospital',144.993356997,-37.816819001,'other'],
								['Elwood Lsc',144.984281938,-37.889339257,'other'],
								['South Melbourne Lsc',144.94654425,-37.847084567,'other'],
								['St Kilda Lsc',144.974365234,-37.867787761,'other'],
								['Williamstown S&amp;sl',144.888976835,-37.867566341,'other'],
								['Community Mental Health Centre',145.006959662,-37.746636646,'clinic'],
								['Northern Community Care Unit',145.021496938,-37.7360177479999,'hospital'],
								['Freemasons Medical Centre',144.982376026,-37.809418291,'clinic'],
								['Water Police/s&r',144.906535656,-37.863549202,'other'],
								['Williamstown',144.906199729,-37.863382177,'other'],
								['Melbourne North',144.954565633,-37.800307966,'other'],
								['Prahran',145.00008732,-37.847837263,'other'],
								['Preston',145.00593259,-37.7391722589999,'other'],
								['Richmond',144.999578365,-37.81744931,'other'],
								['South Melbourne',144.959569115,-37.834847041,'other'],
								['St Kilda',144.99067766,-37.867887334,'other'],
								['St Kilda Road',144.974344039,-37.835020901,'other'],
								['Malvern',145.029611405,-37.855883208,'other'],
								['Melbourne East',144.966374603,-37.816553571,'other'],
								['Melbourne West',144.952546565,-37.822029851,'other'],
								['Moonee Ponds',144.924078464,-37.764712306,'other'],
								['Northcote',145.002146742,-37.766123452,'other'],
								['Fitzroy',144.979131553,-37.8022218749999,'other'],
								['Flemington',144.932149807,-37.785119107,'other'],
								['Footscray',144.901372799,-37.803867013,'other'],
								['Brunswick',144.96306858,-37.762812743,'other'],
								['Caulfield',145.023271263,-37.881293579,'other'],
								['Collingwood',144.993567885,-37.804043284,'other'],
								['St Kilda Ses Lhq',144.941901001,-37.831446004,'other'],
								['Victorian Headquarters',144.966393998,-37.825751001,'other'],
								['Malvern Ses Lhq',145.042893995,-37.849510003,'other'],
								['Northcote Ses Lhq',145.032657001,-37.777371999,'other'],
								['Essendon Ses Lhq',144.903093005,-37.763404999,'other'],
								['East Melbourne Day Hospital',144.98339697,-37.80968199,'other'],
								['Epworth - Hawthorn',145.022793005,-37.821318996,'hospital'],
								['Hyperbaric Health - Brunswick',144.971707311,-37.756481981,'other'],
								['Olympic Park Imaging',144.983735608,-37.8250507969999,'other'],
								['Peter Macallum Cancer Inst',144.977284001,-37.8119269969999,'hospital'],
								['Royal Talbot Rehabilitation',145.023754998,-37.789310002,'hospital'],
								['Cabrini Hospital - Malvern',145.033395004,-37.862291,'hospital'],
								['St Kilda Day Hospital',144.982200004,-37.8731000019999,'other'],
								['St Vincents - East Melbourne',144.983899997,-37.8122,'hospital'],
								['St Vincents - Fitzroy',144.976099995,-37.807900001,'hospital'],
								['Stonnington Day Surgery',145.0394,-37.8636999969999,'other'],
								['The Avenue Private Hospital',144.998491004,-37.854956003,'hospital'],
								['Toorak Cosmetic Surgery',145.008,-37.841399998,'other'],
								['Toorak - Malvern Day Surgery',145.028577412,-37.864079609,'other'],
								['Brunswick Private Hospital',144.971400002,-37.756900002,'hospital'],
								['St Vincents - Kew',145.023999996,-37.806499996,'hospital'],
								['Melbourne Clinic',144.999650999,-37.814768005,'hospital'],
								['Avenue Plastic Surgery',144.998100005,-37.8561,'hospital'],
								['Berkeley Day Surgery',144.958400005,-37.8014000019999,'other'],
								['Caritas Christi Hospice',145.015787997,-37.805049997,'hospital'],
								['Caulfield Public Hospital',145.01671,-37.882373998,'hospital'],
								['Tarietta Day Surgery',145.017800005,-37.8702000019999,'other'],
								['Epworth Hospital - Cliveden',144.987717003,-37.815639999,'hospital'],
								['Cabrini Rehab - Elsternwick',145.009247002,-37.885723998,'hospital'],
								['Essendon Day Procedure Centre',144.9236,-37.765800005,'other'],
								['Vision Day Surgery Footscray',144.895116995,-37.800529,'other'],
								['East Melbourne Day Centre',144.986200006,-37.8163,'other'],
								['Frances Perry House',144.954894997,-37.798700004,'hospital'],
								['Glenferrie Private Hospital',145.031100002,-37.819399997,'hospital'],
								['North Eastern Rehab Centre',145.031153997,-37.763394003,'hospital'],
								['Masada Private Hospital',145.003099998,-37.8698000009999,'hospital'],
								['Royal Melbourne Hospital',144.955865998,-37.799238998,'hospital'],
								['Melbourne Extended Care',144.948766005,-37.778253996,'hospital'],
								['Cabrini Hospital - Prahran',145.008872004,-37.854105998,'hospital'],
								['Specialist Docklands',144.940999998,-37.8145000039999,'other'],
								['Vision Laser St Kilda Road',144.980299999,-37.850600004,'other'],
								['St Vincents Public Hospital',144.975110999,-37.806778001,'hospital'],
								['Albert Road Clinic',144.972100006,-37.8343,'hospital'],
								['Alfred Public Hospital',144.982091001,-37.845566995,'hospital'],
								['Melbourne Private Hospital',144.957132002,-37.7989670009999,'hospital'],
								['Royal Childrens Hospital',144.948937999,-37.7939919969999,'hospital'],
								['Royal Vic Eye And Ear',144.976122006,-37.808754997,'hospital'],
								['Royal Womens Public Hospital',144.955100005,-37.799263996,'hospital'],
								['Victoria Clinic',144.997199997,-37.848100004,'hospital'],
								['Williamstown Public Hospital',144.892837,-37.8635909979998,'hospital'],
								['Diaverum - North Melbourne',144.939904997,-37.788685999,'hospital'],
								['Rch Travencore Psych',144.934538146,-37.781712675,'hospital'],
								['Coburg Endoscopy Centre',144.964800004,-37.744999997,'other'],
								['Darebin Endoscopy Services',145.0176,-37.781100004,'other'],
								['Royal Dental Hospital',144.964528996,-37.799309998,'hospital'],
								['174 Victoria Parade Surgery',144.977737,-37.808715997,'other'],
								['Epworth Hospital - Freemasons',144.984100003,-37.810699997,'hospital'],
								['Epworth Hospital - Richmond',144.992872998,-37.81745,'hospital'],
								['Cabrini Rehab - Hopetoun',145.010125061,-37.884963719,'hospital'],
								['Ivanhoe Endoscopy Centre',145.044899996,-37.767000005,'other'],
								['John Fawkner Private Hospital',144.9583,-37.754599997,'hospital'],
								['Jolimont Endoscopy Centre',144.978699998,-37.816800005,'other'],
								['Malvern Dialysis Clinic',145.030500004,-37.851499998,'other'],
								['Melbourne Day Surgery Centre',145.030400006,-37.887799996,'other'],
								['Melbourne Endoscopy Centre',144.979100001,-37.844599999,'other'],
								['Marie Stopes - St Kilda East',145.007708002,-37.860209,'other'],
								['Melbourne Oral Facial Surgery',144.971400004,-37.814600002,'other'],
								['Northwest Day Hospital',144.909400004,-37.771200004,'other'],
								['State Control Centre',144.973389997,-37.808437998,'clinic'],
								];
								
								}
								else if (city=="Sydney") {
									map2 = new google.maps.Map(document.getElementById('div_map'), mapOptionsSydney);
									var hospitales=[
									
									['Sydney Ambulance Centre',151.1969578,-33.89665102,'other'],
									['Mascot other',151.1953518,-33.92468848,'other'],
									['Drummoyne other',151.1584746,-33.85558623,'other'],
									['Womens Community Health Centre',151.1557759,-33.88538041,'clinic'],
									['Drummoyne other',151.1538901,-33.85169807,'other'],
									['Marrickville other',151.1538565,-33.90914747,'other'],
									['City Of Sydney other',151.2088132,-33.87518485,'other'],
									['Newtown other',151.1784946,-33.89644532,'other'],
									['Balmain other',151.1770323,-33.85598951,'other'],
									['Matraville other',151.2305884,-33.95571943,'other'],
									['Leichhardt other',151.1588963,-33.88350801,'other'],
									['Mascot other',151.1965348,-33.92584327,'other'],
									['The Rocks other',151.2040758,-33.8618822,'other'],
									['Arncliffe other',151.1516607,-33.93992415,'other'],
									['Darlinghurst other',151.2217593,-33.87603605,'other'],
									['Redfern other',151.2022192,-33.89331865,'other'],
									['Alexandria other',151.2011327,-33.90493926,'other'],
									['Botany other',151.1973421,-33.94469338,'other'],
									['Pyrmont other',151.1959599,-33.87143712,'other'],
									['Glebe other',151.1865958,-33.88122067,'other'],
									['Sydney Water Police',151.1914046,-33.8588426,'other'],
									['The Rocks other',151.2089387,-33.85946643,'other'],
									['Nsw Mounted Police',151.212621,-33.89257996,'other'],
									['City Central other',151.203911,-33.875313,'other'],
									['Balmain other',151.177204,-33.85649332,'other'],
									['Newtown other',151.1785532,-33.89662573,'other'],
									['Marrickville Ses',151.1487692,-33.91095834,'other'],
									['City Of Sydney Ses',151.1879444,-33.89885746,'other'],
									['Ashfield Leichhardt Ses',151.1389696,-33.87960349,'other'],
									['Marrickville other',151.1620738,-33.90770597,'other'],
									['Rockdale other',151.137445,-33.9550946,'other'],
									['Paddington other',151.2259017,-33.8855345,'other'],
									['Nsw Air Ambulance',151.1874455,-33.93343574,'other'],
									['Summer Hill other',151.136822,-33.89019707,'other'],
									['St Vincents Caritas Centre',151.2175682,-33.8792464,'other'],
									['Town Hall other',151.2073271,-33.87383001,'other'],
									['Jean Colvin Private Hospital',151.2358356,-33.87404705,'hospital'],
									['Waverley Woollahra Ses',151.2050172,-33.90929054,'other'],
									['Royal Prince Alfred Hospital',151.1825884,-33.88952414,'hospital'],
									['Marine Rescue Botany Bay',151.1566313,-33.96086412,'other'],
									['Marine Rescue Port Jackson',151.1631057,-33.8559266,'other'],
									['Kings Cross other',151.225465,-33.873085,'other'],
									['Glebe other',151.188415,-33.880193,'other'],
									['Marrickville other',151.1558163,-33.90934673,'other'],
									['Surry Hills other',151.213554,-33.879723,'other'],
									['Paddington other',151.232646,-33.888262,'other'],
									['Redfern other',151.199802,-33.89198,'other'],
									['Mascot other',151.195975,-33.924537,'other'],
									['Woolloomooloo other',151.219013,-33.87255,'other'],
									['Sydney Airport other',151.1717395,-33.94537702,'other'],
									['Sydney Airport other',151.1853374,-33.94908796,'other'],
									['St Vincent s Hospital Dermatology Oncology',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Ibac Infectious Disease',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Inflam Bowel Disease Cl',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Movement Disorders Clinic',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Obesity Clinic',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Orthoptics Clinic',151.2209114,-33.88050794,'hospital'],
									['St Vincents Hospital Colonoscopy',151.2209114,-33.88050794,'hospital'],
									['St Vincent s Hospital Ot Vascular',151.2207509,-33.88036121,'hospital'],
									['St Luke s Private Hospital',151.2261652,-33.87435784,'hospital'],
									['Sydney Dental Hospital',151.2078211,-33.88460625,'hospital'],
									['St Vincents Private Hospital Darlinghurst',151.21978,-33.88078925,'hospital'],
									['Sacred Heart Hospice',151.219172,-33.88051407,'hospital'],
									['Balmain Hospital',151.181944,-33.85947891,'hospital'],
									['Sydney Hospital And Sydney Eye Hospital',151.2124999,-33.86818059,'hospital'],
									['St Vincents Public Hospital Darlinghurst',151.2209114,-33.88050794,'hospital'],
									['Metropolitan Rehabilitation Private Hospital',151.1556949,-33.89922827,'hospital'],
									['Redfern Community Health Centre',151.203307,-33.894291,'clinic'],
									['Glebe Early Childhood Health Centre',151.1853359,-33.87812444,'clinic'],
									['Ultimo Early Childhood Health Centre',151.197233,-33.87681221,'clinic'],
									['Redfern Community Health Centre',151.2033526,-33.89297157,'clinic'],
									['Redfern Early Childhood Health Centre',151.202658,-33.89807582,'clinic'],
									['The Langton Centre',151.2170321,-33.88957396,'clinic'],
									['Paddington Early Childhood Health Centre',151.2248961,-33.88435209,'clinic'],
									['St Vincent s Hospital Diabetes Centre',151.2209114,-33.88050794,'clinic'],
									['Darlinghurst Community Health Centre',151.2215393,-33.87987843,'clinic'],
									['Kings Cross Early Childhood Centre',151.227669,-33.87216451,'clinic'],
									['Area Hiv O riordan Street Centre',151.1964652,-33.91417173,'clinic'],
									['Mascot Early Childhood Health Centre',151.2014109,-33.92674645,'clinic'],
									['Arunga Aboriginal Outreach Early Childhood Centre',151.2309339,-33.98159059,'clinic'],
									['Balmain Early Childhood Health Centre',151.1721034,-33.85967478,'clinic'],
									['Brighton-le-sands Early Childhood Health Centre',151.1538149,-33.96267725,'clinic'],
									['Rockdale Early Childhood Health Centre',151.1406705,-33.95119016,'clinic'],
									['Dulwich Hill Early Childhood Centre',151.1437199,-33.90356157,'clinic'],
									['Marrickville Health Centre',151.1521604,-33.90784431,'clinic'],
									['Leichhardt Early Childhood Health Centre',151.1576814,-33.88719178,'clinic'],
									['The Sanctuary',151.179746,-33.896101,'clinic'],
									['Youthblock Health And Resource Building',151.1794793,-33.8911811,'clinic'],
									['Royal Prince Alfred Hospital Building 11',151.1811938,-33.88855427,'clinic'],
									['Royal Prince Alfred Hospital Building 21',151.1805985,-33.88869308,'clinic'],
									['Royal Prince Alfred Hospital Kgv Building',151.1817138,-33.88962107,'clinic'],
									['Rockdale Community Health Centre',151.1393797,-33.9525143,'clinic'],
									['Arncliffe Child Health Centre',151.1468848,-33.93604263,'clinic'],
									['Eastgardens Early Childhood Health Centre',151.2230575,-33.94446352,'clinic'],
									['Adra Australia',151.2063348,-33.87963787,'clinic'],
									
									];




								}
								else if (city=="Brisbane") {
									map2 = new google.maps.Map(document.getElementById('div_map'), mapOptionsBrisbane);


									var hospitales=[
									['Wesley Hospital',152.9979636,-27.47812967,'hospital'],
									['Access Natural Health',153.0067608,-27.45538279,'clinic'],
									['Acupuncture & Herbal Medicine',152.9905343,-27.47952782,'clinic'],
									['Ashgrove Chiropractic Clinic',152.9792932,-27.44819511,'clinic'],
									['Ashgrove Medical Clinic',152.9919087,-27.44598585,'clinic'],
									['Ashgrove West Group Practice',152.9784769,-27.44891006,'clinic'],
									['Auchenflower  Family Practice',152.9948621,-27.47406725,'clinic'],
									['Auchenflower Medical Centre',152.9945773,-27.47349449,'clinic'],
									['Bardon Newport & Robinson',152.9865478,-27.45845238,'clinic'],
									['Bardon Physiotherapy Centre',152.9865823,-27.45773013,'clinic'],
									['Bardon Smiles',152.9865488,-27.45835586,'clinic'],
									['Bardon Specialist Group',152.9865478,-27.45845238,'clinic'],
									['Blue Care',152.9922251,-27.48134081,'clinic'],
									['Dr G. Harvey',152.9925071,-27.4850468,'clinic'],
									['Dr John Pyle',152.9745795,-27.41267221,'clinic'],
									['Eye Centre Day Hospital',152.9951269,-27.47347876,'clinic'],
									['G. Crowley/ P.dornan/ R. Dunn/ A. Claus',152.989265,-27.4778471,'clinic'],
									['Iris Budget Eyewear',152.9925071,-27.4850468,'clinic'],
									['James Douglas',152.9911625,-27.48345962,'clinic'],
									['Kelly Chiropractic Centre',152.9884259,-27.47857872,'clinic'],
									['L.c. Thompson',152.9973631,-27.4767765,'clinic'],
									['Majestic Health Massage',152.9884259,-27.47857872,'clinic'],
									['Milton Clinic',153.002393,-27.46844706,'clinic'],
									['Milton Cribb St Medical Centre',153.0083208,-27.46956893,'clinic'],
									['Milton K. Cameron',153.004535,-27.46996947,'clinic'],
									['Oscan',152.9884259,-27.47857872,'clinic'],
									['Paddington Dermatology',153.0042266,-27.46095943,'clinic'],
									['Paddington Physiotherapy & Podiatry',153.0058695,-27.46139513,'clinic'],
									['Peggy Lim',153.0037538,-27.46065817,'clinic'],
									['Psychology Clinic',153.0037833,-27.4605393,'clinic'],
									['Qld Govt Health',152.97707,-27.45006923,'clinic'],
									['Red Hill Allsports Physio',153.0067608,-27.45538279,'clinic'],
									['Rivercity Eye Center',152.9951269,-27.47347876,'clinic'],
									['Sullivan & Nicolaides',152.9925071,-27.4850468,'clinic'],
									['Taringa  K. Armitt, Etc.',152.9800317,-27.49212229,'clinic'],
									['Taringa 7 Day Medical Practice',152.9821025,-27.49197026,'clinic'],
									['Taringa Breastscreen',152.9800317,-27.49212229,'clinic'],
									['Taringa Core Health Care',152.9821025,-27.49197026,'clinic'],
									['Taringa Headline Physio',152.9789235,-27.49350522,'clinic'],
									['Taringa Hearing Life',152.9821025,-27.49197026,'clinic'],
									['Taringa Medihearts',152.9821025,-27.49197026,'clinic'],
									['Taringa Physio One',152.9800317,-27.49212229,'clinic'],
									['Taringa Q.m.l.',152.9821025,-27.49197026,'clinic'],
									['Taringa Skin Cancer',152.9795351,-27.4924403,'clinic'],
									['Taringa Sullivan And Nicholaidies',152.9800317,-27.49212229,'clinic'],
									['Taringa Westside Dermatoloty',152.9795351,-27.4924403,'clinic'],
									['Taringa Westside Osteopathy',152.9801499,-27.49326427,'clinic'],
									['Toowong Chiropractic Centre (Adam East)',152.9910232,-27.4842173,'clinic'],
									['Toowong Medical Centre',152.9925071,-27.4850468,'clinic'],
									['Toowong Podiatry',152.9912369,-27.48472062,'clinic'],
									['Toowong Private Hospital Specialist Centre',152.9917177,-27.4774515,'clinic'],
									['Toowong Village Medical Centre',152.9925071,-27.4850468,'clinic'],
									['Taringa other',152.9871076,-27.49136843,'other'],
									['Coz Medic',153.065056,-27.43302437,'clinic'],
									['St. Vincent s Hospital',153.0349856,-27.47361682,'hospital'],
									['A Daniloff Chiropractor',153.0589156,-27.45130579,'clinic'],
									['A. Cochrane',153.0702743,-27.48358082,'clinic'],
									['All Sports Physio Camp Hill',153.0659116,-27.49162585,'clinic'],
									['Balmoral Natural Therapies',153.0641111,-27.46386806,'clinic'],
									['Bulimba Acupuncture',153.0589156,-27.45130579,'clinic'],
									['Bulimba Psychology',153.0610809,-27.45135688,'clinic'],
									['Camp Hill Clinic',153.0755967,-27.49320391,'clinic'],
									['Camp Hill Health Care',153.0758893,-27.49324692,'clinic'],
									['Camp Hill Medical Centre',153.0763468,-27.49332015,'clinic'],
									['Coorparoo Specialists',153.0601234,-27.49361815,'clinic'],
									['D. Castrisos',153.0601234,-27.49361815,'clinic'],
									['Dockside Clinic',153.0366504,-27.47343165,'clinic'],
									['Doctorz On Bennetts',153.0633459,-27.48455709,'clinic'],
									['Dr G Bowden',153.0610809,-27.45135688,'clinic'],
									['Dr K Hutchinson (Eye) Coorparoo',153.0601234,-27.49361815,'clinic'],
									['Dr See',153.0826351,-27.48709934,'clinic'],
									['Dr Sook-kee-ho',153.0754138,-27.49289617,'clinic'],
									['Dr Zolte',153.0631472,-27.46174106,'clinic'],
									['East Brisbane Medical Centre',153.0456244,-27.47985315,'clinic'],
									['Foot Dr Greg Dower',153.0812561,-27.48785184,'clinic'],
									['Gabba Anaesthetics Unit Mater Medical',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 14',153.028213,-27.48411154,'clinic'],
									['Hawthorne Chiropractor',153.0610953,-27.46000282,'clinic'],
									['Hawthorne Family Medicine Clinic',153.063864,-27.46204197,'clinic'],
									['Health & Wellness',153.0286182,-27.48472327,'clinic'],
									['Healthscope Pathology Camp Hill',153.0763468,-27.49332015,'clinic'],
									['Heather Bruce Acupuncturist',153.0601228,-27.46515844,'clinic'],
									['Main Street Medical',153.0351753,-27.48776269,'clinic'],
									['Mater  Centre For Haematology Level 5',153.0279497,-27.4840254,'clinic'],
									['Mater Cardiology Diagnostic Clinic Suite 10',153.028213,-27.48411154,'clinic'],
									['Mater Health And Wellness Clinic',153.0286182,-27.48472327,'clinic'],
									['Mater Medical - Active Rehab Physio',153.0279497,-27.4840254,'clinic'],
									['Mater Medical - Qld Vascular Diagnostics',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre  S&n Pathology',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre  Suite 29',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre  Suite 34',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre 7th Floor Suite 38',153.0279497,-27.4840254,'clinic'],
									['Physio Works Bulimba',153.0637445,-27.46164966,'clinic'],
									['Mater Medical Centre 7th Floor Suite 39',153.0279497,-27.4840254,'clinic'],
									['Mater Medical Centre Giast Clinic',153.0279497,-27.4840254,'clinic'],
									['Mater Medical Centre Mater Pathology',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Qld Xray  Suite 4',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Qsdu',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 13',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 15',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 22',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 23',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 24 Dr Pyke',153.028213,-27.48411154,'clinic'],
									['Physiotheraphy',153.0659116,-27.49162585,'clinic'],
									['Mater Medical Centre Suite 25',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 26',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 32',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 33',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 40',153.028213,-27.48411154,'clinic'],
									['Mater Medical Centre Suite 7',153.028213,-27.48411154,'clinic'],
									['Mater Private 4.08ekco Occupational Services',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic  4.03  Dr Dalzeil',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic  4.05 Axxon Health',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic  6.03',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic  Dr I Astori',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 3.01 Dr A Bell',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 3.03 Dr P  Swindle',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 3.05 Dr G Rice-mc Donald',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 3.06 Prof Florin',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 3.07 Dr Allen',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic -3.08 Dr Cheung',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 4.01 Dr Ingram',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 4th Floor Surgery',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 5.01 Dr Askin',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 5.02 Dr R. Campbell',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 5.05 Dr K Huang',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 5.07  Dr Foley Dr Olsen',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 5.09 Dr Cooke',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 6.01 Specialist',153.0286182,-27.48472327,'clinic'],
									['Mater Private Clinic 6.06 Qscan',153.0286182,-27.48472327,'clinic'],
									['Mater Private Day Unit  Level 7',153.0286182,-27.48472327,'clinic'],
									['Mater Private Hospital Qxray',153.0287317,-27.48398985,'clinic'],
									['Mater Private Level 3 Qld X Ray Pet/ct',153.0279497,-27.4840254,'clinic'],
									['Mater Private Preadmission Clinic',153.0286182,-27.48472327,'clinic'],
									['Mater Women s Diagnostic Centre 6.08',153.0286182,-27.48472327,'clinic'],
									['Norman Park Medical Centre',153.0703876,-27.4848224,'clinic'],
									['Osteo Works',153.0361953,-27.48237849,'clinic'],
									['Physio On Stanley',153.0412049,-27.48707207,'clinic'],
									['Qml Mater Private',153.0286182,-27.48472327,'clinic'],
									['Qml Pathology Hawthorne',153.0637754,-27.46221162,'clinic'],
									['Sullivan And Nicolaides Camp Hill',153.0766638,-27.49326213,'clinic'],
									['Trevor Williams Coorparoo',153.0606107,-27.49333394,'clinic'],
									['Y Morley Physiotherapist',153.063864,-27.46204197,'clinic'],
									['Balmoral other',153.0719861,-27.45930247,'other'],
									['Camp Hill other',153.0741873,-27.49220526,'other'],
									['Morningside other',153.071085,-27.4656036,'other'],
									['Amity At New Farm',153.0437336,-27.47167901,'clinic'],
									['Aveo Albion Forest Place Clayfield',153.0462048,-27.42878837,'clinic'],
									['Caritas Care-oxford Park',152.967249,-27.40740967,'clinic'],
									['Merriwee Court - Blue Care',153.0731845,-27.43213794,'clinic'],
									['Riverton Mothers Hospital',153.049331,-27.4244858,'hospital'],
									['Dr Greg Coates (Chirpractor)',153.0455437,-27.46737392,'clinic'],
									['Villa Maria Centre',153.029735,-27.45866281,'clinic'],
									['Woodlands Park',153.0039667,-27.44203417,'clinic'],
									['131 Wickham Terrace',153.0256563,-27.46444008,'clinic'],
									['201 Wickham Terrace',153.023804,-27.46523122,'clinic'],
									['225 Wickham Terrace',153.0231212,-27.46504685,'clinic'],
									['79 Wickham Terrace',153.0267941,-27.46429426,'clinic'],
									['Abuntu International Medical Centre',153.0211366,-27.41078658,'clinic'],
									['Ascot Family Practice',153.0658529,-27.43151671,'clinic'],
									['Ascot Medical Centre',153.0652476,-27.43568606,'clinic'],
									['Ashgrove General Practice',152.9913043,-27.44464763,'clinic'],
									['Ashgrove Physio',152.9913043,-27.44464763,'clinic'],
									['Astor Terrace Day Hospital',153.0256491,-27.46402627,'clinic'],
									['Ballow Chambers',153.0257965,-27.46436667,'clinic'],
									['Brisbane Private Hospital',153.0246065,-27.46501268,'clinic'],
									['Brisbane Private Imaging',153.0246065,-27.46501268,'clinic'],
									['Brisbane Private Imaging',153.0246065,-27.46501268,'clinic'],
									['Brookside Family Clinic',152.979989,-27.40932705,'clinic'],
									['Clayfield Chirporactic',153.0533643,-27.42043456,'clinic'],
									['Clayfield Cosmetic Medicine',153.0548537,-27.41880081,'clinic'],
									['Clayfield Medical Centre',153.0552896,-27.41828157,'clinic'],
									['Clayfield Natural Therapies',153.0548537,-27.41880081,'clinic'],
									['Clayfield Physiotherapy',153.0533643,-27.42043456,'clinic'],
									['Coolabah Family Support Program',153.0356893,-27.42371785,'clinic'],
									['D & K Webster (Optometrist)',152.9912664,-27.40652995,'clinic'],
									['Dermatology Specialist Centre',153.0558157,-27.41929074,'clinic'],
									['Diagnostic Imaging Spring Hill',153.0265199,-27.46373617,'clinic'],
									['Dr E Nixon',152.9998034,-27.40749701,'clinic'],
									['Dr Pau;l Lucina  Spina Plus',153.0246065,-27.46501268,'clinic'],
									['Dr Robyn Box',153.0144548,-27.42567896,'clinic'],
									['Dr Scott Teske',153.0253419,-27.46389909,'clinic'],
									['Dr Terrance  Saxby',153.0246065,-27.46501268,'clinic'],
									['Dr Victor Podesta',153.0509713,-27.42564079,'clinic'],
									['Enoggera Physiotherapy',152.9901909,-27.4241237,'clinic'],
									['Figtrees Medical Centre',153.0509713,-27.42564079,'clinic'],
									['Health Coaching Clinic',153.0546508,-27.41886172,'clinic'],
									['Hearing Life',152.9745795,-27.41267221,'clinic'],
									['Homezone',153.023712,-27.43804456,'clinic'],
									['Image By Laser & Skin Clinic',153.0418506,-27.46427872,'clinic'],
									['Karen Hawkins (Podiatrist)',153.010649,-27.40958643,'clinic'],
									['Kate Evans Group Practice',153.0337545,-27.4574804,'clinic'],
									['Laser Sight',153.0256491,-27.46402627,'clinic'],
									['Merthy 7 Day Medical Centre',153.0470695,-27.46741772,'clinic'],
									['Mitchelton Medical Centre',152.9747556,-27.4117824,'clinic'],
									['Mitchelton Specialist Centre',152.9747212,-27.41190975,'clinic'],
									['Morris Towers Medical Centre',153.0252148,-27.46452438,'clinic'],
									['North Brisbane Wholistic Health Centre',152.9937835,-27.40685965,'clinic'],
									['Physio Works',153.0533643,-27.42043456,'clinic'],
									['Qml- Lutwyche',153.0343263,-27.42026943,'clinic'],
									['Racecourse Road Medical Centre',153.0644375,-27.43624976,'clinic'],
									['Rachael Henry (Podiatrist)',153.0557351,-27.41799377,'clinic'],
									['Silverton Place Medical Centre',153.0263303,-27.46431607,'clinic'],
									['Southern X Ray',153.0533643,-27.42043456,'clinic'],
									['Sports Medical Centre',153.0246065,-27.46501268,'clinic'],
									['Stafford Heights Medical Centre',153.0161223,-27.4065124,'clinic'],
									['Sullivan Nicolaides Pathology',153.0533643,-27.42043456,'clinic'],
									['Alexander,  Dr A G',153.0289,-27.488019,'clinic'],
									['Brown, Dr R (Paediatrician)',153.0289413,-27.48814254,'clinic'],
									['Carmichael & Short (Podiatrists)',153.0289413,-27.48814254,'clinic'],
									['Comino Medical Centre',153.0072344,-27.48224299,'clinic'],
									['Congdon, Dr S J (Dermatologist)',153.0289413,-27.48814254,'clinic'],
									['Cwc Counselling & Wellbeing Centre (Psychologist)',153.0289303,-27.48809354,'clinic'],
									['Dodds, Dr J M (Psychiatrist)',153.0289413,-27.48814254,'clinic'],
									['Dynamic Psych Solutions (Clinical Psychologists)',153.0289413,-27.48814254,'clinic'],
									['Everything For Teeth',153.0115649,-27.48347186,'clinic'],
									['G P Nichols Pty Ltd',153.012272,-27.48139661,'clinic'],
									['Geffen, Dr S (Rehabilitation Specialist)',153.0289413,-27.48814254,'clinic'],
									['Gladstone Road Medical Centre',153.0200364,-27.48510283,'clinic'],
									['Holistic Physio (Physiotherapy & Accupuncture Cent',153.0200083,-27.48417362,'clinic'],
									['Homlab Integrated Wellness Clinic',153.012272,-27.48139661,'clinic'],
									['Mater Hill Family Medical Centre',153.0289413,-27.48814254,'clinic'],
									['Mater Hill Psychology Services',153.0289413,-27.48814254,'clinic'],
									['Moxa Natural Therapies Centre',153.012272,-27.48139661,'clinic'],
									['Performance Podiatry',153.0104787,-27.48074231,'clinic'],
									['Snore X',153.0289413,-27.48814254,'clinic'],
									['Southcity 7 Day Medical Centre (Dr. S.reece)',153.019345,-27.48434247,'clinic'],
									['Sullivan & Nicolaides Pathology/wolloongabba',153.0289413,-27.48814254,'clinic'],
									['Total Physiotherapy & Rehabilitation Services',153.0289303,-27.48809354,'clinic'],
									['Tran, Hoa Trung (Dr )',153.0065974,-27.48299103,'clinic'],
									['Treeoflife International',153.0289,-27.488019,'clinic'],
									['Walker, Dr R M  (Paediatric Surgeon)',153.0289,-27.488019,'clinic'],
									['West End Chiropractic & Wellness Centre',153.0126371,-27.47623037,'clinic'],
									['West End Family Clinic Pty.ltd.',153.0123232,-27.48126095,'clinic'],
									['West End Medical Practice',153.0136789,-27.47926676,'clinic'],
									['West End Osteopathic Clinic',153.0117751,-27.47597455,'clinic'],
									['Roma Street other',153.015393,-27.465815,'other'],
									['Grovely other',152.961737,-27.412226,'other'],
									['Spring Hill other',153.029053,-27.461329,'other'],
									['Balmoral other',153.071689,-27.459639,'other'],
									['Balmoral other',153.068951,-27.464723,'other'],
									['Enoggera other',152.988817,-27.425457,'other'],
									['Camp Hill other',153.078538,-27.488092,'other'],
									['Ashgrove other',152.976007,-27.447885,'other'],
									['Kemp Place other',153.035787,-27.460613,'other'],
									['Roma Street other',153.015393,-27.465815,'other'],
									['Taringa other',152.987107,-27.491368,'other'],
									['other',153.01985,-27.477569,'other'],
									['other',153.02417,-27.469481,'other'],
									['Stafford other',153.01582,-27.414526,'other'],
									['West End other',153.012674,-27.478811,'other'],
									['Camp Hill other',153.074153,-27.49231,'other'],
									['Hendra other',153.074646,-27.416882,'other'],
									['Roma Street other',153.01799,-27.466861,'other'],
									['Fortitude Valley other',153.037579,-27.453441,'other'],
									['City other',153.02577,-27.471565,'other'],
									
									];


								}
								//console.log(datacoordfinal);
								var pointArray = new google.maps.MVCArray(datacoordfinal);
								heatmap2 = new google.maps.visualization.HeatmapLayer({
									data: pointArray
								});
								
								
								///////mostrar hospitales
								var image = {
							  				url: 'hospital.png',
						     				  	size: new google.maps.Size(71, 71),
										    	origin: new google.maps.Point(0, 0),
											    anchor: new google.maps.Point(17, 34),
												scaledSize: new google.maps.Size(25, 25)
											};






			//					var myIcon = new google.maps.MarkerImage("hospital.png", null, null, null, new google.maps.Size(30,30));

								var infowindow = new google.maps.InfoWindow();//borrar
								var marker, i;
								for(var i=0;i<hospitales.length;i++)
									{
										
										var hospital=hospitales[i];
										var myLatlng=new google.maps.LatLng(hospital[2],hospital[1]);
										var marker = new google.maps.Marker({
										      position: myLatlng,
										      map: map2,
										      icon: image,
										      title:hospital[0]
										  });
										markers.push(marker);
										

									}
						
									///////paa mostrar y ocultar los hospitales




								function show(category) {
									for (var i=0; i<hospitales.length; i++) {
										if (hospitales[i][3] == category) {
											markers[i].setVisible(true);
										}
									}
								}

								function hide(category) {
									for (var i=0; i<hospitales.length; i++) {
										console.log(hospitales[i][3]);
										console.log(category);

										if (hospitales[i][3] == category) {
											markers[i].setVisible(false);
										}
									}
								}


								show("hospital");




								$(".checkbox").click(function(){
									var cat = $(this).attr("value");

										                      // If checked
										                      if ($(this).is(":checked"))
										                      {
										                      	show(cat);
										                      }
										                      else
										                      {
										                      	hide(cat);
										                      }
										                  });



////////////// fin de mostrar y ocultar los hospitales
								heatmap2.setMap(map2);
								changeRadius();
								changeOpacity();
							}
							function toggleHospitals(marker) {
								 //marker.setMap(marker.getMap()?null:map2);
								 //console.log(marker);
								 //marker.setMap(null);
								}
							function toggleHeatmap() {
							  heatmap2.setMap(heatmap2.getMap() ? null : map2);
							}
							function changeRadius() {
								heatmap2.set('radius', heatmap2.get('radius') ? null : 20);
							}

							function changeGradient() {
							  var gradient = [
							    'rgba(0, 255, 255, 0)',
							    'rgba(0, 255, 255, 1)',
							    'rgba(0, 191, 255, 1)',
							    'rgba(0, 127, 255, 1)',
							    'rgba(0, 63, 255, 1)',
							    'rgba(0, 0, 255, 1)',
							    'rgba(0, 0, 223, 1)',
							    'rgba(0, 0, 191, 1)',
							    'rgba(0, 0, 159, 1)',
							    'rgba(0, 0, 127, 1)',
							    'rgba(63, 0, 91, 1)',
							    'rgba(127, 0, 63, 1)',
							    'rgba(191, 0, 31, 1)',
							    'rgba(255, 0, 0, 1)'
							  ]
							  heatmap2.set('gradient', heatmap2.get('gradient') ? null : gradient);
							}

							function changeOpacity() {
							  heatmap2.set('opacity', heatmap2.get('opacity') ? null : 0.9);
							}

							

							





							function initialize(city, disease) {
						        // The URL of the spreadsheet to source data from.
						        var city="<?php echo $_GET['city']?>";
								if (disease==null) { disease="flu"};//por default le pongo flu

							}


							function draw(response) {
								if (response.isError()) {
									alert('Error in query');
								}

								

							}
							
								


							google.maps.event.addDomListener(window, 'load', initialize);
							</script>

							</body>
							</html>