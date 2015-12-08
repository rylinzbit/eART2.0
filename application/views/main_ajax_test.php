<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>eART Main View Page</title>
	<link rel="stylesheet" href="assets/css/main_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$.get('/mainController/artwork_html', function(res) {
				$('#artCase').html(res);
			}); //ends .get('quotes/...

			$(document).on("click", ".artImg", function() {
			    var img_data = $(this).attr('id');
				window.location.href='artworkController/artwork_show_info/' + img_data;
			 });

			return false;
		})	
	</script>
</head>
<body>
<?php
	$this->load->view("partials/toolbar.php");
?>
	<div id="artCase">
	</div>
</body>
</html>