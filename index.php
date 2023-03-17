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
                    <a class="btn btn-primary" href="dashboard.php"><i class="bi bi-pencil-square"></i> Admin</a>
                </div>
            </div>
            <div class="row">
                <?php
                displayPosts('microservices');
                // REVIEW Préparer une requête pour récupérer les auteurs des microservices
                ?>

            </div>
        </div>
    </main>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>

</html>