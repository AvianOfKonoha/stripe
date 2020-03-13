<?php
if(!empty($_GET['tid'] && !empty($_GET['product']))){
  $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);
  $product = $GET['product'];
  $tid = $GET['tid'];
}else{
  header('Location: index.php');
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank You</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>


  <div class="container mt-4">
    <h2>Thank you for purchasing <?=$product?></h2>
    <hr>
    <p>Your transaction ID is <?=$tid?></p>
    <p>Check your email for more info</p>
    <p><a href="index.php" class="btn btn-light mt-2">Go back</a></p>
  </div>


</body>
</html>
