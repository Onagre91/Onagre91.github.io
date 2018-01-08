<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Drive-Wac</title>
	<link rel="stylesheet" href="CSS/bootstrap.css">
	<link rel="stylesheet" href="CSS/app.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo WEBROOT . 'index.php?controller=controller&action=accueil'?>">Acceuil</a>
			</div>
			<a class="navbar-brand mx-auto" href="#">Upload de fichiers</a>
		</div>
	</nav> 
	<div class="container error">
		<h1 class="text-center">Formulaire d'ajout de fichiers</h1>
	</div>

	<div class="container">
		<form method="post" class="breadcrumb"  enctype="multipart/form-data">
			<div class="form-group">
				<div class="dropzone">
					<label>Ajout de fichiers</label>
					<input type="file" name="file" class="form-control-file files_upload" id="file" multiple>
				</div>
			</div>
			<div class="form-group">
				<label>Nom du fichier</label>
				<input type="text" name="file_name" class="form-control" placeholder="Nom du fichier">
				<p>Votre nom de fichier fera moins de 10 caractères, n'aura pas d'espace et ne sera composé que de lettres.</p>
			</div>
			<button type="submit" name="Submit" class="btn btn-default">Submit</button>
		</form>
		<div class="row create">

		</div>
		<div class="row">
			<table class="table table-bordered">

				<thead>
					<tr>
						<th id="create-item">Nom du fichier</th>
						<th>Action</th>
						<th>Ajouté le</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>

	<script src="JS/jquery.js"></script>
	<script src="JS/upload.js"></script>
</body>
</html>