<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Drive-Wac</title>
	<link rel="stylesheet" href="CSS/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo WEBROOT . 'index.php?controller=controller&action=accueil'?>">Acceuil</a>
			</div>
			<a class="navbar-brand mx-auto" href="#">Connexion</a>
		</div>
	</nav> 

	<div class="container">
	<h1 class="text-center">Formulaire de connexion</h1>
		<form method="post" class="breadcrumb">
			<div class="form-group">
				<label class="col-md-4">Username</label>
				<input class="form-control" placeholder="Nom d'utilisateur" type="text" name="username">
			</div>
			<div class="form-group">
				<label class="col-md-4">Password</label>
				<input  class="form-control" placeholder="Mot de passe" type="password" name="password">
			</div>
				<button type="submit" class="btn btn-default">Submit</button>
		</form>

	</div>

	<script src="JS/jquery.js"></script>
	<script src="JS/connexion.js"></script>
</body>
</html>