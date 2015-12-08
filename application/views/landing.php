<?php


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>eART</title>
	<link rel="stylesheet" type="text/css" href="/assets/css/landing.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript">
		$('document').ready(function() {
			$("#jumbo_tron > div:gt(0)").hide();

				setInterval(function() { 
  			$('#jumbo_tron > div:first')
    			.fadeOut(1200)
    			.next()
    			.fadeIn(1200)
    			.end()
    			.appendTo('#jumbo_tron');
				},  3000);
			});
	</script>
</head>
<body>
	<div id="container">
		<h1 id="title"><span id="little">SHE</span>ART!</h1>
		<div id="jumbo_tron">
			<div>
			<img src="/assets/img/eye.jpg" width="900px" height="500px" alt="eye">
			</div>
			<div>
			<img src="/assets/img/Art.jpeg" width="900px" height="500px" alt="art">
			</div>
			<div>
			<img src="/assets/img/pot.jpg" width="900px" height="500px" alt="pot">
			</div>
		</div>	
		<div id="button">
			<h3 id="button_text">EXPLORE.</h3>
			<form action="mainController/index" method="POST">
				<button type="submit"><img id="lion_btn" src="/assets/img/lion.png" value="EXPLORE."></button>
			</form>
		</div>
	</div>
</body>
</html>