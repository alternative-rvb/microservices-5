<?php
include 'functions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <?php
  include_once 'inc/head.php';
  ?>
</head>

<body>
  <?php
  include_once 'inc/header.php';
  ?>
  <main>
    <div class="container">
      <div class="row">
        <div>
          <h1>Microservices</h1>
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
  <?php
  include_once 'inc/footer.php';
  ?>
</body>

</html>