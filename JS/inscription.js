$("form").on("submit", function(event) {
	event.preventDefault();
	var formData = new FormData($('form')[0]);
	formData.set('controller', 'controller');
	formData.set('action', 'inscription');
	$.ajax({
		url: 'index.php?controller=controller&action=subscribe',
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		dataType: 'json'
	})
	.done(function(data) {
		alert("Felicitations, vous êtes inscrit !");
		document.location = "index.php?controller=controller&action=accueil";
		})
	.fail(function(data, a, b) {
		$('.error').append($("<div class='alert alert-warning'>"));
		 $.each(data.responseJSON, function (name , value){
		 	$('.alert').append("<li>"+value+"</li>");
		 });
	});
});
