<?php

require_once("database.php");

class model extends connect {
	
	public function subscribe() {
		$salt =  "le rattrapage c'est la fête";
		$hashMDP = hash_hmac("ripemd160", $_POST['password'], $salt);
		$register = $this->dbh->prepare("INSERT INTO accounts(username, email, password, name, surname, birthdate) VALUES(?, ?, ?, ?, ?, ?)");
		$register->execute([
			$_POST["username"],
			$_POST["email"],
			$hashMDP,
			$_POST["name"],
			$_POST["prenom"],
			$_POST["birthdate"]
			]);
	}

	public function connexion() {
		$salt =  "le rattrapage c'est la fête";
		$hashMDP = hash_hmac("ripemd160", $_POST['password'], $salt);
		$verification = $this->dbh->prepare("SELECT * FROM accounts WHERE username = ?");
		$verification -> execute([
			$_POST['username']
			]);
		$result = $verification->fetch();
		if ($hashMDP != $result['password']) {
			echo json_encode("Mauvais email ou mot de passe");
		} else {
			$_SESSION['username'] = $result['username'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['name'] = $result['name'];
			$_SESSION['surname'] = $result['surname'];
			$_SESSION['birthdate'] = $result['birthdate'];
			$_SESSION['user_id'] = $result['id_membre'];
		}
	}

	public function ajout($move, $path, $name) {
		$ajout = $this->dbh->prepare("INSERT INTO upload(user_id, file, chemin, name) VALUES(?,? ,? ,?)");
		$ajout->execute([
			$_SESSION['user_id'],
			$move, 
			$path, 
			$name
			]);
	}

	public function ajout_drop($path, $values) {
		$ajout = $this->dbh->prepare("INSERT INTO upload(user_id, chemin, name) VALUES(?,? ,?)");
		$ajout->execute([
			$_SESSION['user_id'], 
			$path, 
			$values
			]);
	}


	public function recup_upload() {
		$recup = $this->dbh->prepare("SELECT * FROM upload WHERE user_id = ?");
		$recup->execute([
			$_SESSION['user_id']
			]);
		return $fetch = $recup->fetchAll();
	}


	public function delete_process($id) {
		$delete = $this->dbh->prepare("DELETE FROM upload WHERE id_item = ?");
		$delete->execute([
			$id
			]);
	}

	public function edit_process($id) {
		$edit = $this->dbh->prepare("UPDATE name SET name = ? FROM upload WHERE id_item = ?");
		$edit->execute([
			$_FILES['file_name'],
			$id
			]);
	}
}