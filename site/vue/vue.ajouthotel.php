<style>
    @import url(css/ajouthotel.css);
</style>

<script src="js/ajoutHotels.js" type="text/javascript"></script>

<div class="content">
<fieldset class="fieldset-ajout-hotel">
  <h2 class="h2ajout">Ajouter un hotel</h2>
  <div class="justify-div">
      <form action="?controleur=hotels&todo=ajouter" method="post" class="form-ajout-hotel" name="form-ajout">
        <label for="">Nom</label><br>
        <input class="input-ajout-hotel" type="text" name="nom"><br>
        <label for="">Adresse</label><br>
        <input class="input-ajout-hotel" type="text" name="adresse"><br>
        <label for="">Nombre d'étoile(s)</label><br>
        <input class="input-ajout-hotel" type="text" name="nombreEtoiles"><br>
        <label for="">Prix participant</label><br>
        <input class="input-ajout-hotel" type="text" name="prixParticipant"><br>
        <label for="">Prix supplémentaire</label><br>
        <input type="text" class="input-ajout-hotel" name="prixSuppl"><br>
        <input class="input-submit-ajout-hotel" type="submit" value="ajouter" title="Ajouter" name="todo">
      </form>
      <img src="images/logo.png" class="logo-ajout">
  </div>
</fieldset>

<button class="voirHotels">Voir les hotels</button>
</div>