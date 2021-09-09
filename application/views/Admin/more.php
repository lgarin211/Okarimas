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
	<div class="card-body">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-10">
				<div class="card">
					<form action="<?=base_url("/Update");?>" method="POST">
						<div class="row">
							<?php foreach ($AttributMaker[0] as $key => $value){
								if ($key == "id") {?>
									<input type="hidden" name="<?=$key?>" value="<?= $value?>">
									<?php
								} elseif ($key == "Class") {
									?>

									<select name="Class" class="form-control">
										<option value="<?= $value ?>">Class <?= $value?></option>
										<?php foreach ($ClassMaker as $key2 => $value2) { ?>
											<option value="<?= $value2->NameClass ?>">Class <?= $value2->NameClass ?></option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<div class="col-md-6">
									<p class="col-md-3"> <strong><?= $key ?></strong> </p>
									<textarea rows="5" class="col-md-9" type="text" name="<?= $key ?>"
											  placeholder="<?= $key ?>"><?= $value ?></textarea>
									</div>
								<?php }} ?>
						</div>
						<button class="btn btn-primary col-md-12" type="submit">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer text-muted">
		<a href="admin">
			Agustinus
		</a>
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
