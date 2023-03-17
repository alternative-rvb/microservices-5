<?php
include 'functions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Microservices</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="shortcut icon" href="https://api.dicebear.com/5.x/identicon/svg?seed=CRUD" type="image/x-icon">
</head>

<body>
  <main>
    <div class="container">
      <div class="row">
        <div>
          <h1>Microservices</h1>
          <a class="btn btn-primary" href="index.php"><i class="bi bi-house"></i> Accueil</a>
        </div>
      </div>
      <div class="row">
        <?php
        displayTable('microservices');
        ?>
        <div class="row">
          <div>
            <a class="btn btn-primary" href="ajouter-un-microservice.php"><i class="bi bi-plus-square"></i> Ajouter</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>