<?php
  require_once('config/db.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');

  // Instantiate a customer
  $customer = new Customer();

  // Get Customer
  $customers = $customer->getCustomers();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>View Customers</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    .header{
      display:grid;
      grid-template-columns: repeat(4, 1fr);
      font-weight: 700;
    }
    .customer{
      display:grid;
      grid-template: auto / repeat(4, 1fr);
    }
  </style>
</head>
<body>


<div class="container mt-4">

  <div class="btn-group" role="group">
    <a href="customers.php" class="btn btn-primary mr-2">Customers</a>
    <a href="transactions.php" class="btn btn-secondary">Transactions</a>
  </div>

 <h2>Customers</h2>
  <div class="customers-table table table-striped">
    <div class="header">
      <div class="item">Customer ID</div>
      <div class="item">Name</div>
      <div class="item">Email</div>
      <div class="item">Date</div>
    </div>
    <div class="data-body">
      <?php foreach($customers as $customer): ?>
      <div class="customer">
        <div class="id-item"><?=$customer->id?></div>
        <div class="name-item"> <?=$customer->first_name?> <?=$customer->last_name?></div>
        <div class="email-item"><?=$customer->email?></div>
        <div class="date-item"><?=$customer->created_at?></div>
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
