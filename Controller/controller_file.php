<?php

require_once("./Model/model.php");

class controller_file {

	private $errors;

	public function __construct() {
		$this->errors = [];
	}

	public function upload() {
		require_once("Views/upload.php");
	}

	public function gestion() {
		require_once("Views/gestion.php");
	}

	public function upload_file() {
		if (!empty($_POST)) {
			$name = $_FILES['file']['name'];
			$path = getcwd() ."/Assets/Upload/" . $_SESSION['user_id'];
			if (isset($_FILES['file']) && !empty($name)) {
				$extensionsValides = ['jpg' , 'png', 'jpeg', 'txt', 'pdf', 'doc', 'docx'];
				$extensionsUpload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
				if(in_array($extensionsUpload, $extensionsValides)) {
					if(!file_exists($path)){
						mkdir($path, 0777);
					}
					if(!empty($_POST['file_name']) && preg_match("/^[a-zA-Z ]*$/",$_POST['file_name']) && strlen($_POST['file_name']) < 10) {
						$name = $_POST['file_name'] . "." . $extensionsUpload;
						$move = move_uploaded_file($_FILES['file']['tmp_name'], $path . "/" . $name);
						$this->model = new Model();
						$this->model->ajout($move, $path, $name);
						echo json_encode(array("origin"=>$move,"path"=>$path,"name"=>$name));
					} else {
						$move = move_uploaded_file($_FILES['file']['tmp_name'], $path . "/" . $name);
						$this->model = new Model();
						$this->model->ajout($move, $path, $name);
						echo json_encode(array("origin"=>$move,"path"=>$path,"name"=>$name));
					}
				}
			} 
			else {
				$this->errors['file'] = "Veuillez selectionner un fichier à ajouter";
				http_response_code(400);
				echo json_encode($this->errors);
			}
		}
	}

	public function upload_drop() {
		$name = $_FILES['file']['name'];
		$path = getcwd() ."/Assets/Upload/" . $_SESSION['user_id'];
		if(isset($name[0]))  
		{ 
			if(!file_exists($path)){
				mkdir($path, 0777);
			}
			foreach($name as $keys => $values)  
			{  
				if(move_uploaded_file($_FILES['file']['tmp_name'][$keys], $path . "/" . $values))  
				{  
					$this->model = new Model();
					$this->model->ajout_drop($path, $values);
					echo json_encode($_POST);
				}  
			}  
		}  
	}

	public function recup_upload_json() {
		$this->model = new Model();
		$crud = $this->model->recup_upload();
		echo json_encode($crud);
	}

	public function delete_file() {
		$this->model = new Model();
		$this->model->delete_process($_GET['id']);
	}

	public function edit_file() {
		$this->model = new Model();
		$this->model->edit_process($_POST['id'], $_FILES['file_name']);
	}
}