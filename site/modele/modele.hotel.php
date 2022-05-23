<?php
Class Modele_hotel{
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

	public function addHotel($nom, $adresse, $nombreEtoiles, $prixParticipant, $prixSuppl){
		settype($nombreEtoiles, "integer");
		settype($prixParticipant, "integer");
		settype($prixSuppl, "integer");

		if($nombreEtoiles == 0 or $prixParticipant == 0 or $prixSuppl == 0){
			$_POST['insert'] = false;
		} else{
			$sql = "Insert into hotel VALUES(NULL, ?,?,?,?,?)";

		$req = $this->conn->prepare($sql);
		$req->bindValue(1, $nom);
		$req->bindValue(2, $adresse);
		$req->bindValue(3, $nombreEtoiles);
		$req->bindValue(4, $prixParticipant);
		$req->bindValue(5, $prixSuppl);

		$req->execute();

		$_POST['insert'] = true;
		}

	}

	public function deleteHotel($id){
		$sql = "Delete from hotel Where NUM_HOTEL = ?";

		$req = $this->conn->prepare($sql);
		$req->bindValue(1, $id);
		
		$req->execute();
	}

	public function updateHotel($id, $nom, $adresse, $nombreEtoiles, $prixParticipant, $prixSuppl){

		settype($nombreEtoiles, "integer");
		settype($prixParticipant, "integer");
		settype($prixSuppl, "integer");

		if($nombreEtoiles == 0 or $prixParticipant == 0 or $prixSuppl == 0){
			$_POST['insert'] = false;
		} else{
			$sql = "UPDATE hotel SET NOM_HOTEL = ?, ADRESSE_HOTEL = ?, NOMBRE_ETOILES = ?, PRIX_PARTICIPANT = ?, PRIX_SUPPL = ? WHERE NUM_HOTEL = ?";

		$req = $this->conn->prepare($sql);

		$req->bindValue(1, $nom);
		$req->bindValue(2, $adresse);
		$req->bindValue(3, $nombreEtoiles);
		$req->bindValue(4, $prixParticipant);
		$req->bindValue(5, $prixSuppl);
		$req->bindValue(6, $id);

		$req->execute();

		$_POST['insert'] = true;
		}

		
		
	}
}