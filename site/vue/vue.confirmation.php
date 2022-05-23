<form id="form_confirmation" action="./?controleur=hotellerie&todo=confirmation" method="post">
<h1>Récapitulatif</h1>
<img class="confirm_img" src="./images/logo.png">
<div class="confirm_line"></div>
<h2>Informations :</h2>

<?php 
if(isset($_POST['selectcongre'])){
    echo "Congressiste &#8594; ". substr($_POST['selectcongre'],1)."<br>";
    ?>
    <input type="hidden" name="congredata" value="<?php  echo $_POST['selectcongre'] ?>" id="ajoutdata">
    <?php 
}

if(isset($_POST['select_hotel'])){
    echo "Hotel &#8594; ". substr($_POST['select_hotel'],1)."<br>";
    ?>
    <input type="hidden" name="hoteldata" value="<?php  echo $_POST['select_hotel'] ?>" id="ajoutdata">
<div class="confirm_line"></div>

<?php 
    $prix=$_POST['input_prix'];
    if(!empty($prix)){
        echo "Supplément : ".$prix." €"; 
    } else {
        echo "Supplément : Aucun";
    }

}
?>
<div class="confirm_buttons">
    <div class="confirm-no">Annuler</div>
    <input class="confirm-yes" type="submit" value="Confirmer"> 
</div>
</form>