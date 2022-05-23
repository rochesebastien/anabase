<script src="js/hotels.js" type="text/javascript"></script>

<div class="content">
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
	  <td><?= $ligne->NUM_HOTEL;?></td>
    <td><?= $ligne->NOM_HOTEL;?></td>
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