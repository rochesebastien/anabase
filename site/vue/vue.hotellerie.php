<?php
  include "entete.html.php";
?>
 <link href="css/hotellerie.css" rel="stylesheet">
 <script type="text/javascript" src="js/hotellerie.js"></script>

<div class="hotellerie_container">

<div class="hotellerie_contain">
        <div class="title_hotellerie">
            <h1>Outils d'hotellerie</h1>
        </div>
        <div class="hotellerie_contain_part">
        <div class="hotellerie_contain_part1">
        <form action="./?controleur=hotellerie&todo=confirmer" method="post" class="form_hotellerie">
        <select name="selectcongre" id="select_congre_id" class="selec_hotellerie">
            <option value="no" disabled selected>Choisir un congressiste</option>
            <?php
            foreach ($c->data["congressistes"] as $variable) {        
            ?> 
            <option value="<?php echo $variable->NUM_CONGRESSISTE." ".$variable->PRENOM_CONGRESSISTE." ".$variable->NOM_CONGRESSISTE ?>"><?php echo $variable->NUM_CONGRESSISTE." | ".$variable->PRENOM_CONGRESSISTE." ".$variable->NOM_CONGRESSISTE ?></option>
            <?php  
            }
            ?>
        </select>
        <input class="inputhidden" type="text" name="idcongre" value="">
        <select name="select_hotel" id="select_hotel_id" class="selec_hotellerie">
            <option disabled selected value="no">Choisir un hôtel</option>
            <?php
            foreach ($c->data["hotels"] as $variable) {
            ?> 
            <option value="<?php echo $variable->NUM_HOTEL." ".$variable->NOM_HOTEL ?>"><?php echo $variable->NUM_HOTEL." | ".$variable->NOM_HOTEL ?></option>
            <?php  
            }
            ?> 
        </select>
        <div>
            <span class="dej_hotellerie"> Petit-déjeuner </span>
             <input class="checkbox_hotellerie"  type="checkbox" name="" id="checkbox">
             <input class="inputhidden" type="text" name="input_prix" value="">
        </div>
        <div class="cost_hotellerie"></div>
        <input type="submit" value="Réserver" class="submit_hotellerie" name="submit_reserv">
        <i class="fas"></i>
        </form>
        </div>
        <div class="hotellerie_contain_part2">
        </div>
        </div>
        </div>
</div>