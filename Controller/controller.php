<?php 

require_once("./Model/model.php");


class controller {

	private $errors;

	public function __construct() {
		$this->errors = [];
	}

	public function accueil() {
		require_once("Views/accueil.php");
	}

	public function inscription() {
		require_once("Views/inscription.php");	
	}

	public function connexion() {
		require_once("Views/connexion.php");
	}

	public function subscribe() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			if(empty($_POST["username"]) || strlen($_POST["username"]) < 4 || !preg_match("/^[a-zA-Z ]*$/",$_POST['username'])){
				$this->errors['username'] = "Veuillez remplir le champ de votre pseudo correctement, votre pseudo doit faire plus de 4 caracteres et ne doit être composer que de lettres.";
			} 
			if(empty($_POST["name"]) || strlen($_POST['name']) < 3 || !preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
				$this->errors['name'] = "Veuillez remplir le champ de votre nom correctement, votre nom doit faire plus de 3 caractères et ne doit être composer que de lettres.";
			}
			if(empty($_POST['password']) || strlen($_POST['password']) < 5){
				$this->errors['password'] = "Veuillez choisir un mot de passe, votre mot de passe doit faire plus de 5 caractères.";
			}
			if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$this->errors['email'] = "Veuillez remplir le champ de votre email correctement, l'email doit être valide.";
			}
			if(empty($_POST['prenom']) || strlen($_POST['prenom']) < 4 || !preg_match("/^[a-zA-Z ]*$/",$_POST['prenom'])) {
				$this->errors['prenom'] = "Veuillez remplir le champ de votre prénom correctement, votre prenom doit faire plus de 4 caractères et ne doit être composer que de lettres.";
			}
			if(empty($_POST['birthdate']) || preg_match("/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])/",$_POST['birthdate'])) {
				$this->errors['birthdate'] = "Veuillez remplir le champ de votre date de naissance correctement, votre date de naissance doit être sous format YYYY/MM/DD.";
			} 
			if(empty($this->errors)) {
				$this->model = new Model();
				$this->model->subscribe($_POST);
				echo json_encode($_POST);
			} else {
				http_response_code(400);
				echo json_encode($this->errors);
			}
		}
	}	

	public function sign() {
		if(!empty($_POST['username'] || !empty($_POST['password']))) {
			$this->model = new Model();
			$this->model->connexion($_POST);
		} else {
			http_response_code(400);
		}
	}

	public function deconnexion() {
		session_unset();
		require_once("Views/accueil.php");
	}
}