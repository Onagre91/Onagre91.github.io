$("form").on("submit", function(event) {
	event.preventDefault();
	var formData = new FormData($('form')[0]);
	formData.set('controller', 'controller_file');
	formData.set('action', 'upload');
	$.ajax({
		url: 'index.php?controller=controller_file&action=upload_file',
		method: 'POST',
		data: formData,
		processData: false,
		contentType: false,
		dataType : "json"
	})
	.done(function(data) {
		console.log(data);
		alert("Bravo, votre fichier vient d'être update !");
		$('tbody').append('<tr><td>'+data.name+'</td><td>'+"created at"+'</td><td>'+"<button class='btn-primary'>Edit</button>"+"  "+"<button class='btn-danger'>Delete</button>"+'</td></tr>');
	})
	.fail(function(data, a , b ) {
		$('.error').append($("<div class='alert alert-warning'>"));
		$.each(data.responseJSON, function (name , value){
			$('.alert').append("<li>"+value+"</li>");
		});
	});
});


//DROPZONE WITH STYLE 

var dropper = document.querySelector('.dropzone');
var dropzone = $('.dropzone');

dropper.addEventListener('dragover', function(e) {
	e.preventDefault();
	dropzone.css('background-color', '#776787');
});

dropper.addEventListener('dragleave', function() {
	dropzone.css('background-color', '#ccc');
});

// END STYLE DROPZONE

dropper.addEventListener('drop', function(e) {
	e.preventDefault(); 
	dropzone.css("background-color" , '#68CF4D');
	var formData = new FormData();
	var files_list = e.dataTransfer.files;

	for(var i = 0; i < files_list.length; i++) {
		formData.append('file[]', files_list[i]);
	}

	$.ajax({
		url: 'index.php?controller=controller_file&action=upload_drop',
		method: 'POST',
		data: formData,
		contentType: false,
		cache:false,
		processData: false
	})
	.done(function(data) {
		var filenames = "";
		for (var i = 0 ; i < files_list.length ; i++) {
			filenames += '\n' + files_list[i].name;
			$('tbody').append('<tr><td>'+filenames+'</td><td>'+"created at"+'</td><td>'+"<button class='btn-primary btn-block'>Edit</button>"+"  "+"<button class='btn-danger btn-block'>Delete</button>"+'</td></tr>');
		}
		alert(' Ajout de ' +files_list.length+' fichier(s) :\n' + filenames);
	});
});


$.get(
	'index.php',	
	{
		controller: "controller_file",
		action: "recup_upload_json",
	},
	function(data) {
		crud_former(data);
	});	


function crud_former(data) {
	data = JSON.parse(data);
	for(var i = 0; i < data.length; i++) { 
		$('tbody').append('<tr><td>'+"<a href=" + data[i].chemin + ">"+data[i].name+"</a>" + '</td><td>' + data[i].created_at + '</td><td>' +"<button class='btn-primary btn-block edit'>Edit</button>"+"  "+"<button class='btn-danger btn-block delete' hint='"+[i]+"'>Delete</button>"+'</td></tr>');
	}

	$(".delete").click(function(event){
		var target = event.target.getAttribute("hint");
		$.ajax({
			url: 'index.php?controller=controller_file&action=delete_file',
			method: 'GET',
			data: { id: data[target][1]},
		})
		.done(function(){
			alert("Votre fichier "+ data[target][3] +" a bien été supprimé.");
		})
		.fail(function(data){
			console.log('erreur');
		});

	});

	$('.edit').click(function(event){
		$('.create').append("<form method='post' class='breadcrumb'><div class='form-group'><label>Nouveau nom du fichier</label><input type='text' name='file_name' class='form-control' placeholder=' Nouveau nom du fichier'><p>Votre nom de fichier fera moins de 10 caractères, n'aura pas d'espace et ne sera composé que de lettres.</p></div><button type='submit' name='Edit' class='change btn btn-default'>Change</button></form>");

		$("form").on("submit", function(event) {
			var formData = new FormData($('form')[0]);
			formData.set('controller', 'controller_file');
			formData.set('action', 'upload');
			console.log(FormData);
			$.ajax({
				url: 'index.php?controller=controller_file&action=edit_file',
				method: 'POST ',
				data: { id: data[0][1]},
			})
			.done(function(data){
				console.log("salut");
			})
			.fail(function(data){
				console.log(formData);
				console.log("Erreur");
			});
		});
	});

}
