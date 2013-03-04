<?php

if ($_POST['input_idioma']=='spanish')
{
	echo '<html>
	
		<body>
		<script type="text/javascript">
		window.location="spanish_page.php";
		</script>
		</body>
	</html>';
}
else{
	if ($_POST['input_idioma']=='english')
	{
		echo '<html>
	
			<body>
			<script type="text/javascript">
			window.location="english_page.php";
			</script>
			</body>
		</html>';
	}
	else{
		if ($_POST['input_idioma']=='portugues')
		{
			echo '<html>
	
				<body>
				<script type="text/javascript">
				window.location="portugues_page.php";
				</script>
				</body>
			</html>';
		}
	}

}
?>
