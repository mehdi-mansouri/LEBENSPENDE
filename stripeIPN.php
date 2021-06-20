<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>weblog</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script src="APIscript.js"></script>
	<link href="css/style.css" rel="stylesheet">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
require_once "config.php";
include_once 'dbconfig.php';
$data = $_SESSION['country'];
$amount = $_SESSION['amount'];


\Stripe\Stripe::setVerifySslCerts(false);

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$productID = $_GET['id'];



if (!isset($_POST['stripeToken']) || !isset($products[$productID])) {
	header("Location: pricing.php");
	exit();
}

$token = $_POST['stripeToken'];
$email = $_POST["stripeEmail"];

// Charge the user's card:
$charge = \Stripe\Charge::create(array(
	"amount" => $amount * 100,
	"currency" => "EUR",
	"description" => $products[$productID]["title"] . '/' . "$data",
	"source" => $token,
));
?>
<br />
<br />
<br />
<br />
<div class="container">
	<div class="col-lg-4"></div>
	<div class="progress ">

		<div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
	</div>
</div>
<br />
<br />
<br />
<?php
//send an email
//store information to the database
echo '<h1 style="text-align:center; padding-top: 25px;">Zahlung war erfolgreich! Danke für Ihre Spende  €' . ($amount) . '</h1>';
?>
<div class="d-grid gap-2 col-6 mx-auto">
 
<a style="text-align:center; padding-top: 25px;" href="API.php">zurück zu erste Seite</a>
</div>