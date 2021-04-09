<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>
<body>

<div class="card text-center">
	<div class="card-header">
		<h1>Admin</h1>
		<a href="Admin/Creat" class="btn btn-success">Baru</a>
	</div>
	<div class="card-body">
		<div class="row table-responsive">
			<div class="col-md-1"></div>
			<table class="table table-hover	col-md-11">
				<thead>
				<tr>
					<?php foreach ($AttributMaker[0] as $key => $item) {
						if ($key == "Spesial_Style" || $key == "other_2" || $key == "other_3") {
						} else {
							?>
							<th scope="col"><?php echo $key ?></th>
						<?php }
					} ?>
					<th scope="col">Action</th>
				</tr>
				</thead>
				<tbody>

				<?php foreach ($AttributMaker as $key => $cal) { ?>
					<tr>
						<form action="<?= base_url("/Update") ?>" method="POST">
							<?php foreach ($cal as $key2 => $item) { ?>
								<?php if ($key2 == "Spesial_Style" || $key2 == "other_2" || $key2 == "other_3") {

								} else {
									?>

									<td scope="col">
										<?php echo $item ?>
									</td>
								<? } ?>
							<?php } ?>
							<td scope="col">
								<div class="btn-group" role="group" aria-label="Basic mixed styles example">
									<a href="<?=base_url()?>del?id=<?= $cal->id ?>" type="button" class="btn btn-danger">Delete</a>
									<a href="<?=base_url()?>more?id=<?= $cal->id ?>" type="button" class="btn btn-warning">Ubah</a>
								</div>
							</td>
						</form>
					</tr>
				<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
	<div class="card-footer text-muted">
		Agustinus
	</div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
		crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>
