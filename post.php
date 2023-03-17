<?php

include  'functions.php';

$id = isset($_GET["id"]) ? $_GET["id"] : NULL;
if (!empty($id)) {
	$data = getSingle('microservices', $id);
} else {
	echo "Page not found 404";
}

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

	<main class="container">
		<div class="row justify-content-center">
			<article class="col-md-6 p-2">
				<div class=" text-center">

					<?= isset($data['Image']) ? '<img src="uploads/images/' . $data['Image'] . '" alt="Lorem" class="img-fluid">' : NULL ?>

				</div>
				<?= isset($data['Titre']) ? '<h1>' . $data['Titre'] . '</h1>' : NULL ?>
				<?= isset($data['Contenu']) ? '<p>' . $data['Contenu'] . '</p>' : NULL ?>
				<?= isset($data['Prix']) ? '<p class="fs-1">Prix: ' . $data['Prix'] . '</p>' : NULL ?>
				<div>
					<a class="btn btn-primary" href="index.php">Retour</a>
				</div>
			</article>
		</div>
	</main>
	<?php
	include_once 'inc/footer.php';
	?>
</body>

</html>