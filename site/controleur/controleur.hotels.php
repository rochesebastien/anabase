<?php
include ("./modele/modele.hotel.php");
Class Controleur_hotels{
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
        $this->modele = new Modele_hotel();    
	}
	
	public function todo_initialiser(){
		$this->data["hotels"] = $this->modele->getListeHotel();
		$this->vue = "hotels";
	}
	
	public function todo_afficherajout(){
        
        $this->vue="ajouthotel";
	}

    public function todo_afficher(){
        $this->data["hotels"] = $this->modele->getListeHotel();
        $this->vue = "afficherhotel";
    }

    public function todo_ajouter(){
        
        $this->modele->addHotel($_POST['nom'], $_POST['adresse'], $_POST['nombreEtoiles'], $_POST['prixParticipant'], $_POST['prixSuppl']);

        if($_POST['insert']){
            echo "<div class='confirmationajout'><h2>L'hotel : ".$_POST['nom']." vient d'être ajouté.</h2></div>";
        } else{
            echo "<div class='confirmationajout confirmationajoutfail'><h2>Une erreur s'est produite.</h2></div>";
        }
        

        $this->data["hotels"] = $this->modele->getListeHotel();
        $this->vue = "afficherhotel";
    }

    public function todo_supprimer(){
        $this->modele->deleteHotel($this->post['idHotel']);

        $this->data["hotels"] = $this->modele->getListeHotel();
        $this->vue = "afficherhotel";
    }

    public function todo_modifier(){
        $this->modele->updateHotel($this->post['idModif'], $this->post['nomModif'], $this->post['adresseModif'], $this->post['etoileModif'], $this->post['prixParticipantModif'], $this->post['prixSuppModif']);

        if($_POST['insert']){
            echo "<div class='confirmationajout'><h2>L'hotel : ".$_POST['nomModif']." vient d'être modifié.</h2></div>";
        } else{
            echo "<div class='confirmationajout confirmationajoutfail'><h2>Une erreur s'est produite.</h2></div>";
        }

        $this->data["hotels"] = $this->modele->getListeHotel();
        $this->vue = "afficherhotel";
    }
}
?>