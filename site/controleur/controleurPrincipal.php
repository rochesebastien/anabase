<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "controleur.accueil.php";
    $lesActions["hello"] = "controleur.hello.php";
    $lesActions["accueil"] = "controleur.accueil.php";
    $lesActions["hotels"] = "controleur.hotels.php";
    $lesActions["hotellerie"] = "controleur.hotellerie.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>