<?php
include ("./modele/modele.hotellerie.php");
Class Controleur_hotellerie{
	// --- champs de base du controleur
	public $vue=""; //vue appelée par le controleur
	
	public $message = "";
	public $erreur = "";
	
	public $data; // le tableau des données de la vue
	
	public $modele; // nom du modele
	
	public $m; // objet modele
	
	public $post; // renseigné par index
	
	// --- Constructeur
	public function __construct(){
		// déclarer la vue
		$this->vue = "hotellerie";
		$this->modele = new Modele_Hotellerie();
	}
	
	public function todo_initialiser(){
		$this->data["hotels"] = $this->modele->getListeHotel();
		$this->data["congressistes"] = $this->modele->getListeCongressiste();
	}

	
	public function todo_confirmer(){
		$this->vue = "confirmation";
	}

	public function todo_getprix(){
		$hotels = $this->post['hotels'];
		$hotels_split = explode(" ",$hotels);//Sépare le contenu de $hotels sous forme d'array en fonction avec comme délimiteur : les espaces
		$num_hotels = $hotels_split[0];//puis je prend la position 1 du tableau soit l'id hotel
		$this->data["prix"] = $this->modele->getPrixforHotel($num_hotels);
		$this->vue = "prix";
	}

	public function todo_confirmation(){
		$congres = $this->post['selectcongre'];
		$hotels = $this->post['select_hotel'];
		$nom_congre_split = explode(" ",$congres);//Sépare le contenu de $congres sous forme d'array en fonction avec comme délimiteur : les espaces 
		$hotels_split = explode(" ",$hotels);//Sépare le contenu de $hotels sous forme d'array en fonction avec comme délimiteur : les espaces
		$num_congre = $nom_congre_split[0];//puis je prend la position 1 du tableau soit l'id congressite
		$num_hotels = $hotels_split[0];//puis je prend la position 1 du tableau soit l'id hotel
		// echo "<script>alert(\"$num_congre$num_hotels\")</script>";		
		$this->data["hotelsconfirmation"] = $this->modele->reservations($num_hotels,$num_congre);
		$this->vue = "confirmé";
	}
	
	
}
?>