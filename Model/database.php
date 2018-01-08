<?php

Class connect {
	
	protected $dbh;

	public function __construct() {
		try {
			$this->dbh = new PDO('mysql:host=localhost;dbname=rattrapage', 'root', '');

		} catch(Execption $e) {
			echo "Erreur connexion à la base de donnée";
		}
	} 
}