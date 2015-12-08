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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>eART Store</title>
	<!-- <link rel="stylesheet" type="text/css" href="/assets/css/styles.css"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/checkMyStyle.css">
</head>
<body>
<div class="col-md-1"></div>
	<div id="container" class="col-md-10">
<?php
	$this->load->view("partials/toolbar.php");
?>
		<div class="col-md-6">
			<h3>Purchases</h3>
			<table class="col-md-12 table table-striped">
				<tr>
					<th>Item #</th>
					<th>Name</th>
					<th>Price</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Art</td>
					<td>$10</td>
				</tr>
				<tr>
					<td>2</td>
					<td>More Art</td>
					<td>$5</td>
				</tr>
				<tr>
					<td>3</td>
					<td>Artsy Fartsy</td>
					<td>$15</td>
				</tr>
				<tr>
					<th colspan="2">Total</th>
					<th>$30</th>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
			<h3>Billing Info</h3>
				<form action="cart/stripe_pay" method="POST">
					<div>
						<label for="firstName">First Name</label>
						<input type="text" id="firstName" class="col-md-12" name="first_name" placeholder="First Name"></input>
					</div>
					<div>
						<label for="lastName">Last Name</label>
						<input type="text" id="lastName" class="col-md-12" name="last_name" placeholder="Last Name"></input>
					</div>
					<div>
						<label for="email">Email</label>
						<input type="email" id="email" class="col-md-12" name="email" placeholder="Email"></input>
					</div>
					<div>
						<label for="address">Address</label>
						<input type="text" id="address" class="col-md-12" name="address" placeholder="Address"></input>
					</div>
					<div>
						<label for="addressTwo">Address 2</label>
						<input type="text" id="addressTwo" class="col-md-12" name="address2" placeholder="Address 2"></input>
					</div>
					<div>
						<label for="city">City</label>
						<input type="text" id="city" class="col-md-12" name="city" placeholder="City"></input>
					</div>
					<div>
						<label for="state">State</label>
						<input type="text" id="state" class="col-md-12" name="state" placeholder="State"></input>
					</div>
					<div>
						<label for="zip">Zip</label>
						<input type="text" id="zip" class="col-md-12" name="zip" placeholder="Zip"></input>
					<button type="submit" class="pull-right buy">Buy</button>
				</form>
		</div>
<?php
					if($this->session->flashdata("billingErrors")){
						$errors["billingErrors"] = $this->session->flashdata("billingErrors");
						foreach($errors["billingErrors"] as $error){
?>		
					<div class="red"><?= $error ?></div>
<?php
						}
					}
?>										
	<!-- End of Container div -->
	</div>
<div class="col-md-1"></div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>