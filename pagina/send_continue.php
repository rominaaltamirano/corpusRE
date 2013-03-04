
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="Aqua">
<head><title>Referring expressions</title>
<link id="fav" href="/favicon1.ico" rel="shortcut icon"></link>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=yes" />
<meta http-equiv="Content-Language" content="sp" />

<link rel="stylesheet" type="text/css" href="css/default_themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/s_iphone.css" media="only screen and (max-device-width: 480px)" />

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/SurveyV12.js"></script>

<script type="text/javascript">
	var actual;
	var numero_actual;
	var arr;
	var numero_mostrado;

	function first() {
		setup();
		numero_mostrado = 0;
		actual = 0;
		arr = [1,2,3,4,5];
		var n = arr.length;
		var temp_arr = [];
		for ( var i = 0; i < n-1; i++ ) {
			// The following line removes one random element from arr and pushes it onto temparr
			temp_arr.push(arr.splice(Math.floor(Math.random()*arr.length),1)[0]);
		}
		temp_arr.push(arr[0]);
		arr = temp_arr;
		console.log(arr);
		numero_actual = arr[actual];//lo que tiene el array en posicion 0
		numero_mostrar=numero_actual;
		document.getElementById("divImagen" + numero_mostrar).style.display = "inline";
		document.getElementById("text_f" + numero_mostrar).focus();
	}

	function save_data(str) {
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200) // All ok
			{
				console.log("Guardado");
			}
		}

		xmlhttp.open("GET","save_data.php?"+str,true);
		xmlhttp.send();
	}

	function next(ret, element, id_persona) {
	
		if(document.getElementById("text_f" + numero_mostrar).value!='' && ret)
		{
			numero_mostrado = numero_mostrado + 1; //count showed object 
			console.log(id_persona+" - "+numero_mostrar);
			save_data("numero_mostrado=" + numero_mostrado + "&id_persona=" + id_persona + "&id_mapa=" + numero_mostrar + "&expresion_referencial=" + document.getElementById("text_f" + numero_mostrar).value);

			if (numero_mostrado == 20) {
				document.getElementById("divImagen" + (numero_mostrar)).style.display = "none";
				document.getElementById("panButtonBar").style.display = "none";
				document.getElementById("gracias").style.display = "inline";
			
			}
			else {
				base = 0;
				if (numero_mostrado>=5 && numero_mostrado<10) base = 1;
				if (numero_mostrado>=10 && numero_mostrado<15) base = 2;				
				if (numero_mostrado>=15) base = 3;

				document.getElementById("divImagen" + numero_mostrar).style.display = "none";
				actual = (actual + 1)%5;
				numero_actual = arr[actual];
				numero_mostrar = (base*5) + numero_actual;
				document.getElementById("divImagen" + numero_mostrar).style.display = "inline";
				document.getElementById("text_f" + numero_mostrar).focus();
			}
		}
		return false;
	}
</script>

</head>

<?php
	$acepto = $_POST['input_accept'];

	if ($acepto==1) {
		//echo "Puedo continuar";
	}
	else
	{	#se lo podria mandar a Gracias igual...
		exit;
	}	

	$db = pg_connect("host=localhost dbname='corpus' user='postgres' password='*postgres-'") or die(pg_last_error());

	$edad = $_POST['text_edad'];
	$sexo = $_POST['input_sex'];
	$nacionalidad = $_POST['input_nation'];
	$idioma = $_POST['input_idioma'];
	$que_estudia = $_POST['text_estudia'];
	$identificacion = $_POST['text_identificacion'];
	$sql = "insert into personas  (edad,sexo,idioma,nacionalidad,que_estudia,identificacion, fecha_hora_inicio) values ($edad,$sexo,'$idioma','$nacionalidad','$que_estudia','$identificacion',CURRENT_TIMESTAMP(2)) returning id_persona";
	$resultado = pg_exec($db, $sql);
	$res = pg_fetch_assoc($resultado);
	$id_persona = $res['id_persona'];
?>

