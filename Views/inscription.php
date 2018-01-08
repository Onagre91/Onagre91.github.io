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
				<a class="navbar-brand" href="<?php echo WEBROOT . 'index.php?controller=controller&action=accueil' ?>">Acceuil</a>
			</div>
			<a class="navbar-brand mx-auto" href="#">Inscription</a>
		</div>
	</nav> 
	<div class="container error">
	</div>

	<div class="container">
		<h1 class="text-center">Formulaire d'inscription</h1>
		<form method="post" class="breadcrumb">
			<div class="form-group">
				<label class="col-md-4">Username</label>
				<input class="form-control" placeholder="Nom d'utilisateur" type="text" name="username">
			</div>
			<div class="form-group">
				<label class="col-md-4">Password</label>
				<input  class="form-control" placeholder="Mot de passe" type="password" name="password">
			</div>
			<div class="form-group">
				<label class="col-md-4">Nom</label>
				<input  class="form-control"  placeholder="Nom" type="text" name="name">
			</div>
			<div class="form-group">
				<label class="col-md-4">Prénom</label>
				<input  class="form-control" placeholder="Prénom" type="text" name="prenom">
			</div>
			<div class="form-group">
				<label class="col-md-4">Date de naissance</label>
				<input  class="form-control" placeholder="YYYY/MM/DD" type="date" name="birthdate">
			</div>
			<div class="form-group">
				<label class="col-md-4">Email</label>
				<input  class="form-control" placeholder="email@exemple.com" type="email" name="email">
			</div>
			<button type="submit" name="Submit" class="btn btn-default">Submit</button>
		</form>
	</div>

	<script src="JS/jquery.js"></script>
	<script src="JS/inscription.js"></script>
</body>
</html>