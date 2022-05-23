<?php
Class Modele_hotellerie{
	private $conn;
	
	public function __construct(){
		$login = "root";
		$mdp = "";
		$bd = "anabase";
		$serveur = "localhost";

		try {
			$this->conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			print "Erreur de connexion PDO ";
			die();
		}
	}
	
	public function getListeNom(){
		$req = $this->conn->prepare ("select * from hello");
		
		$req->execute();
		
		return $req->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function insererNom( $nom ){
		$sql = "insert into hello values (NULL,?)";
		
		$req = $this->conn->prepare( $sql );
		
		$req->bindValue(1, $nom);
		$req->execute();
	}

	public function getListeHotel(){
		$req = $this->conn->prepare("select * from hotel");
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function getListeCongressiste(){
		$req = $this->conn->prepare("select * from congressiste where NUM_HOTEL IS NULL");
		$req->execute();
		return $req->fetchAll(PDO::FETCH_OBJ);
	}

	public function getPrixforHotel($hotel){
		$sql = "select PRIX_SUPPL from hotel where NUM_HOTEL = ?";
		$req = $this->conn->prepare( $sql );
		$req->bindValue(1, $hotel);
		$req->execute();
		
		return $req->fetch(PDO::FETCH_OBJ);
	}
	
	

	public function reservations($hotel,$congressiste){		
		$req1 = "UPDATE congressiste SET NUM_HOTEL = ? WHERE NUM_CONGRESSISTE = ?";
		$sql = $this->conn->prepare( $req1 );
		$sql->bindValue(1, $hotel);
		$sql->bindValue(2, $congressiste);
		$sql->execute();
	}


}