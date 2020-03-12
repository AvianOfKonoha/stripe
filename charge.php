<?php
require_once('vendor/autoload.php');

\Stripe\Stripe::setApiKey('sk_test_6ngJnDa201srm0cAomg1OwLG00U7wVrzhL');

// Sanitize POST Array
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

$first_name = $POST['first_name'];
$last_name = $POST['last_name'];
$email = $POST['email'];
$token = $POST['stripeToken'];

//Create Customer In Stripe
$customer = \Stripe\Customer::create([
  'email' => $email,
  'source' => $token
]);

//Charge the Customer
$charge = \Stripe\Charge::create([
  'amount' => 5000,
  'currency' => 'eur',
  'description' => 'Intro to Payment',
  'customer' => $customer->id
]);

//Redirect to Success
header(`Location: success.php?tid={$charge->id}&product=${$charge->description}`);
