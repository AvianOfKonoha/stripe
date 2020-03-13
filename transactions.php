<?php
require_once('config/db.php');
require_once('lib/pdo_db.php');
require_once('models/Transaction.php');

// Instantiate a customer
$transaction = new Transaction();

// Get Customer
$transactions = $transaction->getTransactions();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Transactions</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    .header{
      display:grid;
      grid-template-columns: repeat(5, 1fr);
      font-weight: 700;
      grid-column-gap: 10px;
    }
    .header div{
      max-width:200px;

    }
    .customer{
      display:grid;
      grid-template: auto / repeat(5, 1fr);
      grid-column-gap: 10px;
    }
    .customer div{
      max-width:200px;
      word-wrap: break-word;
    }
    .customer:nth-child(2n + 1){
      background: #fafafa;
    }
  </style>
</head>
<body>


<div class="container mt-4">

  <div class="btn-group" role="group">
    <a href="customers.php" class="btn btn-secondary mr-2">Customers</a>
    <a href="transactions.php" class="btn btn-primary">Transactions</a>
  </div>

  <h2>Customers</h2>
  <div class="customers-table table table-striped">
    <div class="header">
      <div class="item">Transaction ID</div>
      <div class="item">Customer</div>
      <div class="item">Product</div>
      <div class="item">Amount</div>
      <div class="item">Date</div>
    </div>
    <div class="data-body">
      <?php foreach($transactions as $transaction): ?>
        <div class="customer">
          <div class="id-item"><?=$transaction->id?></div>
          <div class="name-item"> <?=$transaction->customer_id?></div>
          <div class="email-item"><?=$transaction->product?></div>
          <div class="date-item"><?=sprintf('%.2f',$transaction->amount / 100)?> <?=strtoupper($transaction->currency)?></div>
          <div class="date-item"><?=$transaction->created_at?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="btn-wrap">
    <a class="btn btn-primary" href="index.php">Pay Page</a>
  </div>

</div>


</body>
</html>
