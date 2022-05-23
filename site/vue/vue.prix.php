
<?php
echo "<i style='font-size:0..5em'>Le prix est de : </i>";
echo "<i style='font-size:1.1em;font-weight:bold'>".$c->data['prix']->PRIX_SUPPL." € </i>";
?>
<input type="hidden" name="input_prix" value='<?= $c->data['prix']->PRIX_SUPPL?>'>