<body id="BodyTag" class="notranslate" onload="first();">

	<form name="frmS" method="post" action="" id="frmS">

	<!--content area-->
	<div id="id_mapa" value="" style="display:none"></div>
	<div id="str_descripcion" value="" style="display:none"></div>

	<div id="PageContentDiv">
		<h1 class="sTitle sTitleCf">
			<div style="text-align:left;">
				<span class="notranslate">Referring expressions</span>
			</div>
		</h1>
		<div class="pTitle">
			<h2></h2>&nbsp;
			<br class="clear" />
		</div>

		<div class="pgHdr">

			<div id="divImagen1" style="display:none">
				<div id="figure_1" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow (01)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/01-Ed1pequeno-singular.jpg" alt="F1" />
						</div>
					</div>
				</div>
				<div id="text_1" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 1">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f1" name="text_f1" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f1">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen2" style="display:none">
				<div id="figure_2" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(02)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/02-Ed2pequeno-singular.jpg" alt="F2" />
						</div>
					</div>
				</div>
				<div id="text_2" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 2">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f2" name="text_f2" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f2">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen3" style="display:none">
				<div id="figure_3" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(03)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/03-Ed3pequeno-singular.jpg" alt="F3" />
						</div>
					</div>
				</div>
				<div id="text_3" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 3">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f3" name="text_f3" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f3">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen4" style="display:none">
				<div id="figure_4" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(04)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/04-Ed4pequeno-singular.jpg" alt="F4" />
						</div>
					</div>
				</div>
				<div id="text_4" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 4">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f4" name="text_f4" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f4">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen5" style="display:none">
				<div id="figure_5" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(05)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/05-Ed5pequeno-singular.jpg" alt="F5" />
						</div>
					</div>
				</div>
				<div id="text_5" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 5">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f5" name="text_f5" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f5">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

<!-- 5 mas -->
			<div id="divImagen6" style="display:none">
				<div id="figure_6" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(06)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/06-Ed1pequeno-plural.jpg" alt="F6" />
						</div>
					</div>
				</div>
				<div id="text_1" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 6">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f6" name="text_f6" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f6">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen7" style="display:none">
				<div id="figure_7" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(07)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/07-Ed2pequeno-plural.jpg" alt="F7" />
						</div>
					</div>
				</div>
				<div id="text_2" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 7">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f7" name="text_f7" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f7">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen8" style="display:none">
				<div id="figure_8" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(08)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/08-Ed3pequeno-plural.jpg" alt="F8" />
						</div>
					</div>
				</div>
				<div id="text_8" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 8">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f8" name="text_f8" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f8">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen9" style="display:none">
				<div id="figure_9" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(09)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/09-Ed4pequeno-plural.jpg" alt="F9" />
						</div>
					</div>
				</div>
				<div id="text_9" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 9">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f9" name="text_f9" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f9">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

			<div id="divImagen10" style="display:none">
				<div id="figure_10" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(10)
						</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/10-Ed5pequeno-plural.jpg" alt="F10" />
						</div>
					</div>
				</div>
				<div id="text_10" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 10">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f10" name="text_f10" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f10">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>

