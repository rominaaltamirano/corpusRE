<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="Aqua">
<head><title>Referring expressions</title>
<link id="fav" href="/favicon1.ico" rel="shortcut icon"></link>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=yes" />
<meta http-equiv="Content-Language" content="pt" />

<link rel="stylesheet" type="text/css" href="css/default_themes.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/s_iphone.css" media="only screen and (max-device-width: 480px)" />

<script type="text/javascript" src="js/SurveyV12.js"></script>

</head>

<body id="BodyTag" class="notranslate" onload="document.getElementById('input_idioma').focus(); setup();">

<form name="frmIdioma" method="post" action="select_language.php" id="frmS">
	<!--content area-->
	<div id="PageContentDiv">
		<h1 class="sTitle sTitleCf">
			<div style="text-align:left;">
				<span class="notranslate">Referring expressions</span>
			</div>
		</h1>

		<!--<div class="pTitle">
			<h2>Datos de la persona - Instrucciones</h2>&nbsp;
			<br class="clear" />
		</div>-->
		
		<!--<div class="pDesc">Tarea: dar frases que identifiquen a el/los objeto/s apuntado/s.
			<br />Ingreses sus datos y acepte las condiciones para continuar.
		</div>-->

		<div class="pgHdr">
			<div id="q1" class="question" style="margin:0 0 0 0;width:auto">
				<div class="qContent">
					
					<div class="qContent">
						<div class="qHeader">
							<div class="RequiredMarker" style="display:inline-block">
								<abbr class="noborder" title="Obrigatório" style="padding: 2px 0 0 0;">*</abbr>
							</div>
							<abbr class="noborder" title="Pregunta 0"></abbr> Select the language
						</div>

						<div class="qBody">
							<div>
								<select name="input_idioma" id="input_idioma">
									<option value=""></option>
									<option value="spanish">Spanish</option>
									<option value="portugues">Portugues</option>
									<option value="english">English</option>
								</select>
							</div>
							<div class="hlbl">
								<label for="input_idioma">Select the language</label>
							</div>
						</div>
					</div>
			</div>
	<div id="panButtonBar">
		<div style="text-align:center;">
			<input type="submit" name="NextButton" value="Next" onclick="return validar();onesubmit(this);" id="NextButton" class="btn btntext grey" />
		</div>
	</div>

	<div class="pbf">Copyright (c) IRA</div>

	<div class="spacer" style="height:100px;">&nbsp;</div>
	<div></div>

	</div>
</form>

<script type="text/javascript">

	function validar(){
		if (document.getElementById('input_idioma').value == ''){ 
			alert("You should select the language\n");
		 	return false;
		} else {
			return true;
		}
	}
</script>

