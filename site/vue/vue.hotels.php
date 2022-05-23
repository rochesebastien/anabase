<?php
  include "entete.html.php";
?>
<style>
  @import url(css/hello.css);
</style>

<script>
  var modifEnable = false;
</script>

<script src="js/hotels.js" type="text/javascript"></script>


<div class="menuperso">
<button class="btn b0">Actualiser<i class="fas fa-sync-alt" aria-hidden="true" style="float: right; margin-right: 12px"></i></button>
  <div class="contextline"></div>
  <button class="btn b1">Modifier<i class="fas fa-tools" aria-hidden="true" style="float: right; margin-right: 12px"></i></button>
  <button class="btn b2">Supprimer<i class="fas fa-trash-alt" aria-hidden="true" style="float: right; margin-right: 12px"></i></button>
  <div class="contextline"></div>
  <button class="btn b3">Surligner<i class="fas fa-highlighter" aria-hidden="true" style="float: right; margin-right: 12px"></i></button>
</div>

<h1 class="h1-hotels">Gestion des hôtels</h1>

<div class="content">
<div class="firstFlex">
  <table class="zigzag">
    <thead>
      <tr>
        <th class="header">Id</th>
        <th class="header">Nom</th>
        <th class="header">Adresse hôtel</th>
        <th class="header">Nombre étoile</th>
        <th class="header">Prix participant</th>
        <th class="header">Prix supplémentaire</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ( $c->data["hotels"] as $ligne ) { ?>
  <tr class="rowhotel" id="rowhotel<?= $ligne->NUM_HOTEL ?>">
	  <td class="ids"><?= $ligne->NUM_HOTEL;?></td>
    <td class="tester"><?= $ligne->NOM_HOTEL;?></td>
    <td><?= $ligne->ADRESSE_HOTEL;?></td>
    <td><?= $ligne->NOMBRE_ETOILES;?></td>
    <td><?= $ligne->PRIX_PARTICIPANT;?>€</td>
    <td><?= $ligne->PRIX_SUPPL;?>€</td>
  </tr>
  <?php } ?>
  </tbody>
  </table>

  <button class="ajouterHotel">Ajouter un hotel</button>
</div>
</div>