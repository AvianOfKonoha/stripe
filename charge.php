<?php
require_once('vendor/autoload.php');
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Customer.php');
require_once('models/Transaction.php');


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
  'customer' => $customer->id,
]);

//Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

//Instantiate Customer
$customer = new Customer();

// Add Customer to DB
$customer->addCustomer($customerData);



//Transactions Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status
];

//Instantiate Transaction
$transaction = new Transaction();

// Add Transaction to DB
$transaction->addTransaction($transactionData);


//Redirect to Success
header('Location: success.php?tid="'.$charge->id.'"&product="'.$charge->description.'"');

