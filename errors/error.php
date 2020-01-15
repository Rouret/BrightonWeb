<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>PAGES D'ERREURS</title>
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="clouds">
		<div class="cloud x1"></div>
		<div class="cloud x1_5"></div>
		<div class="cloud x2"></div>
		<div class="cloud x3"></div>
		<div class="cloud x4"></div>
		<div class="cloud x5"></div>
	</div>
	<div class='c'>

		<?php
			if(isset($_GET["error"]) && strlen($_GET["error"])==3){
				$erreur=$_GET["error"];
				$array = array(
					'Bad Request' => '400',
					'Forbidden' => "403",
					'Page not found' => "404",
					'Internal Server Error' => "500",
					'Service Unavailable' => "503",
					'Gateway Timeout' => "504",	
				);
				$content=array_search($erreur, $array);
				if(!$content){
					echo "<div class='error'>X<span></span>X</div>";
				}else{
					echo "<div class='error'>".$erreur[0]."<span></span>".$erreur[2]."</div>";
					echo "<hr><div class='_1'>".array_search($erreur, $array)."</div>";
				}
			}else{
				echo "<div class='error'>X<span></span>X</div>";
			}
		?>
		<a class='btn' href='../home/home.php?screen=home'>Back to home</a>
	</div>
</body>
</html>

