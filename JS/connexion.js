$("form").on("submit", function(event) {
	event.preventDefault();
	var formData = new FormData($('form')[0]);
	formData.set('controller', 'controller');
	formData.set('action', 'connexion');
	$.ajax({
		url: 'index.php?controller=controller&action=sign',
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false
	})
	.done(function(data) {
		alert("Bravo, vous êtes connecté !");
		document.location = "index.php?controller=controller&action=accueil";
	})
	.fail(function(data){
		console.log(data);
		alert("Veuillez remplir les champs");
	});
});
