<?php
	require_once "config.php";

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
		"amount" => $products[$productID]["price"],
		"currency" => "EUR",
		"description" => $products[$productID]["title"],
		"source" => $token,
	));

	//send an email
	//store information to the database
	echo '<h1 style="text-align:center; padding-top: 25px;">Zahlung war erfolgreich! Danke für Ihre Spende  €' . ($products[$productID]["price"]/100).'</h1>';
    echo '<a style="text-align:center; padding-top: 25px;" href="API.php">zurück zu erste Seite</a>';