<!-- fin 5 mas -->
			<div id="divImagen11" style="display:none">
				<div id="figure_11" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(11)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/11-Ed1grande-singular-.jpg" alt="F11"  />
						</div>
					</div>
				</div>
				<div id="text_11" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 11">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f11" name="text_f11" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f11">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen12" style="display:none">
				<div id="figure_12" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(12)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/12-Ed2grande-singular-.jpg" alt="F12"  />
						</div>
					</div>
				</div>
				<div id="text_12" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 12">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f12" name="text_f12" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f12">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen13" style="display:none">
				<div id="figure_13" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(13)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/13-Ed3grande-singular-.jpg" alt="F13" />
						</div>
					</div>
				</div>
				<div id="text_13" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 13">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f13" name="text_f13" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f13">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen14" style="display:none">
				<div id="figure_14" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(14)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/14-Ed4grande-singular-.jpg" alt="F14" />
						</div>
					</div>
				</div>
				<div id="text_14" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 14">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f14" name="text_f14" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f14">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen15" style="display:none">
				<div id="figure_15" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(15)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/15-Ed5grande-singular-.jpg" alt="F15"  />
						</div>
					</div>
				</div>
				<div id="text_15" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 15">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f15" name="text_f15" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f15">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen16" style="display:none">
				<div id="figure_16" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(16)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/16-Ed1grande-plural-.jpg" alt="F16"  />
						</div>
					</div>
				</div>
				<div id="text_16" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 16">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f16" name="text_f16" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f16">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen17" style="display:none">
				<div id="figure_17" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(17)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/17-Ed1grande-plural-.jpg" alt="F17"  />
						</div>
					</div>
				</div>
				<div id="text_17" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 17">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f17" name="text_f17" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f17">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen18" style="display:none">
				<div id="figure_18" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(18)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/18-Ed3grande-plural-.jpg" alt="F18"  />
						</div>
					</div>
				</div>
				<div id="text_18" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 18">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f18" name="text_f18" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f18">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen19" style="display:none">
				<div id="figure_19" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(19)</div>
						<div class="qBody">
							<img src="maps/jpg-Edimburgo/19-Ed4grande-plural-.jpg" alt="F19"  />
						</div>
					</div>
				</div>
				<div id="text_19" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 19">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f19" name="text_f19" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f19">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div id="divImagen20" style="display:none">
				<div id="figure_20" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent">
						<div class="qHeader">Give a phrase that identify the object pointed to by the arrow(20)</div>
						<<img src="maps/jpg-Edimburgo/20-Ed5grande-plural-.jpg" alt="F20"  />
						<div class="qBody">
						</div>
					</div>
				</div>
				<div id="text_20" class="question" style="margin:0 0 0 0;width:auto">
					<div class="qContent"><div class="qHeader">
						<abbr class="noborder" title="Pregunta 20">
						</abbr> Answer
					</div>
					<div class="qBody">
						<span>
							<input id="text_f20" name="text_f20" class="open" type="text" size="50" value="" />
						</span>
						<div class="hlbl">
							<label for="text_f20">RE</label>
						</div>
					</div>
				</div>
			</div>
			</div>



<!-- de la 10 a la 20-->
			<div id="gracias" class="question" style="display:none">
				<div class="qContent">
					<div class="qHeader">Thank you for your participation!
					</div>
					<div class="qBody">
						<img src=".jpg" alt="" />
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<!--end content area-->
		<div id="panButtonBar">
			<div style="text-align:center;">
				<input type="submit" name="NextButton" value="Next" onclick="var ret = validar_datos(); return next(ret, this, '<?php echo $id_persona;?>');" id="NextButton" class="btn btntext grey" />
			</div>
		</div>
	</div>
</form>









	<noscript><style type="text/css" media="all">form {display:none} #jserror {text-align:center;margin-top:50px;}</style><div id="jserror" class="qHeader">Javascript is required for this site to function, please enable.</div></noscript>


	<script type="text/javascript">
	/* <![CDATA[ */
	function nes(e){e=(e)?e:event;var c=(e.which)?e.which:e.keyCode;return(c!=13);}var is=document.getElementsByTagName("input");for(var i=0;i<is.length;i++){var _i=is[i];if(_i.type=="text")_i.onkeypress=function(e){ return nes(e); };}
	/* ]]> */
	</script>


	<!-- 12 LOCALHOST -->
</body>
</html>

<script type="text/javascript">

	function validar_datos()
	{
		mensaje = '';
		mensaje_incorrectos = '';
		mensaje_completo='';
		//alert("entra"+(document.getElementById('divImagen'+1)).getAttribute("style").contains("inline"));
		for (var i=1;i<21;i++)
		{ 
			console.log(i+" - "+(document.getElementById('divImagen'+i)).getAttribute("style").contains("inline"));
			if ((document.getElementById('divImagen'+i)).getAttribute("style").contains("inline") && document.getElementById('text_f'+i).value=='') 
			{
				mensaje+="\t-Answer";
			}
		}
		/* Agregando excepciones... mensajes incorrecciones - ejemplo */
		if ((document.getElementById('divImagen1')).getAttribute("style").contains("inline") && (document.getElementById('text_f'+1).value).contains("yellow")) 
		{
			
			mensaje_incorrectos+="\t-Your answer should not conteins yellow\n";
		}

		if (mensaje!='')
		{
			alert("The following are required:\n"+mensaje);
			return false;
		}
		if (mensaje_incorrectos!='')
		{
			if(confirm("The referring expression looks not correct, are you sure that want to send that expression?\n"+mensaje_incorrectos))
				return true;
			else
				return false;
		}
		else 
		{
			return true;
		}
	}
</script>


