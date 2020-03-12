<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Thank You</title>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
